<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Orders;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = ['customer_name', 'customer_phone','customer_email','customer_address','user_id', 'active'];

    public function getUserCustomer(){
        return $this->hasOne(User::class);
    }
    public function getOrder(){
        return $this->hasMany(Orders::class);
    }
}

