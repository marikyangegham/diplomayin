<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Category;
use App\GoodsTypes;

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
        $goodsTypes = GoodsTypes::select('id', 'name' , 'category_id')->with('category')->get();
        $categories = Category::select()->get();
        $name = $user = Auth::user()->name;
        return view('goods', ['name' => $name , 'goodsTypes' => $goodsTypes, 'categories' => $categories]);
    }
    public function edit(Request $request)
    {
        dd($request->all());
    }
    public function destroy(Request $request)
    {
        $toRemoveId = $request->all()['id'];
        $goodsType = GoodsTypes::find($toRemoveId);
        $status = "fail";
        if($toRemoveId && $goodsType->delete()){
            $status = "success";
        };
        return response()->json([
            'status' => $status
        ]);


    }

}


