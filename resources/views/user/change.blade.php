@extends('layouts.master')

@section('title','修改會員資料')

@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/about-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>修改會員資料</h1>
                        <span class="subheading">Modify your personal information.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <form action="/user/{{$user->id}}" method="POST" role="form">
                    @method('PATCH')
                    @csrf


                    會員名稱：<br>
                    {{$user->name}}<br><br>

                    性別：<br>
                    {{($user->sex)? '男' : '女' }}<br><br>

                    生日：<br>
                    {{$user->birthday}}<br><br>

                    電話：<br>
                    <input type="text" name="phone" value="{{$user->phone}}"><br><br>

                    電子郵件：<br>
                    {{$user->email}} <br><br><br>

                    <input type="submit" class="btn btn-success" name="submit" value="修改">

                </form>
            </div>
        </div>
    </div>

@endsection
