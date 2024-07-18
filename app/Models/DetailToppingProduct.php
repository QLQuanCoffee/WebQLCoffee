<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailToppingProduct extends Model
{
    use HasFactory;
    protected $table='detail_topping_products';
    protected $fillable=[
        'id',
        'cart_id',
        'topping_id',
        'quantity'
    ];
}
