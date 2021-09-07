<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'user_id',
        'amount',
        'order_id',
        'payment_method',
    ];

    public function user(){
        $this->belongsTo(User::class);
    }

    public function customer(){
        $this->belongsTo(Customer::class);
    }

}
