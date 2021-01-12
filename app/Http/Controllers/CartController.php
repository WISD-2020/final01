<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CartController extends Controller
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

            $name = Auth::user()->name;

            $carts = DB::table('carts')
                ->join('food', 'carts.food_id', '=', 'food.id')
                ->where('carts.user_id', $name)
                ->select('carts.id', 'food.name', 'carts.amount', 'food.price')
                ->get();

            ['carts'=>$carts];

            $total=0;

                foreach ($carts as $cart)
                {
                    $total = ($cart->price)*($cart->amount)+$total;
                }

            #dd($total);
            $data=['carts'=>$carts,'total'=>$total];
            return view('cart.index',$data);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        #dd($request);
        Cart::create($request->all());
        return redirect()->route('dashboard')->with('status','系統提示：餐點已加入購物車');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Cart::destroy($id);
        return redirect()->route('cart.index');
    }

    public function final()
    {
        $user=Auth::user();

        /** @var TYPE_NAME $name */
        $name=Auth::user()->name;

        $carts = DB::table('carts')
            ->join('food', 'carts.food_id', '=', 'food.id')
            ->where('carts.user_id', $name)
            ->select('carts.id','food.name', 'carts.amount', 'food.price')
            ->get();

        ['carts'=>$carts];

        $total=0;

        foreach ($carts as $cart)
        {
            $total = ($cart->price)*($cart->amount)+$total;
        }

        $data=['name'=>$name,'carts'=>$carts,'total'=>$total,'user'=>$user];
        return view('cart.final',$data);
    }

    public function clear()
    {
        $name=Auth::user()->name;

        #dd($carts);

        Order::create([
            'user_id'=>$name,
            'date'=>Carbon::now()->toDateString(),
            'time'=>Carbon::now(),
            'is_discount'=>0,
            'us_check'=>0,
            'ma_check'=>0,
        ]);

        $order_id=DB::table('orders')
            ->where('user_id',$name)
            ->orderBy('time','desc')
            ->select('id')
            ->first();

        $carts=DB::table('carts')
            ->join('food','carts.food_id','=','food.id')
            ->select('food.id','food.price','amount')
            ->where('carts.user_id',$name)
            ->get();

        ['carts'=>$carts];

        foreach ($carts as $cart)
        {
        Item::create([
            'order_id'=>$order_id->id,
            'food_id'=>$cart->id,
            'amount'=>$cart->amount,
            'total'=>$cart->price,
        ]);
        }

        Cart::where('user_id',$name)->delete();

        return redirect()->route('order.history')->with('status','系統提示：訂單已送出！');
    }
}
