<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;

class RefreshDataProductsSeeder extends Seeder
{
    private function verifyIfValueIsUnknownAndSetToNull($product, array $columns)
    {
        foreach ($columns as $column) {
            if ($product[$column] === 'unknown' || $product[$column] === 'n/a') {
                $product[$column] = null;
            }

            $product->save();
        }
    }

    private function verifyIfAValueIsSimilarToOtherAndUnify($product, $productInOtherIndex, array $columns)
    {
        foreach ($columns as $column) {
            if (strpos(substr(strtoupper($productInOtherIndex[$column]), 0, -1), substr(strtoupper($product[$column]), 0, -1)) !== false) {
                $productInOtherIndex[$column] = ucfirst($product[$column]);

                $productInOtherIndex->save();
            }
        }
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Products::all();

        foreach ($products as $product) {
            $this->verifyIfValueIsUnknownAndSetToNull($product, ['mglt', 'cargo_capacity', 'consumables', 'cost_in_credits', 'crew', 'hyperdrive_rating', 'max_atmosphering_speed', 'passengers']);

            foreach ($products as $p) {
                $this->verifyIfAValueIsSimilarToOtherAndUnify($product, $p, ['manufacturer', 'starship_class']);
            }
        }
    }
}
