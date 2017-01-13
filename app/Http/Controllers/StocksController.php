<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stocks;
use App\User;

class StocksController extends Controller
{
    public function show()
    {
        $stocks = User::select()->get();
        return view('stocks', ['stocks' => $stocks]);
    }
}
