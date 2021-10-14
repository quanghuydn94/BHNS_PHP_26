<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table = 'orderdetails';
    protected $fillable = [
        'product_name',
        'product_image',
        'orderdetail_quantity',
        'orderdetail_totalprice',
        'order_id ',
        'active',
    ];
    public $timestamps = false;
}
