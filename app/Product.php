<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];

    public function tags(){
      return $this->belongsToMany('App\Tag');
    }

    public function seller() {
        return $this->belongsTo('App\Seller', 'seller_id');
    }

    public function reviews() {
        return $this->hasMany('App\Review');
    }
}
