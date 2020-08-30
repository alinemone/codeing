<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Resources\CommentCollection;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function single(Product $product){

        if ($product->status()->first()->id == 1 || $product->status()->first()->id == 3 ||$product->status()->first()->id == 4 ||$product->status()->first()->id == 5){

            $user = User::whereId($product->user_id)->firstOrfail();
            $lastProducts = Product::whereUser_id($product->user_id)->latest()->take(8)->get();



            return view('Home.Product.single1',compact('product','user','lastProducts'));
        }else{
            return back();
        }

    }

    public function sendCommentToSngle(Product $product)
    {
//        $comments = $product->comment()->where('parent_id',0)->where('active',1)->latest()->paginate(10);
        $comments = $product->comment()->where('active',1)->latest()->paginate(10);
        return new CommentCollection($comments);
    }
}
