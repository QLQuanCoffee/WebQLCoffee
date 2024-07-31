<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'shops';
    protected $fillable = [
        'id',
        'name',
        'description',
        'address',
        'time',
        'link_map',
        'photo'
    ];
}
