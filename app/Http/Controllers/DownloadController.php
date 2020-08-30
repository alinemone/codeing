<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class DownloadController extends Controller
{
    public function download(Product $product)
    {
        if (auth()->check()){
            $hash = 'GTMjaslASaSLahkdnsdjdhjs'. $product->id .auth()->user()->id .\request('t');
            if (Hash::check($hash , \request('m'))){
                return response()->download(storage_path($product->fileUrl));
            }else{

                alert()->error('خطا!','لینک دانلود اعتبار لازم را ندارد.');
                return redirect(route('index'));
            }
        }else{
            return back();
        }
    }
}
