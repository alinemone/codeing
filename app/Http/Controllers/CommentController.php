<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $this->validate(request(),[
            'comment' => 'required|min:5'
        ]);
        auth()->user()->comments()->create($request->all());

        return response('کامنت ذخیره شد');
    }
}
