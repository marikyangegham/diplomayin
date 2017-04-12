<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GoodsTypes;
use App\Catalog;
use App\ReturnGoods;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReturnController extends Controller
{
    public function show()
    {
        $returnedGoods = ReturnGoods::with('user')
            ->with('good')
            ->select()
            ->get();

        $goods = GoodsTypes::all();
        return view('returnedGoods', ['returnedGoods' => $returnedGoods, 'goods' => $goods]);
    }
    public function returnGoods(Request $request){
        $goodsId = $request->all()['goods_id'];
        $quantity = $request->all()['quantity'];
        $user_id = Auth::id();

        $status = "fail";
        $v = Validator::make($request->all(), [
            'goods_id' => 'required',
            'quantity' => 'required'
        ]);
        if($v->fails()){
            return response()->json([
                'status' => $status
            ]);
        }

        $catalogItem =  Catalog::where('goods_id', $goodsId)->where('user_id', Auth::id())->first();

        if($catalogItem){
            if($catalogItem->quantity >= $quantity){
                $catalogItem->quantity -= $quantity;
                $catalogItem->save();
            }
        }else{

        }
        ReturnGoods::create(array(
            'goods_id' => $goodsId,
            'user_id' => $user_id,
            'quantity' => $quantity
        ));

        $status = 'success';
        return response()->json([
            'status' => $status
        ]);
    }
}
