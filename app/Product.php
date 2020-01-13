<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected  $fillable = [
    	'name','quant','supplier_id', 'image'
    ];

    public function suppliers(){

    	return $this->belongsToMany(Supplier::class);
    }
}
