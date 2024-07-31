<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='products';
    protected $fillable=[
        'id',
        'name',
        'price',
        'photo',
        'description',
        'type_id'
    ];
    public function price_format($price)
    {
        return number_format($price, 0, ',', '.') . 'vnđ';
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }
}
