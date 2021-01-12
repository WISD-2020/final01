@extends('manage.layouts.master')

@section('title', '新增文章')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            新增餐點
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 餐點管理
            </li>
        </ol>
    </div>
</div>

<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/manage/food/store" enctype="multipart/form-data" method="POST" role="form">
            @method("POST")
            @csrf


            <div class="form-group">
                <label>餐點名稱</label>
                <input name="name" class="form-control" placeholder="請輸入餐點名稱">
            </div>

            <div class="form-group">
                <label>價格</label>
                <input name="price" class="form-control" placeholder="請輸入價格">
            </div>

            <div class="form-group">
                <label>是否缺貨？</label>
                <select name="is_selling" class="form-control">
                    <option  value="0">否</option>
                    <option  value="1">是</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">餐點圖片</label>
                <input type = "file" name="image" class="form-control" >
            </div>

            <div class="form-group">
                <input type="hidden" name="is_hot" value="0">
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-success">新增</button>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </form>
    </div>
</div>
<!-- /.row -->
@endsection
