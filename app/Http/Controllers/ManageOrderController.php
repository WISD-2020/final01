<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ManageOrderController extends Controller
{
    public function index()
    {
        $order =Order::OrderBy('id','DESC')->get();
        $data=['orders'=>$order];
        return view('manage.order.index',$data);
    }

    public function edit($id)
    {
        $order=Order::find($id);
        $data=['food'=>$order];

        return view('manage.order.edit',$data);
    }

    public function update(Request $request,$id)
    {
        $order=Order::find($id);
        $order->update($request->all());
        return redirect()->route('manage.order.index');
    }


    public function destroy($id)
    {
        Order::destroy($id);
        return redirect()->route('manage.order.destroy');
    }
}
