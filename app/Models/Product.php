<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    function productImages(){
    	return $this->hasMany('App\Models\ProductImage','product_id');
    }
    function productCategory(){
    	return $this->belongsTo('App\Models\Category','category_id');
    }
    function productPrimaryImages(){
    	return $this->hasOne('App\Models\ProductImage','product_id');
    }
}
