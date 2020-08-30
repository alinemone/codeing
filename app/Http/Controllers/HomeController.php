<?php

namespace App\Http\Controllers;


use AliBayat\LaravelCategorizable\Category;
use App\Category1;
use App\Product;
use App\Productstatus;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Conner\Tagging\Model\Tag;
use Conner\Tagging\Model\Tagged;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware("verified");
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {



        SEOMeta::setTitle('وبسایت فروش قالب و افزونه');
        SEOMeta::setDescription('خرید و فروش قالب و افزونه ');

       $products = Product::latest()->paginate(33);

       $CatProducts = Category::with('products')->whereParent_id(null)->get();


        return view('Home.index' ,compact('products','CatProducts'));

    }

    public function dmca(){


        SEOMeta::setTitle('DMCA digital millennium copyright act');
        SEOMeta::setDescription(config('app.url').'is in full compliance with 17 U.S.C. § 512 and the Digital Millennium Copyright Act (“DMCA”). It is our policy to respond to any infringement notices and take appropriate actions under the Digital Millennium Copyright Act (“DMCA”) and other applicable intellectual property laws.');
        SEOMeta::addKeyword('');

        OpenGraph::setDescription(config('app.url').'is in full compliance with 17 U.S.C. § 512 and the Digital Millennium Copyright Act (“DMCA”). It is our policy to respond to any infringement notices and take appropriate actions under the Digital Millennium Copyright Act (“DMCA”) and other applicable intellectual property laws.');
        OpenGraph::setTitle('DMCA digital millennium copyright act');
        OpenGraph::setUrl(config('app.url').'/dmca');


        JsonLd::setTitle('DMCA digital millennium copyright act');
        JsonLd::setDescription(config('app.url').'is in full compliance with 17 U.S.C. § 512 and the Digital Millennium Copyright Act (“DMCA”). It is our policy to respond to any infringement notices and take appropriate actions under the Digital Millennium Copyright Act (“DMCA”) and other applicable intellectual property laws.');
        JsonLd::setType('DMCA');




        return view('Home.DMCA.DMCA');
    }



}
