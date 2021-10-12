<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['customer_name', 'customer_phone','customer_email','customer_address','user_id', 'active'];

    public function getUserCustomer(){
        return $this->hasOne(User::class);
    }
}
