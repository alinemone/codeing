<?php

namespace App\Providers;

use AliBayat\LaravelCategorizable\Category;
use App\Payment;
use App\Product;
use App\Productstatus;
use App\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {



        //send Category to views
        view()->composer([
            'Home.sections.Footer',
            'Home.sections.MobileSidebar',
            'Home.sections.ButtomHeader',
            ]  , function($view) {
            $categories = Category::Where('parent_id',NULL)->Where('type','default')->get();
            $subcategories = Category::latest()->Where('type','default')->get();

            $view->with([
                'categories' => $categories,
                'subcategories' => $subcategories,
            ]);
        });

        //send count Products to Admin Sidebar
        view()->composer(['Admin.sections.sidebar','Admin.index','Home.sections.Footer','Home.SearchBox'] , function($view) {

            $Accepted = Productstatus::with('products')
                ->where('id',1)
                ->get()->first()->products->count();

            $vizheh = Productstatus::with('products')
                ->where('id',3)
                ->get()->first()->products->count();

            $StopSelling = Productstatus::with('products')
                ->where('id',4)
                ->get()->first()->products->count();

            $Update = Productstatus::with('products')
                ->where('id',5)
                ->get()->first()->products->count();

            $NotAccepted = Productstatus::with('products')
                ->where('id',2)
                ->get()->first()->products->count();
            $trashed =  Product::onlyTrashed()->count();
            $userCount = User::all()->count();

            // sum income Admin of sell
            $AdminIncome = Payment::Where('payment',1)->pluck('adminIncome')->sum();


            $view->with([
                'Accepted' => $Accepted,
                'NotAccepted' => $NotAccepted,
                'trashed' => $trashed,
                'vizheh' => $vizheh,
                'StopSelling' => $StopSelling,
                'Update' => $Update,
                'userCount' => $userCount,
                'AdminIncome' => $AdminIncome,
            ]);
        });

        //show income user
        view()->composer([
            'User.Panel.sections.header_userpanel',
        ]  , function($view) {
            $userIncome = Payment::Where('seller_id',auth()->user()->id)->Where('payment',1)->pluck('userIncome')->sum();

            $view->with([
                'userIncome' => $userIncome,
            ]);
        });



    }
}
