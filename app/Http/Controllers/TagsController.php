<?php

namespace App\Http\Controllers;

use App\Product;
use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Tag $tag){
        $products = Product::whereHas('tags', function ($subQuery) use ($tag) {
            $subQuery->where('id', $tag->id);
        })->latest()->paginate(6);

        return view('Home.tags.tag',compact('products','tag'));
    }
}
