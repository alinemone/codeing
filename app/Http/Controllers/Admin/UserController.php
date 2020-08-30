<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use function MongoDB\BSON\toJSON;

class UserController extends Controller
{
    public function allUsers(){
      $users =  User::latest()->paginate(25);
      $roles= Role::all();

      return view('Admin.Users.index',compact('users','roles'));
    }
}
