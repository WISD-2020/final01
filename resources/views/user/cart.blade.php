@extends('layouts.master')

@section('title','購物車')

@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{asset('img/about-bg.jpg')}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>購物車</h1>
                        <span class="subheading">Cart.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

            @if(count($carts)>0)

                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th width="20%" style="text-align: center">餐點名稱</th>
                                <th width="10%" style="text-align: center">價格</th>
                                <th width="10%" style="text-align: center">訂購數量</th>
                                <th width="10%" style="text-align: center">小計</th>
                                <th width="15%" style="text-align: center">刪除餐點</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($carts as $cart)
                                <tr>
                                    <td style="text-align: center;line-height:100px;">
                                        {{$cart->name}}
                                    </td>
                                    <td style="text-align: center;line-height:100px;">
                                        {{$cart->price}}
                                    </td>
                                    <td style="text-align: center;vertical-align: middle">
                                        {{$cart->amount}}
                                    </td>
                                    <td style="text-align: center;vertical-align: middle">
                                        {{($cart->amount)*($cart->price)}}
                                    </td>
                                    <td style="text-align: center;vertical-align: middle">
                                        <form action="/user/delete/{{$cart->id}}" method="POST"style=" display: inline">
                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" class="btn btn-danger">刪除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                <form action="/user/add" method="post" role="form">
                    @method('POST')
                    @csrf
                        <div style="text-align:center">
                            <button type="submit" class="btn btn-sm btn-primary" name="food_id" value="">送出訂單</button>
                        </div>



                        <!-- Pager -->
                    </form>
                @else
                    <div style="text-align: center">
                        購物車裡空空如也
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
