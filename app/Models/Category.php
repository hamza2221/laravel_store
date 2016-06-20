<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parentCategory(){
    	return $this->belongsTo('App\Models\Category','parent_id');
    }
    public function childCategory(){
    	return $this->hasMany('App\Models\Category','parent_id');
    }
     public function inProduct(){
    	return $this->hasMany('App\Models\Product','category_id');
    }
}
