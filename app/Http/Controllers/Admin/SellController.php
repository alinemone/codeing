<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Payment;
use App\Product;
use Illuminate\Http\Request;

class SellController extends Controller
{
    public function sell(){
        $sellProducts = Payment::where('payment',1)->with('products')->latest()->paginate(25);
        return view('Admin.SellProducts.SellProducts' ,compact('sellProducts'));
    }

}
