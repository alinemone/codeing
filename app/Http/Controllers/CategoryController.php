<?php

namespace App\Http\Controllers;

use AliBayat\LaravelCategorizable\Category;
use App\Product;
use App\Productstatus;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category,Category $category1 = null ){

        if (is_null($category1)){
           $products = Category::find($category->id)->entries(Product::class)->with('status')->latest()->paginate(8);
           $catseo = Category::find($category->id);
            if (isset($catseo->seo_title)){
                $catseo = $catseo->seo_title;
            }else{
                $catseo = " دسته بندی ".$catseo->name;
            }
            SEOMeta::setTitle("$catseo");


            $Category = Category::find($category->id);

            return view('Home.Category.category',compact('products','Category'));
        }else{
            $products = Category::find($category1->id)
                ->entries(Product::class)->with('status')->latest()->paginate(8);

            $catseo = Category::find($category1->id);
            if (isset($catseo->seo_title)){
                $catseo = $catseo->seo_title;
            }else{
                $catseo = " دسته بندی ".$catseo->name;
            }
            SEOMeta::setTitle("$catseo");


            $parentCategory = Category::find($category1->parent_id);
            $Category = Category::find($category1->id);
            return view('Home.Category.subCategory',compact('products','Category','parentCategory'));
        }
    }
}
