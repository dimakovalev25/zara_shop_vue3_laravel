<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CustomerAddress extends Model
{

    protected $guarded = false;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getCustomer(): HasOne
    {
        return $this->hasOne(Customer::class, 'user_id', 'customer_id');
    }
}
