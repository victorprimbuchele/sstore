<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function show(Request $request)
    {


        return DB::table('products')->paginate(15);
    }


    public function index(Request $request)
    {
        $keyword = $request['keyword'];

        $search = $request[$keyword];

        if ($keyword) {
            return Products::where([
                [$keyword, 'like', '%' . $search . '%']
            ])->get();
        }

        return DB::table('products')->paginate(15);
    }
}
