<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function __construct()
    {
    }

    public function index(){


       /* $user = new User();
        $user->email = "test@test.com";
        $user->name= "test";
        $user->password = Hash::make("123456");
      //  dd($user['attributes']);
        User::create($user['attributes']);
*/
        //return redirect('/admin/users');
        $name = $user = Auth::user()->name;
        return view('goods', ['name' => $name]);
    }

}


