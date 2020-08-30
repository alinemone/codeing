<?php

namespace App\Http\Controllers\User;

use AliBayat\LaravelCategorizable\Category;
use App\browser;
use App\design;
use App\filewithproduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\language_create;
use App\Product;
use App\Productstatus;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends UserController
{

    public function create(Request $request)
    {
        $allcategory = Category::all();
        $browsers = browser::all();
        $designs = design::all();
        $filewithproducts = filewithproduct::all();
        $creates = language_create::all();
        $status = Productstatus::all();
        return view('User.Panel.createProduct.create',compact('allcategory','browsers','designs','filewithproducts','creates','status'));
    }




    public function store(ProductRequest $request)
    {


        if (isset($request->support_default)){
            $productSupportPrice = str_replace(',' ,'',$request->support_default);
        }else{
            $productSupportPrice = '40000';
        }
        if ($request->CashorFree == '0'){
            $price = '0';
        }else{
            $price = str_replace(',' ,'',$request->product_price);
        }

        $product = auth()->user()->products()->create([
            'title'=>$request->product_title,
            'body'=> $request->product_descriptions,
            'seoTitleFa'=> $request->seo_title_fa,
            'seoTitleEn'=>$request->seo_title_en,
            'seoDescription'=>$request->seo_descriptions,
            'product_help'=>$request->help,
            'product_support'=>$request->support,
            'productSupportPrice'=>$productSupportPrice,
            'demoUrl'=>$request->demo_site,
            'sell_status'=>$request->CashorFree,
            'sell_status_which'=>$request->selltype,
            'price'=>$price,

            ]);

        $category_id = array_map('intval',array_merge($request->subcategories ,[request('category')]));
        $product->syncCategories($category_id);

        $product->browsers()->attach(request('browsers'));

        $product->designs()->attach(request('designs'));

        $product->filewithproduct()->attach(request('file_products'));

        $product->language_create()->attach(request('creates'));

        $this->handleTags($product,$request->tags);

        $product->productstatuse()->attach(6);



//        Alert::success('تبریک', 'محصول شما با موفقیت ثبت شد و پس از تایید مدیریت قابل نمایش خواهد بود');


        return redirect(route('user.create.product.upload'));
    }


    public function handleTags($post, $tags){
        if($post) {
            $tagNames = array_filter(explode(',',$tags));
            $tagIds = [];
            foreach($tagNames as $tagName) {
                $tag = Tag::firstOrCreate(['title'=>$tagName]);
                if($tag) {
                    $tagIds[] = $tag->id;
                }
            }
            $post->tags()->sync($tagIds);
        }
    }


    public function uploadview(){
        $products = Productstatus::with('products')
            ->where('id',6)->first()->products->where('user_id',auth()->user()->id);

        return view('User.Panel.createProduct.createStep2',compact('products'));
    }

    public function smallimage(Request $request){
        $product = Product::findOrFail($request->product);
        if ($request->hasFile('smallImage')){
            $imageUrl = $this->uploadImages($request->file('smallImage'),80 ,80);

            $product->update([
                'small_image'=>$imageUrl,
            ]);
        }


    }
    public function largeimage(Request $request){
        $product = Product::findOrFail($request->product);
        if ($request->hasFile('largeImage')){
            $large_imageUrl= $this->uploadImages($request->file('largeImage'),590 ,300);


            $product->update([
                'large_image'=>  $large_imageUrl,
            ]);
        }


    }

    public function file(Request $request){

        $year = Carbon::now()->year;$month = Carbon::now()->month;$day = Carbon::now()->day;
        $product = Product::findOrFail($request->product);



        if ($request->hasFile('zipfile')){
            $productUrl = $request->file('zipfile')->store("/public/products/$year/$month/$day");


            $product->update([
                'fileUrl'=>$productUrl,
            ]);
            $product->productstatuse()->sync(2);
            Alert::success('تبریک', 'محصول شما با موفقیت ثبت شد و پس از تایید مدیریت قابل نمایش خواهد بود');
            return response()->json(["status" => "success"]);
        }

    }


}
