@extends('layouts.master')

@section('title','餐點詳細')

@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{asset('img/about-bg.jpg')}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>餐點詳細</h1>
                        <span class="subheading">Food details.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <form action="/cart/store" method="post">
                    @method('POST')
                    @csrf
                    <input type="hidden" name="user_id" value="{{$name}}">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="10%" style="text-align: center">餐點名稱</th>
                            <th width="10%" style="text-align: center">價格</th>
                            <th width="10%" style="text-align: center">數量</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($food as $food)
                            <tr>
                                <td style="text-align: center;line-height:100px;">
                                    {{$food->name}}
                                </td>
                                <td style="text-align: center;line-height:100px;">
                                    ${{$food->price}}
                                </td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <input style="width: 50%;" type="number" name="amount" min="1" max="99" value="1">
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                <div style="text-align:center">
                    <a class="btn btn-sm btn-danger" href="{{route('dashboard')}}">取消</a>
                    &emsp;&emsp;<button type="submit" class="btn btn-sm btn-primary" name="food_id" value="{{$food->id}}">加入購物車</button>
                </div>

            </div>
        </div>
    </div>

@endsection
