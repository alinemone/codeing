<?php

namespace App\Http\Controllers\User;

use AliBayat\LaravelCategorizable\Category;
use App\BuyersProduct;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PanelController extends Controller
{
    public function __construct()
    {
        $this->middleware("verified");
    }


    public function index(){
        $category = Category::all();
        return view('User.Panel.index',compact('category'));
    }

    public function profile_edit(){

        return view('User.Panel.profile_edit');
    }

    public function account_edit(){

        return view('User.Panel.account_edit');
    }

    public function save_account_edit(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255','regex:/^[پچجحخهعغآ؟.،آفقثصضشسیبلاتنمکگوئدذرزطظژ!!ؤإأءًٌٍَُِّ\s]+$/u'],
            'phone' => ['required','string','max:14','min:11','regex:/^(\+98|0098|98|0)?9\d{9}$/'],
        ]);

        $user = Auth::user();
        $user->fill([
            'name' => $request->name,
            'phone' => $request->phone,

        ]);

        toast('باموفقیت بروزرسانی شد','success');
        $user->save();

        return redirect(route('account_edit'));

    }

    public function change_password(){
        return view('User.Panel.change_password');
    }
    public function save_change_password(Request $request){

        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->fill([
            'password' => Hash::make($request->password),
        ]);
        toast('رمز عبور باموفقیت بروزرسانی شد','success');
        $user->save();

        return redirect(route('change_password'));
    }

//show products approved User
    public function approved(){
        $userproducts = Product::whereUser_id(auth()->user()->id)->latest()->paginate(25);
        return view('User.Panel.products',compact('userproducts'));
    }
//show products disapproved User
    public function disapproved(){
        $userproducts = Product::whereUser_id(auth()->user()->id)->latest()->paginate(25);
        return view('User.Panel.disapproved',compact('userproducts'));
    }
// show user purchased products
    public function purchased(){
        $ProductsBuyersId = BuyersProduct::whereUser_id(auth()->user()->id)->pluck('product_id')->toArray();

        $products = Product::whereIn('id', $ProductsBuyersId)->latest()->paginate(20);
        return view('User.Panel.purchasedProducts',compact('products'));
    }

}
