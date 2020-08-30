<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use SEOMeta;
use Illuminate\Http\Request;

class StoreController extends Controller
{
   public function author(User $user){

       SEOMeta::setTitle($user->name);
       return view('Home.store.author',compact('user'));
   }

   public function store(User $user){
       $products = Product::whereUser_id($user->id)->latest()->paginate(18);
       return view('Home.store.store',compact('user','products'));
   }
}
