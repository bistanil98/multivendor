<?php

namespace App;

use App\Order;
use App\Product;
use App\Transaction;
use Illuminate\Database\Eloquent\Model;

class SubOrder extends Model
{
    protected $table='sub_orders';
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public function items()
    {
        return $this->belongsToMany(Product::class, 'sub_order_items','sub_order_id','product_id')->withPivot('quantity','price');
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
