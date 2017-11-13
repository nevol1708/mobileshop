<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //
    protected $table = 'category';
    protected $primarykey = 'id';
    public function product() {
    	return $this->hasMany('App\Product','cate_id','id');
    }
}
