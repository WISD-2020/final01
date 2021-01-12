@extends('manage.layouts.master')

@section('title', '菜單')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                林的菜單<small>所有菜單</small>
            </h1>
            <ol class="breadcrumb">

            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- /.row -->
    <div class="col-lg-12">
        <a href="{{ route('manage.food.create') }}" class="btn btn-success">建立餐點</a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="30" style="text-align: center">餐點號碼</th>
                        <th width="70">餐點名稱</th>
                        <th width="70" style="text-align: center">價格</th>
                        <th  style="text-align: center">是否缺貨</th>
                        <th  style="text-align: center">是否為熱門餐點</th>
                        <th>圖片</th>
                        <th>動作</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($foods as $food)
                        <tr>
                            <td style="text-align: center">{{ $food->id }}</td>
                            <td style="text-align: center">{{ $food->name }}</td>
                            <td style="text-align: center">{{ $food->price }}</td>
                            <td style="text-align: center">{{ ($food->is_selling)? 'V':'X' }}</td>
                            <td style="text-align: center">{{ ($food->is_hot)? 'V':'X' }}</td>
                            <td style="text-align: center">{{$food->image}}</td>



                            <td>

                                <a href="{{ route('manage.food.edit', $food->id) }}" class="btn btn-primary">編輯</a>

                                <form action="{{route('manage.food.destroy',$food->id)}}" method="POST"style=" display: inline">

                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger" onclick="return confirm('是否確認刪除')">刪除</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection
