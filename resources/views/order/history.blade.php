@extends('layouts.master')

@section('title','點餐紀錄')

@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/about-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>點餐紀錄</h1>
                        <span class="subheading">Order record.</span>
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
                        <th width="30" style="text-align: center">編號</th>
                        <th>標題</th>
                        <th width="70" style="text-align: center">精選？</th>
                        <th width="100" style="text-align: center">功能</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)

                            <tr>
                                <td style="text-align: center">
                                    {{$order->id}}
                                </td>
                                <td>
                                    {{$order->user_id}}
                                </td>
                                <td style="text-align: center">
                                    {{$order->date}}
                                    {{$order->time}}
                                </td>
                            </tr>
                        
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
