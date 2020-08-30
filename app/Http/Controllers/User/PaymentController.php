<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Payment;
use App\Product;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payments(){
      $payments = auth()->user()->payments;
      return view('User.Panel.PaymentProducts' ,compact('payments'));
    }

    public function sellerIncome()
    {
        $incomes = Payment::where('seller_id',auth()->user()->id)->latest()->paginate(10);


        return view('User.Panel.SellerIncome' ,compact('incomes'));
    }

    public function sellerSales()
    {
        $sales = Payment::where('seller_id',auth()->user()->id)->get();
        $productCount = Product::where('user_id',auth()->user()->id)->count();
        $userIncome = 0;
        foreach($sales as $sale) {
            $userIncome += $sale->userIncome;
        }
        return view('User.Panel.SellerSales',compact('sales','userIncome','productCount'));
    }
}
