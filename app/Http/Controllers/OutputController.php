<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Output;
use App\GoodsTypes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Catalog;
use App\Request as RequestModel;
use App\MainRequest;
use Carbon\Carbon;

class OutputController extends Controller
{
    public function show()
    {
        $outputtedGoods = Output::with('user')
            ->with('good')
            ->select()
            ->get();
        $goods = GoodsTypes::get()->all();

        return view('allOutputtedGoods', ['outputtedGoods' => $outputtedGoods, 'goods' => $goods]);
    }
    public function output(Request $request){
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

        if($catalogItem && $catalogItem -> quantity >= $quantity){
            $catalogItem->quantity -= $quantity;
            if($catalogItem->quantity < 10 && $user_id !=1){
                $dt = Carbon::now()->addDay();

                $r = new RequestModel();
                $r->from_user_id = 1;
                $r->to_user_id = $user_id;
                $r->goods_id = $goodsId;
                $r->time = $dt->addDays(6);
                $r->quantity = 10;
                $r->save();
            }elseif($user_id == 1 && $catalogItem->quantity < 30){
                $mr = new MainRequest();
                $mr->goods_id = $goodsId;
                $mr->quantity = $quantity;
                $mr->save();
            }
            $catalogItem->save();
        }else{
            return response()->json([
                'status' => $status
            ]);
        }
        Output::create(array(
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
