<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Log;

class UserController extends Controller
{
    private function removeDomainEmail(string $email): string
    {
        return substr($email, 0, strpos($email, '@'));
    }


    private function makeNameWithEmail(string $email): string
    {
        $separator = '';

        $upperCasedPartsArr = [];

        $emailWithoutDomain = $this->removeDomainEmail($email);

        if (strpos($emailWithoutDomain, '.')) {
            $separator = '.';
        }

        if (strpos($emailWithoutDomain, '_')) {
            $separator = '_';
        }

        if ($separator) {
            $splitedEmail = explode($separator, $emailWithoutDomain);

            foreach ($splitedEmail as $partsOfSplit) {
                array_push($upperCasedPartsArr, ucfirst($partsOfSplit));
            }

            return implode(' ', $upperCasedPartsArr);
        }

        return ucfirst($emailWithoutDomain);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response('Seu e-mail ou senha não estão corretos', 403);
        }
        return $user->createToken($request->header('User-Agent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            if ($validated) {
                $user = User::create([
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    'name' => $this->makeNameWithEmail($request['email'])
                ]);

                $response = [
                    'data' => $user,
                    'message' => 'Conta cadastrada com sucesso'
                ];

                return response($response, 201);
            }

            return response('Falha ao cadastrar o usuário', 422);
        } catch (\Exception $e) {
            Log::error($e);

            return response('Falha ao cadastrar o usuário', 422);
        }
    }

    public function show()
    {
        try {
            Log::info(Auth::user());

            return response(Auth::user(), 200);
        } catch (\Exception $e) {
            Log::error($e);

            return response('Não foi possível obter dados deste usuário', 422);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        $user = Auth::user();

        try {
            $user->update([
                $request->all(),
                'password'  => Hash::make($request['name']),
            ]);

            $response = [
                'data' => $user,
                'message' => 'Perfil atualizado com sucesso'
            ];

            return response($response, 200);

            return response('Não foi possível fazer atualizar o usuário', 422);
        } catch (\Exception $e) {
            Log::error($e);

            return response('Não foi possível fazer atualizar o usuário', 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        try {
            Auth::user()->delete();

            return response('Usuário deletado com sucesso');
        } catch (\Exception $e) {
            Log::error($e);

            return response('Não foi possível excluir este usuário', 422);
        }
    }
}
