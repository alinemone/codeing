<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    public function search(){
        $keyword = request('search');
        if (Str::length($keyword)>2){
            $products = Product::search($keyword)->latest()->get();

            return view('Home.SearchProduct.resultSearch',compact('products'));
        }else{
            return back();
        }
    }


    public function vuesearch(Request $request){
        $keyword = $request->input('query');
        if (Str::length($keyword)>=1){
            $searches = (new Search())
                ->registerModel(Product::class, ['title', 'body'])
                ->search($keyword);
            $results = [];
            foreach ($searches as $res){
                if ($res->searchable->status->first()->id == 1 ||$res->searchable->status->first()->id == 3 ||$res->searchable->status->first()->id == 4){
                    $results[] = $res;
                }
            }
            return response()->json($results);
        }else{
            return back();
        }



    }
}
