<?php

namespace App\Http\Controllers;

use App\BuyersProduct;
use App\Payment;
use App\Product;
use Illuminate\Http\Request;
use SoapClient;


class PaymentController extends Controller
{
    protected  $MerchantID = 'b2eb963e-f1c3-11e9-a3fa-000c295eb8fc';


    //  method Payment
    public function payment(){
        $this->validate(request() , [
            'product_id' => 'required'
        ]);

        $product = Product::findOrFail(request('product_id'));
        $price = $product->price;

        $adminIncome = $price * 0.2;
        $userIncome = $price - $adminIncome;

        if(auth()->user()->phone){
            $phone = auth()->user()->phone;
        }else{
            $phone = '';
        }

        if(auth()->user()->checkBuyers($product)) {
            alert()->error('دقت کنید','شما قبلا این محصول را خریداری کرده اید!')->persistent('خیلی خوب');
            return back();
        }

        if (auth()->user()->id == $product->user_id){
            alert()->error('دقت کنید','شما مجاز به خرید محصول خود نیستید!');
            return back();
        }

        if($product->price == 0) {
            BuyersProduct::create([
                'user_id'=> auth()->user()->id,
                'product_id'=> $product->id,
            ]);
            alert()->success('با تشکر',' دریافت محصول با موفقیت انجام شد از این پس میتوانید برای دانلود به قسمت محصولات خریداری شده مراجعه فرمایید!');
            return redirect(route('user.products.purchased'));
        }else{



            $Amount = $price; //Amount will be based on Toman - Required
            $Description = $product->title; // Required
            $Email = auth()->user()->email; // Optional
            $Mobile = $phone; // Optional
            $CallbackURL = route('payment.checker'); // Required

            $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentRequest(
                [
                    'MerchantID' => $this->MerchantID,
                    'Amount' => $Amount,
                    'Description' => $Description,
                    'Email' => $Email,
                    'Mobile' => $Mobile,
                    'CallbackURL' => $CallbackURL,
                ]
            );
            //Redirect to URL You can do it also by creating a form
            if ($result->Status == 100) {

                auth()->user()->payments()->create([
                    'resnumber' => $result->Authority,
                    'price' => $price,
                    'product_id' => $product->id,
                    'seller_id' => $product->user_id,
                    'adminIncome' => $adminIncome,
                    'userIncome' => $userIncome,

                ]);

                return redirect('https://sandbox.zarinpal.com/pg/StartPay/'.$result->Authority);

            } else {

                echo'ERR: '.$result->Status;
            }


        }
    }
//   End method Payment







//    method Checker
    public function checker(){
        $Authority = request('Authority');
        $payment = Payment::whereResnumber($Authority)->firstOrFail();
        $product = Product::findOrFail($payment->product_id);

        if (request('Status') == 'OK') {
            $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentVerification(
                [
                    'MerchantID' => $this->MerchantID,
                    'Authority' => $Authority,
                    'Amount' => $payment->price,
                ]
            );

            if ($result->Status == 100) {


                if($this->AddUserToBuyer($payment, $product)) {
                    alert()->success('با تشکر','خرید محصول با موفقیت انجام شد');
                    return redirect(route('user.products.purchased'));
                }



            } else {
                echo 'Transaction failed. Status:'.$result->Status;
            }

        } elseif(request('Status') == 'NOK') {
            alert()->error('اخطار','عملیات مورد نظر به درستی انجام نشد ')->persistent('باشه !');
            return redirect($product->path());
        }else {

            echo'ERR: '.$result->Status;

        }





    }
//  End method Checker


    protected function AddUserToBuyer($payment , $product)
    {
        $payment->update([
            'payment' => 1
        ]);

        BuyersProduct::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id
        ]);

        return true;
    }






}
