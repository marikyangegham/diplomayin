<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deliveryman;
use Illuminate\Support\Facades\Validator;

class DeliverymanController extends Controller
{
    public function show()
    {
        return view('addNewDeliveryman');
    }
    public function showList()
    {
        $deliverymans = Deliveryman::select()->get();
        return view('deliveryman', ['deliverymans' => $deliverymans]);
    }
    public function create(Request $request)
    {
        $input = $request->input('deliveryman_name');
        $input = strtolower($input);

        $deliveryman = Deliveryman::where('deliveryman_name', $input)->first();
        $v = Validator::make($request->all(), [
            'deliveryman_name' => 'required|unique:deliveryman'

        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }else if(!$deliveryman){
            Deliveryman::create(array(
                'deliveryman_name' => $input
            ));
            return redirect('/deliveryman');
        }else{
            return redirect()->back()->withErrors($v->errors());
        }
    }
    public function destroy(Request $request){
        $toRemoveId = $request->all()['id'];
        $deliveryman = Deliveryman::find($toRemoveId);
        $status = "fail";
        if($toRemoveId && $deliveryman->delete()){
            $status = "success";
        };
        return response()->json([
            'status' => $status
        ]);
    }
    public function edit(Request $request)
    {
        $toChangeDeliverymanId = $request->all()['deliveryman_id'];
        $newName = $request->all()['name'];
        $newName = strtolower($newName);
        $deliveryman =  Deliveryman::where('id', $toChangeDeliverymanId)->first();
        $deliveryman['deliveryman_name'] = $newName;
        $status = "fail";
        $v = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if($newName && $toChangeDeliverymanId && !$v->fails() && $deliveryman->save()){
            $status = "success";
        }
        return response()->json([
            'status' => $status
        ]);
    }
}
