<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = "category";

    public function product() {
    	return $this->hasMany('App\Product','cate_id','id');
    }
}
