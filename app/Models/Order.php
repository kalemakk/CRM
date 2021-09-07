<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'total_amount',
        'customer_id',
        'status'
    ];

    public function user(){
        $this->belongsTo(User::class);
    }

    public function products(){
        $this->hasMany(Product::class);
    }

    public function customer(){
        $this->belongsTo(Customer::class);
    }
}
