<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Order extends Model
{
    protected $primaryKey = 'order_id';
    public $incrementing = false;

    protected $fillable = [
        'order_id', 'user_id', 'status', 'grand_total', 'item_count', 'is_paid', 'payment_method', 'shipping_fullname',
        'shipping_address', 'shipping_city', 'shipping_state', 'shipping_zipcode', 'shipping_phone', 'notes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->belongsToMany(Product::class,'order_items','order_id','product_id')->withPivot('quantity');
    }

}
