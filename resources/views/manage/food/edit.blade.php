@extends('manage.layouts.master')

@section('title', '修改餐點')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                修改餐點
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
            <form  action="/manage/food/{{$food->id}}" method="POST" role="form">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label for="name">餐點名稱</label>
                    <input name="name" class="form-control" placeholder="請輸入餐點名稱" value="{{old('name',$food->name)}}">
                </div>

                <div class="form-group">
                    <label>價格</label>
                    <input name="price" class="form-control" placeholder="請輸入價格" value="{{old('price',$food->price)}}">
                </div>

                <div class="form-group">
                    <label>是否缺貨？</label>
                    <select name="is_selling" class="form-control" value="{{old('is_selling',$food->is_selling)}}">
                        <option  value="0">否</option>
                        <option  value="1">是</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>是否熱門？</label>
                    <select name="is_hot" class="form-control" value="{{old('is_hot',$food->is_hot)}}">
                        <option  value="0">否</option>
                        <option  value="1">是</option>
                    </select>
                </div>




                <div class="text-right">
                    <button type="submit" class="btn btn-success">修改</button>
                </div>
            </form>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>


        </div>
    </div>
    <!-- /.row -->
@endsection
