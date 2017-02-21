<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    //
    protected $guarded = ['id'];

    public function address() {
        return $this->belongsTo('App\Address', 'address_id');
    }
}
