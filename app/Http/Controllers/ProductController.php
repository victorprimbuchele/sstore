<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function show()
    {
        $url = 'https://swapi.dev/api/starships';

        $array = [];



        $response = Http::get($url);


        while ($response['next']) {
            $response = Http::get($response['next']);

            
            array_push($array, array('key' => $response['results']));
            

        }

        return  $array;
    }
}
