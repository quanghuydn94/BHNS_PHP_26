<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table = 'orderdetails';
    protected $fillable = [
        'product_id',
        'orders_id',
        'order_detail_quantity',
        'order_detail_price',
        'active',
    ];
    public $timestamps = false;
}
