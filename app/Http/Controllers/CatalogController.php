<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\GoodsTypes;
use App\User;
use App\Catalog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class CatalogController extends Controller
{
    public function show(){
        $users = User::with('catalogs')->get();
        $goodsTypes = GoodsTypes::with('category')->get();

        $total = [];
        foreach ($users as $user) {
            $c = [];

            foreach ($goodsTypes as $goodsType) {
                $c[$goodsType->id] = 0;
                if(empty($total[$goodsType->id]))
                    $total[$goodsType->id] = 0;

                foreach ($user->catalogs as $catalog) {
                    if ($goodsType->id == $catalog->goods_id) {
                        $c[$catalog->goods_id] = $catalog->quantity;
                        $total[$goodsType->id] += $catalog->quantity;
                    }
                }
            }

            $user->c = $c;
        }
        $goods = GoodsTypes::select('id', 'name' , 'category_id')->with('category')->get();


        return view('catalog', ['goodsTypes' => $goodsTypes, 'users' => $users, 'goods' => $goods, 'total' => $total]);
    }

    public function change(Request $request){
        $catalogItem =  Catalog::where('goods_id', $request['toChangeCatalogId'])->where('user_id', Auth::id())->first();
        $status = "fail";
        $v = Validator::make($request->all(), [
            'operator' => 'required',
            'toChangeCatalogId' => 'required',
            'goodsQuantity' => 'required'

        ]);

        $v->after(function ($v) use ($catalogItem, $request) {
            if ($request ->quantityPlusOrMinus == 'minus' && $catalogItem['quantity'] < $request->goodsQuantity) {
                $v->errors()->add('quantity', 'You dont have enough goods.');
            }
        });

        if($v->fails()){
            return response()->json([
                'status' => false,
                'errors' => $v->errors()->all()
            ]);
        }


        if($catalogItem){
            if($request->operator == 'plus'){
                $catalogItem->quantity +=  $request->goodsQuantity;
            }elseif($request->operator == 'minus'){
                $catalogItem->quantity -=  $request->goodsQuantity;
            }
        }else{
            $catalogItem = new Catalog();
            $catalogItem->goods_id = $request->toChangeCatalogId;
            $catalogItem->user_id = Auth::id();
            $catalogItem->quantity = $request->goodsQuantity;
        }

        if($catalogItem && $catalogItem->save()){
            $status = "success";
        }

        return response()->json([
            'status' => $status,
            'catalogItem' => $catalogItem
        ]);

        //        $catalog = new Catalog();
        //        $catalog->goods_id = "9";
        //        $catalog->user_id = "2";
        //        $catalog->quantity = 6;
        //        Catalog::create($catalog['attributes']);
    }

}
