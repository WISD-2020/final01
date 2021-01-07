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
{{--                <form action="/user/{{$user->id}}" method="POST" role="form">--}}
{{--                    @method('PATCH')--}}
{{--                    @csrf--}}

{{--                    --}}

{{--                </form>--}}
            </div>
        </div>
    </div>

@endsection
