<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductImage;
class ProductImage extends Model
{
	//$productImage -> product

    public function product(){

    	return $this->belongsTo(Product::class);
    }
}
