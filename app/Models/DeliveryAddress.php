<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'cep',
        'street',
        'complement',
        'district',
        'city',
        'uf',
        'is_main_address',
        'user_id',
    ];
}
