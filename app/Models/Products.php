<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'model',
        'passengers',
        'starship_class',
        'max_atmosphering_speed',
        'manufacturer',
        'length',
        'hyperdrive_rating',
        'crew',
        'cost_in_credits',
        'consumables',
        'cargo_capacity',
        'mglt',
    ];

    public static function getAllPaginated(int $itemsPerPage = 15)
    {

        return self::all()->paginate($itemsPerPage);
    }

    private static function search(string $column, string $search)
    {
        return self::where([$column, 'like', '%' . $search . '%'])->get();
    }

    private static function filterColumnByParam(string $column, string $method, string $param)
    {
        return self::where([$column, $method, $param])->get();
    }

    private static function getDistinct(array $column)
    {
        return self::distinct()->get($column);
        // $query = DB::table('products')->distinct()->select(['manufacturer'])->get();

        // Log::info($query);

        // return $query;
    }



    public static function filterMgltLessThanParam(string $param)
    {
        return self::filterColumnByParam('mglt', '<', $param);
    }

    public static function filterCostInCreditsLessThanParam(string $param)
    {
        return self::filterColumnByParam('cost_in_credits', '<', $param);
    }

    public static function searchName(string $search)
    {
        return self::search('name', $search);
    }

    public static function searchModel(string $search)
    {
        return self::search('model', $search);
    }

    public static function searchManufacturer(string $search)
    {
        return self::search('manufacturer', $search);
    }

    public static function getDistinctManufacturer()
    {
        return self::getDistinct(['manufacturer']);
    }

    public static function getDistinctStarshipClass()
    {
        return self::getDistinct(['starship_class']);
    }
}
