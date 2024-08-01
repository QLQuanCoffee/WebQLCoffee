<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='orders';
    protected $fillable=[
        'id',
        'date',
        'total_price',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function price_format($price)
    {
        return number_format($price, 0, ',', '.') . 'vnđ';
    }
}
