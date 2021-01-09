@extends('layouts.master')

@section('title','問題回報')

@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/about-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>問題回報</h1>
                        <span class="subheading">Problem return.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="form-group">
                    <label for="title">問題名稱：</label>
                    <input name="title" value="" class="form-control" placeholder="請輸入您所遇到的問題">
                </div>
                <BR>
                <div class="form-group">
                    <label for="content">問題內容敘述：</label>
                    <textarea id="content" name="content" class="form-control" rows="10"></textarea>
                </div>
                <BR>
                <div class="text-right">
                    <button type="submit" class="btn btn-success">提交</button>
                </div>
            </div>
        </div>
    </div>

@endsection
