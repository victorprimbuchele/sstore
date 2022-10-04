<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'credit_card_id',
        'delivery_address_id',
        'shopping_cart_id',
        'payment_method_id',
        'user_id',
    ];
}
