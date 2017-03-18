<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function showLoginPage(){
        return view('loginPage');
    }

    public function doLogin(Request $request){

//        $user = new User();
//        $user->email = "marikyangegham@gmail.com";
//        $user->name = "Gegham";
//        $user->role = 0;
//        $user->password = Hash::make("123456");
//        User::create($user['attributes']);



        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(array('email' => $email , 'password' => $password))) {
            return redirect('/goods');
        }
        else{
            return redirect('/');
        }

//        $password = Hash::make('812445');
//        $id = User::insert(
//            [
//                'name'  => 'hovo',
//                'email' => 'marikyanhovhannes@gmail.com',
//                'password' => $password
//            ]
//        );
    }

    public function logout(){
        Auth::logout();
        return view('loginPage');
    }
}
