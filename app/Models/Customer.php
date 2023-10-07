<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{

    protected $guarded = false;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer_address()
    {
        return $this->hasOne(CustomerAddress::class);
    }

    private function _getAddresses(): HasOne
    {
        return $this->hasOne(CustomerAddress::class . 'customer_id');
    }

    protected $fillable = ['first_name', 'last_name', 'phone', 'status',];

    public function getUser()
    {
        return $this->hasOne(User::class);
    }


}
