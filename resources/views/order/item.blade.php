@extends('layouts.master')

@section('title','點餐明細')

@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{asset('img/about-bg.jpg')}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>點餐明細</h1>
                        <span class="subheading">Order details.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                    @csrf



                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="20%" style="text-align: center">餐點名稱</th>
                        <th width="20%" style="text-align: center">價格</th>
                        <th width="10%" style="text-align: center">數量</th>
                        <th width="20%" style="text-align: center">小計</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)


                            <tr>
                                <td style="text-align: center">
                                    {{$item->name}}
                                </td>
                                <td style="text-align: center">
                                    ${{$item->price}}
                                </td>
                                <td style="text-align: center">
                                    {{$item->amount}}
                                </td>
                                <td style="text-align: center">
                                    ${{($item->amount)*($item->price)}}
                                </td>
                            </tr>

                    @endforeach

                    </tbody>
                </table>
                <div style="text-align:right">
                    <b>總計：<u>${{$total}}</u></b>
                </div>
                <div align="center">
                <a class="btn btn-success" href="{{route('order.history')}}">返回</a>
                </div>
            </div>
        </div>
    </div>

@endsection
