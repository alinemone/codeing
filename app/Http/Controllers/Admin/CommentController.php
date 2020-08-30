<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {

         $commentsNotActive = Comment::whereActive(0)->latest()->paginate(10);
         $commentsActive = Comment::whereActive(1)->latest()->paginate(10);
        return view('Admin.Comments.index',compact('commentsActive','commentsNotActive'));
    }
}
