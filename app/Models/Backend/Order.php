<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $guarded = [];

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function orderDetail() {
        return $this->hasMany(OrderDetail::class);
    }
}
