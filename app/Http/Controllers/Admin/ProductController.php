<?php

namespace App\Http\Controllers\admin;

use AliBayat\LaravelCategorizable\Category;
use App\browser;
use App\design;
use App\filewithproduct;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\UserController;
use App\language_create;
use App\Product;
use App\Productstatus;
use App\Tag;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use foo\bar;
use Illuminate\Http\Request;

class ProductController extends UserController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        SEOMeta::setTitle('محصولات تایید شده');
        $products = Product::latest()->paginate(25);
        return view('Admin.Products.Accepted' , compact('products'));
    }

    public function unverified(){
//        $unverified_products = Product::where('productstatuse','2')->latest()->paginate(25);
        $products = Product::latest()->paginate(25);
        SEOMeta::setTitle('محصولات تایید نشده');
        return view('Admin.Products.notAccepted' , compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        SEOMeta::setTitle("بروزرسانی $product->title");
        $allcategory = Category::all();
        $browsers = browser::all();
        $designs = design::all();
        $filewithproducts = filewithproduct::all();
        $creates = language_create::all();
        $status = Productstatus::all();
        $product = Product::with('categories')
            ->findOrFail($product->id);

        return view('Admin.Products.update',compact('product','allcategory','browsers','designs','filewithproducts','creates','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        if ($request->sell_status == 0){$price = 0;}else{$price = $request->price;};

        $product->update([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'body'=>$request->product_descriptions,
            'demoUrl'=>$request->demoUrl,
            'product_help'=>$request->product_help,
            'product_support'=>$request->product_support,
            'sell_status'=>$request->sell_status,
            'sell_status_which'=>$request->sell_status_which,
            'price'=>$price,
            'productSupportPrice'=>$request->productSupportPrice,
        ]);

        if ($request->category != null ||$request->subcategory != null){
            $product->syncCategories([(int)$request->category,(int)$request->subcategory]);
        }

        alert()->success(' تبریک !','بروز رسانی محصول با موفقیت انجام شده');
        return back();
    }


    public function seo(Request $request, Product $product){

        $product->update([
            'seoTitleFa'=>$request->seoTitleFa,
            'seoTitleEn'=>$request->seoTitleEn,
            'seoDescription'=>$request->seoDescription,
        ]);

        alert()->success(' تبریک !','سئو محصول با موفقیت بروزرسانی شد.');
        return back();
    }


    public function tags(Request $request, Product $product){
        $this->handleTags($product,$request->tags);
        alert()->success(' تبریک !','برچسب محصول با موفقیت بروزرسانی شد.');
        return back();
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


    public function status(Request $request, Product $product){
        $product->update([
            'message'=>$request->message,
        ]);
        $product->productstatuse()->sync($request->status);
        alert()->success(' تبریک !','وضعیت محصول با موفقیت بروزرسانی شد.');
        return back();
    }

    public function file(Request $request, Product $product){
        if ($request->hasFile('small_image')) {
            $imageUrl = $this->uploadImages($request->file('small_image'),80 ,80);
            $product->update([
               'small_image' => $imageUrl
            ]);
            alert()->success(' تبریک !','تصویر با موفقیت بروزرسانی شد.');
        }
        if($request->hasFile('large_image')) {
            $imageUrl = $this->uploadImages($request->file('large_image'),590 ,300);
            $product->update([
                'large_image' => $imageUrl
            ]);
            alert()->success(' تبریک !','تصویر با موفقیت بروزرسانی شد.');
        }
        $year = Carbon::now()->year;$month = Carbon::now()->month;$day = Carbon::now()->day;
        if ($request->hasFile('file')){
            $productUrl = $request->file('file')->store("/public/products/$year/$month/$day");
            $product->update([
                'fileUrl' => $productUrl
            ]);
            alert()->success(' تبریک !','فایل محصول با موفقیت بروزرسانی شد.');
        }

        return back();

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();

        alert()->success('موفقیت آمیزبود','محصول حذف شد!');

        return back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * return view product soft delete
     */
    public function delete(){

        SEOMeta::setTitle("محصولات حذف شده");
        $products = Product::onlyTrashed()->latest()->paginate(25);

        return view('Admin.Products.softDelete',compact('products'));
    }


    public function restore($id){

        $products = Product::onlyTrashed()->whereId($id)->restore();

        alert()->success('تبریک','محصول با موفقیت بازگردانی شد.');
        return back();


    }
}
