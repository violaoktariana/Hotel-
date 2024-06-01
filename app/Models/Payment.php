<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function orders(): HasOne
    {
        return $this->hasOne(Order::class);
    }
    public function payment_methods(): HasOne
    {
        return $this->hasOne(Payment_Method::class);
    }
    public function receipt(): HasOne
    {
        return $this->hasOne(Receipt::class);
    }
}
