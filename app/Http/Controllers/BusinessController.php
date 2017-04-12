<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReturnGoods;
use App\Input;
use App\Output;
use App\GoodsTypes;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    public function show()
    {
        $returnedGoods = ReturnGoods::with('user')
            ->with('good')
            ->select()
            ->get();
        $inputtedGoods = Input::with('user')
            ->with('good')
            ->select()
            ->get();
        $outputtedGoods = Output::with('user')
            ->with('good')
            ->select()
            ->get();
        $goods = GoodsTypes::all();

        return view('business', ['returnedGoods' => $returnedGoods,
            'inputtedGoods' => $inputtedGoods,
            'outputtedGoods' => $outputtedGoods,
            'goods' => $goods]);
    }
}
