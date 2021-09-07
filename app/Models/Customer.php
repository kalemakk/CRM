<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_of_birth',
        'email',
        'village',
        'district',
        'street',
        'nationality',
        'main_phone_number',
        'other_phone_number',
        'nin',
        'user_id'
    ];

    public function getAge($date_of_birth){
        return Carbon::parse($date_of_birth)->age;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
