<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'product_title',
        'product_slug',
        'product_price',
        'product_description',
        'product_image'
    ];
}
