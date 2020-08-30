<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class language_create extends Model
{
    protected $fillable = ['id','name'];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
