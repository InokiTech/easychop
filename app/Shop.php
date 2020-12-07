<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;

class Shop extends Model
{

    protected $primaryKey = 'shop_id';
    public $incrementing = false;
    protected $fillable = [
        'shop_name', 'shop_description', 'shop_city', 'shop_address', 'user_id', 'shop_logo', 'shop_slug', 'shop_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'shop_id');
    }
}
