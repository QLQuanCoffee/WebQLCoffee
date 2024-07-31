<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    use HasFactory;
    protected $table='toppings';
    public $timestamps = false;
    protected $fillable=[
        'id',
        'name',
        'price'
    ];
    public function price_format($price)
    {
        return number_format($price, 0, ',', '.') . ' đ';
    }
}
