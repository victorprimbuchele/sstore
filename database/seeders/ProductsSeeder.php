<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Log;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = 1;

        $allStarshipsUrl = "https://www.swapi.tech/api/starships?page=1&limit=36";

        $allStarshipsResponse = Http::get($allStarshipsUrl);

        foreach ($allStarshipsResponse['results'] as $starship) {
            $starshipData = Http::get($starship['url']);

            foreach ($starshipData['result'] as $key => $value) {
                if (gettype($value) === 'array') {
                    Products::create([
                    'model' => $value['model'],
                    'passengers' => $value['passengers'],
                    'starship_class' => $value['starship_class'],
                    'max_atmosphering_speed' => $value['max_atmosphering_speed'],
                    'manufacturer' => $value['manufacturer'],
                    'length' => $value['length'],
                    'hyperdrive_rating' => $value['hyperdrive_rating'],
                    'crew' => $value['crew'],
                    'cost_in_credits' => $value['cost_in_credits'],
                    'consumables' => $value['consumables'],
                    'cargo_capacity' => $value['cargo_capacity'],
                    'mglt' => $value['MGLT'],
                ]);
                }
               
            }
        }
    }
}
