<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;


class AdminController extends Controller
{
    public function index(){
        SEOMeta::setTitle('پنل مدیریت');
        return view('Admin.index');
    }
}
