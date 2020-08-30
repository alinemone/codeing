<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class browser extends Model
{
    protected $fillable = ['id','name'];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
