<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductType;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_symbol', 'product_name', 'product_image','product_price', 'product_description', 'active', 'product_type_id',
    ];
    protected $table = 'products';

    public $timestamps = true;

    public function productType(){
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }
}
