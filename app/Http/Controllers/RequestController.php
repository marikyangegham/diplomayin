<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Request as RequestModel;

use Illuminate\Support\Facades\Auth;
use App\GoodsTypes;
use App\Catalog;
use App\MainRequest;

class RequestController extends Controller
{
    public function show()
    {
        $requestsFromMe = RequestModel::with('good')
            ->with('toUser')
            ->where('from_user_id', Auth::id())
            ->where('viewed',0)
            ->get();

        $requestsToMe = RequestModel::with('good')
            ->with('fromUser')
            ->where('to_user_id', Auth::id())
            ->where('viewed',0)
            ->get();

        $mainRequests = MainRequest::with('good')->get();

        return view('request', compact('requestsToMe', 'requestsFromMe', 'mainRequests'));
    }
    public function request(Request $request){
        $goods_id = $request->goods_id;
        $quantity = $request->quantity;
        $to_user_id = Auth::id();
        $dt = Carbon::now()->addDay();

        $goodsCountInMainStock = Catalog::where('goods_id',$goods_id)
                                        ->where('user_id', 1)
                                        ->where('quantity', '>=', $quantity )
                                        ->exists();
        if($goodsCountInMainStock == 1){
            $r = new RequestModel();
            $r->from_user_id = 1;
            $r->to_user_id = $to_user_id;
            $r->goods_id = $goods_id;
            $r->time = $dt;
            $r->quantity = $quantity;
            $r->save();

            return response()->json([
                'status' => 'success'
            ]);
        }else{
            $goodsInOtherStock = Catalog::where('goods_id',$goods_id)
                ->whereNotIn('user_id', [1, $to_user_id])
                ->where('quantity', '>=', $quantity )
                ->first();

            $mr = new MainRequest();
            $mr->goods_id = $goods_id;
            $mr->quantity = $quantity;
            $mr->save();

            if($goodsInOtherStock){
                $r = new RequestModel();
                $r->from_user_id = $goodsInOtherStock->user_id;
                $r->to_user_id = $to_user_id;
                $r->goods_id = $goods_id;
                $r->time = $dt;
                $r->quantity = $quantity;
                $r->save();
                return response()->json([
                    'status' =>  'success'
                ]);
            }else{
                $r = new RequestModel();
                $r->from_user_id = 1;
                $r->to_user_id = $to_user_id;
                $r->goods_id = $goods_id;
                $r->time = $dt->addDays(6);
                $r->quantity = $quantity;
                $r->save();
                return response()->json([
                    'status' => 'success'
                ]);
            }
        }

        return response()->json([
            'status' => 'failed'
        ]);
    }


    public function allRequests(){
        try{

            $count = RequestModel::where('from_user_id', Auth::id())->where('viewed',0)->get()->count();
            $status = 'success';

            return response()->json([
                'status' => $status,
                'count' => $count
            ]);

        }catch(\Exception $e){
            return response()->json([
                'status' => 'failed',
                'error' => $e->getMessage()
            ]);
        }

    }
}
