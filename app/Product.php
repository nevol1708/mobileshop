<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $primarykey = 'id';
	public function product_type() {
    	return $this->belongsTo('App\ProductCategory','cate_id','id');
    }
}
