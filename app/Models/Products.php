<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
