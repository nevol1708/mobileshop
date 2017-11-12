<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
/**
* class Product
*/
class Product extends Model
{
	protected $table = "products";
	public function product_type() {
    	return $this->belongsTo('App\ProductCategory','cate_id','id');
    }
}