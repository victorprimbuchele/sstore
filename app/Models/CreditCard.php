<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'printed_name',
        'card_number',
        'cvv',
        'expiration_date',
        'is_main_card',
        'user_id',
    ];
}
