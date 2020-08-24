<?php

namespace App;

use App\SubOrder;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];
    protected $table='transactions';
    protected $keyType = 'string';
    public function subOrder()
    {
        return $this->belongsTo(SubOrder::class);
    }

}
