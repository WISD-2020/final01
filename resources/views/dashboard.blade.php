@extends('layouts.master')

@section('title','首頁')

@section('content')



    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>今晚...我想來點...</h1>
                        <span class="subheading">Tonight...I want to have some...</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <form action="/food/create" method="post" role="form">
                    @method('POST')
                    @csrf

                    @if(session()->has('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <input type="hidden" name="amount" value="1">
                    <input type="hidden" name="user_id" value="{{$name->name}}">
                <table class="table table-bordered table-hover">
                    <thead>

                        <tr>
                            <th width="15%" style="text-align: center">餐點編號</th>
                            <th width="20%" style="text-align: center">圖片</th>
                            <th width="30%" style="text-align: center">餐點名稱</th>
                            <th width="15%" style="text-align: center">價格</th>
                            <th width="20%" style="text-align: center">操作</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($foods as $food)
                    <tr>
                        <td style="text-align: center;line-height:100px;">
                            {{$food->id}}
                        </td>
                        <td style="text-align: center;line-height:100px;">
                           <img src="{{$food->image}}" width="100" height="100">
                        </td>
                        <td style="text-align: center;line-height:100px;">
                            {{$food->name}}
                        </td>
                        <td style="text-align: center;line-height:100px;">
                            ${{$food->price}}
                        </td>
                        <td style="text-align: center;line-height:100px;">
                            <a class="btn btn-sm btn-primary" href="{{route('food.show',$food->id)}}">購買</a>
                        </td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>

                <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">下一頁 &rarr;</a>
                </div>
                </form>
            </div>
        </div>
    </div>
    <a href="{{route('manage.dashboard.index')}}" class="ml-1 underline">重新整理</a>
@endsection
