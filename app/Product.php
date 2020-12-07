<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Shop;

class Product extends Model
{
    protected $primaryKey = 'product_id';
    public $incrementing = false;

    protected $fillable = [
        'product_image', 'product_name', 'product_description', 'product_price', 'product_rating', 'shop_id'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id');
    }
}
