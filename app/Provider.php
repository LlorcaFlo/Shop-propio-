<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public function products ()
    {
    	return $this->belongsToMany  ( Product::class )->withPivot ('price', 'discount');
    }
}
