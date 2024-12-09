<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'amount',
    ];


}
