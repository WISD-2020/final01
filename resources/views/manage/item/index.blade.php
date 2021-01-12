@extends('manage.layouts.master')

@section('title', '菜單')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                目前訂單<small>當前訂單</small>
            </h1>
            <ol class="breadcrumb">

            </ol>
        </div>
    </div>
    <!-- /.row -->
    <a href="{{ route('manage.order.index') }}" class="btn btn-primary">返回</a>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="30" style="text-align: center">訂單號碼</th>
                        <th width="70">餐點名稱</th>
                        <th width="70" style="text-align: center">價格</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($foods as $food)
                    @foreach($items as $item )
                        <tr>
                            <td style="text-align: center">{{ $item->id }}</td>
                            <td style="text-align: center">{{ $item->food_id->$food->name }}</td>
                            <td style="text-align: center">{{ $item->food_id->$food->price }}</td>
                        </tr>
                    @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection
