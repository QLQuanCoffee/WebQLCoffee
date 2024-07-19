<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCartTopping extends Model
{
    use HasFactory;
    protected $table='detail_cart_toppings';
    protected $fillable=[
        'id',
        'topping_id',
        'cart_id',
        'quantity'
    ];
}