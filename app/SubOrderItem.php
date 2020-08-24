<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubOrderItem extends Model
{
    protected $table='sub_order_items';
    protected $keyType = 'string';
    protected $primaryKey = 'id';
}
