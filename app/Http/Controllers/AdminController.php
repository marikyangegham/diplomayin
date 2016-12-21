<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
    }

    public function adminPage(){
        $name = $user = Auth::user()->name;
        return view('adminPage', ['name' => $name]);
    }

}
