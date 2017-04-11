<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\GoodsTypes;
use Illuminate\Support\Facades\Validator;

class AddNewGoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $inputName = $request->input('name');
        $price = $request->input('price');
        $measurement = $request->input('measurement');
        $inputName = strtolower($inputName);
        $inputCategory = $request->input('selected_category');

        $v = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'selected_category' => 'required'
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }else {
            $goodsType = GoodsTypes::where('name', $inputName)->where('category_id', $inputCategory)->first();
            if($goodsType){
                return redirect()->back()->withErrors(["The record already exists"]);
            }else{
                GoodsTypes::create(array(
                    'name' => $inputName,
                    'price' => $price,
                    'measurement' => $measurement,
                    'category_id' => $inputCategory
                ));
            }

            return redirect('/goods');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $categories = Category::select()->get();
        return view('addNewGoods', ['categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        dd($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
