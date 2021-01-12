@extends('layouts.master')

@section('title','修改會員資料')

@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{asset('img/post-bg.jpg')}}')">
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
                    
                        @if(session()->has('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                    <div class="form-group">
                        <label for="name">會員名稱：</label><br>
                        {{$user->name}}
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="sex">性別：</label><br>
                        {{($user->sex)? '男' : '女' }}
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="birthday">生日：</label><br>
                        {{$user->birthday}}
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="phone">電話：</label><br>
                        <input name="phone" value="{{$user->phone}}" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="email">電子郵件：</label><br>
                        {{$user->email}}
                    </div>
                    <br><br>

                    <input type="submit" class="btn btn-success" name="submit" value="修改">

                </form>
            </div>
        </div>
    </div>

@endsection
