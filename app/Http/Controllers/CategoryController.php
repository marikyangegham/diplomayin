<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
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
    public function create()
    {
        //
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
        return view('categories', ['categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $toChangeCategoryId = $request->all()['id'];
        $newName = $request->all()['category_name'];
        $newName = strtolower($newName);
        $category =  Category::where('id', $toChangeCategoryId)->first();
        $category['category_name'] = $newName;
        $status = "fail";
        $v = Validator::make($request->all(), [
            'category_name' => 'required|unique:category'

        ]);
        if($newName && !$v->fails() && $category->save()){
            $status = "success";
        }

        return response()->json([
        'status' => $status
        ]);
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
    public function destroy(Request $request)
    {
        $toRemove = $request->all();
        $category = Category::find($toRemove['id']);
        $status = "fail";

        if($category && $category->delete()){
            $status = "success";
        };

        return response()->json([
            'status' => $status
        ]);


    }
}
