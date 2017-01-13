<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Category;
use App\GoodsTypes;
use App\Stocks;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function __construct()
    {
    }

    public function index(){


        /*$stock = new Stocks();
        $stock->stock_name = "amiryan";
        $stock->user_id = "1";
        Stocks::create($stock['attributes']);*/



        /*$user = new User();
        $user->email = "marikyangegham@gmail.com";
        $user->name= "Gegham";
        $user->password = Hash::make("123456");
        User::create($user['attributes']);*/

        //return redirect('/admin/users');
        $goodsTypes = GoodsTypes::select('id', 'name' , 'category_id')->with('category')->get();
        $categories = Category::select()->get();
        $name = $user = Auth::user()->name;
        return view('goods', ['name' => $name , 'goodsTypes' => $goodsTypes, 'categories' => $categories]);
    }
    public function edit(Request $request)
    {
        $toChangeGoodsId = $request->all()['id'];
        $newCategoryId = $request->all()['category_id'];
        $newName = $request->all()['name'];
        $newName = strtolower($newName);
        $goodsType =  GoodsTypes::where('id', $toChangeGoodsId)->first();
        $goodsType['name'] = $newName;
        $goodsType['category_id'] = $newCategoryId;
        $status = "fail";
        $v = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required'

        ]);
        if($newName && $newCategoryId && !$v->fails() && $goodsType->save()){
            $status = "success";
        }
        return response()->json([
            'status' => $status
        ]);
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


