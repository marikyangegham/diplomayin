<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Input;
use App\GoodsTypes;
use App\Deliveryman;
use App\Catalog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InputController extends Controller
{
    public function show()
    {
        $inputtedGoods = Input::with('user')
                                ->with('good')
                                ->with('deliveryman')
                                ->select()
                                ->get();
        $goods = GoodsTypes::get()->all();
        $deliverymans = Deliveryman::get()->all();
        return view('allInputtedGoods', ['inputtedGoods' => $inputtedGoods, 'goods' => $goods, 'deliverymans' => $deliverymans]);
    }
    public function input(Request $request){
        $goodsId = $request->all()['goods_id'];
        $quantity = $request->all()['quantity'];
        $deliveryId = $request->all()['delivery_id'];
        $user_id = Auth::id();

        $status = "fail";
        $v = Validator::make($request->all(), [
            'goods_id' => 'required',
            'quantity' => 'required',
            'delivery_id' => 'required'

        ]);
        if($v->fails()){
            return response()->json([
                'status' => $status
            ]);
        }

        $catalogItem =  Catalog::where('goods_id', $goodsId)->where('user_id', Auth::id())->first();

        if($catalogItem){
            $catalogItem->quantity += $quantity;
            $catalogItem->save();
        }else{
            Catalog::create(array(
                'goods_id' => $goodsId,
                'user_id' => $user_id,
                'quantity' => $quantity
            ));
        }
        Input::create(array(
            'goods_id' => $goodsId,
            'user_id' => $user_id,
            'quantity' => $quantity,
            'deliveryman_id' => $deliveryId
        ));

        $status = 'success';
        return response()->json([
            'status' => $status
        ]);
    }
}
