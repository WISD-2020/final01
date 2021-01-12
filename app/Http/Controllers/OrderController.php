<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            // 已登入

            $name=Auth::user()->name;
            $orders=Order::where('user_id',$name)->get();
            $data=['orders'=>$orders];
            #dd($data);
            return view('order.history',$data);
        }
        else
        {
            return redirect()->route('login');
        }
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()) {
            // 已登入

            $name=Auth::user()->name;

            $for_total = DB::table('items')
                ->join('food', 'items.food_id', '=', 'food.id')
                ->join('orders','items.order_id','=','orders.id')
                ->where('orders.user_id', $name)
                ->where('orders.id',$id)
                ->select('items.order_id','food.name','items.amount','food.price')
                ->get();

            #dd($for_total);
            ['for_total'=>$for_total];

            $total=0;

            foreach ($for_total as $thing)
            {
                $total = ($thing->price)*($thing->amount)+$total;
            }

            $items=DB::table('items')
                ->join('food','food_id','=','id')
                ->select('food.name','amount','food.price')
                ->where('order_id','=',$id)
                ->get();

            $data=['items'=>$items,'total'=>$total];
            #dd($data);
            return view('order.item',$data);
        }
        else
        {
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
