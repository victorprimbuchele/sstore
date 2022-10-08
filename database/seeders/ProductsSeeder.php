<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = 'https://swapi.dev/api/starships/?page=4';

        $response = Http::get($url);

        // while ($response['next']) {

            foreach ($response['results'] as $key => $value) {
                Product::create([
                    'name' => $value['name'],
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
            };

            // $response = Http::get($response['next']);
        // }
    }
}
