<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    protected $dictStarshipClasses = [
        'Assault ship' => 'Nave de assaulto',
        'Capital ship' => 'Nave capital',
        'Corvette' => 'Corvette',
        'Cruiser' => 'Cruzador espacial',
        'Deep Space Mobile Battlestation' => 'Estação de batalha móvel Deep Space',
        'Diplomatic barge' => 'Barcaça espacial diplomática',
        'Droid control ship' => 'Nave de controle dróide',
        'Escort ship' => 'Nave de escolta',
        'Freighter' => 'Cargueiro',
        'Landing craft' => 'Embarcação de desembarque',
        'Patrol craft' => 'Embarcação de patrulha',
        'Star destroyer' => 'Destruidor estelar',
        'Star dreadnought' => 'Couraçado espacial',
        'Starfighter' => 'Caça estelar',
        'Transport' => 'Nave de transporte',
        'Yacht' => 'Iate estelar'
    ];

    public function show(Request $request)
    {


        return Products::paginate(15);
    }


    public function index(Products $products)
    {
        try {
            return response($products, 200);
        } catch (Exception $e) {
            Log::error($e);

            return response('
            Falha ao buscar o produto
            ', 422);
        }
    }

    public function getTypesOfQuery()
    {
        try {
            $filters = [
                'manufacturer' => Products::getDistinctManufacturer(),
                'starship_class' => $this->dictStarshipClasses,
            ];

            $searches = [
                'name',
                'model'
            ];

            $queries = [
                'filters' => $filters,
                'searches' => $searches,
            ];

            return response($queries, 200);
        } catch (Exception $e) {
            Log::error($e);

            return response('
            Falha ao buscar os filtros
            ', 422);
        }
    }
}
