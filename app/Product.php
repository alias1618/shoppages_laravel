<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "product";
    protected $fillable = [
        'product_name', 'product_number', 'product_price', 'product_describe',
        'product_status_id', 'product_category_id', 'product_buy_price'

    ];
}
