<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class design extends Model
{
    protected $fillable = ['id','name'];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
