@extends('layouts.master')

@section('title','結帳')

@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{asset('img/about-bg.jpg')}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>結帳</h1>
                        <span class="subheading">Pay.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">



                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th width="20%" style="text-align: center">餐點名稱</th>
                                <th width="10%" style="text-align: center">價格</th>
                                <th width="10%" style="text-align: center">數量</th>
                                <th width="10%" style="text-align: center">小計</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($carts as $cart)
                                <tr>
                                    <td style="text-align: center;line-height:100px;">
                                        {{$cart->name}}
                                    </td>
                                    <td style="text-align: center;line-height:100px;">
                                        ${{$cart->price}}
                                    </td>
                                    <td style="text-align: center;vertical-align: middle">
                                        {{$cart->amount}}
                                    </td>
                                    <td style="text-align: center;vertical-align: middle">
                                        ${{($cart->amount)*($cart->price)}}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                <div style="text-align:right">
                    <b>總計：<u>${{$total}}</u></b>
                </div>
                <BR>
                <table class="table table-bordered table-hover" border="0">
                    <thead>
                    <tr>
                        <th>
                             <div style="text-align:left">
                                訂購者：<b>{{$name}}</b>
                             </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div style="text-align:left">
                            電話：<b>{{$user->phone}}</b>
                            </div>
                        </th>
                    </tr>
                    </thead>
                </table>
                        <div style="text-align:center">
                            <a class="btn btn-sm btn-primary" href="{{route('dashboard')}}">送出訂單</a>
                        </div>
            </div>
        </div>
    </div>

@endsection
