<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\GoodsTypes;
use App\User;
use App\Catalog;

class CatalogController extends Controller
{
    public function show(){
        $users = User::with('catalogs')->get();
        $goodsTypes = GoodsTypes::with('category')->get();

        foreach ($users as $user) {
            $c = [];
            foreach ($goodsTypes as $goodsType) {
                $c[$goodsType->id] = 0;
                foreach ($user->catalogs as $catalog) {
                    if ($goodsType->id == $catalog->goods_id) {
                        $c[$catalog->goods_id] = $catalog->quantity;
                    }
                }
            }

            $user->c = $c;
        }
        $goods = GoodsTypes::select('id', 'name' , 'category_id')->with('category')->get();
//        foreach ($goods as $item){
//            print_r($item['id']);
//        }

        return view('catalog', ['goodsTypes' => $goodsTypes, 'users' => $users, 'goods' => $goods]);
    }

    public function change(Request $request){

        dd($request->all());
        //        $catalog = new Catalog();
        //        $catalog->goods_id = "9";
        //        $catalog->user_id = "2";
        //        $catalog->quantity = 6;
        //        Catalog::create($catalog['attributes']);
    }

}
