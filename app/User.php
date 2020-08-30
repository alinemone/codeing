<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail

{
    use Notifiable;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','username','profile_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function store(){
        return '/store/'.$this->store_url;
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
    public function checkBuyers($product)
    {
        return !! BuyersProduct::where('user_id' , $this->id)->where('product_id' , $product->id)->first();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
