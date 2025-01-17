<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='order_details';
    protected $fillable=[
        'id',
        'quantity',
        'price',
        'product_id',
        'order_id',
        'size'
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function price_format($price)
    {
        return number_format($price, 0, ',', '.') . 'vnđ';
    }
}
