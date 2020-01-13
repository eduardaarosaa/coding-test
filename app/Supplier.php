<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [ 

    	'name', 'cep','address','number','neighborhood','city','state','phone'
    ];

    public function products(){

   		return $this->belongsToMany(Product::class);

    }
}
