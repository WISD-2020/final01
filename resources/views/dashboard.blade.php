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
                1<img src="img/french-fries.jpg" width="200" height="200">
                <hr>
                2
                <hr>
                3
                <hr>
                4
                <hr>
                <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">下一頁 &rarr;</a>
                </div>
            </div>
        </div>
    </div>

@endsection
