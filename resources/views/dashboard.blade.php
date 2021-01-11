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
                <table class="table table-bordered table-hover">
                    <thead>
                    @foreach($foods as $food)
                        <tr>
                            <th width="20%" style="text-align: center">圖片</th>
                            <th width="15%" style="text-align: center">餐點名稱</th>
                            <th width="15%" style="text-align: center">價格</th>
                            <th width="15%" style="text-align: center">訂購數量</th>
                            <th width="20%" style="text-align: center">加入購物車</th>
                        </tr>
                    </thead>
                    <tbody>


                    <tr>
                        <td style="text-align: center;line-height:100px;">
                            {{$food->image}}<img src="img/french-fries.jpg" width="100" height="100">
                        </td>
                        <td style="text-align: center;line-height:100px;">
                            {{$food->name}}
                        </td>
                        <td style="text-align: center;line-height:100px;">
                            {{$food->price}}
                        </td>
                        <td style="text-align: center;vertical-align: middle">
                            <form action="" method="post">
                            <input type="text" name="amount" class="form-control" value="1">
                            </form>
                        </td>
                        <td style="text-align: center;line-height:100px;">
                            <a class="btn btn-sm btn-primary" href="">送出</a>
                        </td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>
                
                <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">下一頁 &rarr;</a>
                </div>
            </div>
        </div>
    </div>

@endsection
