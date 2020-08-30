<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfileReguest;
use App\User;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("verified");
    }


    //ذخیره اطلاعات کاربری
    public function save_profile_edit(UserProfileReguest $request,$id){
        if (auth()->user()->id == $id){
            if ($request->hasFile('avatar')){
                $avatar = $this->uploadImages($request->file('avatar'),80 , 80);
                auth()->user()->profile_image = $avatar;
            }
            if ($request->hasFile('store_img')){
                $store_img = $this->uploadImages($request->file('store_img'),590 , 250);
                auth()->user()->store_image = $store_img;
            }
            $store_info = $request->input('store_info');
            auth()->user()->store_info = $store_info;
            auth()->user()->save();
            return back();
        }

       return back();
    }

    //function Upload All Picture
    protected function uploadImages($file, $width , $height){
        $year = Carbon::now()->year;$month = Carbon::now()->month;$day = Carbon::now()->day;
        $imagePath = "/upload/users/images/{$year}/{$month}/{$day}/";
        $filename = Str::random(25);
        $type = $file->getClientOriginalExtension();
        $path = $file->store($imagePath,'general');
        $custom = '-'.auth()->user()->username.'-'. $filename.'.'.$type;


        Image::make(public_path($path))->resize($width,$height)
            ->save(public_path($imagePath) .$width.$custom);
        $image_Url = $imagePath .$width.$custom;
        // delete Original file
        File::delete(public_path($path));
        return $image_Url;
    }


    public function join(){
        return view('User.Panel.join');
    }
    public function information_user_join(Request $request){
       if ($request->checkBoxRoules == 'on'){

           $this->validate(request(),[
               'store_url' => 'required|unique:users|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
               'store_name' => 'required|unique:users|regex:/^[ آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ\s]+$/',
               'radioIsCodi' => 'required',
           ]);

            if ( ! auth()->user()->roles->count()>=1){
                auth()->user()->store_active = 1;
                auth()->user()->store_name = $request->store_name;
                auth()->user()->store_url = strtolower($request->store_url);
                auth()->user()->selling_type = $request->radioIsCodi;
                auth()->user()->assignRole('Seller');
                auth()->user()->save();
                alert()->success('تـبریک','شما به فروشنده تبدیل شدید! ، از این پس می توانید درآمد میلیونی داشته باشید.')
                    ->persistent('فهمیدم');
                return redirect(route('UserPanel'));
            }

            alert()->error('اخطار','شما مجوز های لازم برای فروشنده شدن را ندارید!')
                    ->persistent('فهمیدم');
           return redirect(route('UserPanel'));
       }
    }
}
