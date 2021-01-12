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

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="30" style="text-align: center">訂單號碼</th>
                        <th width="70">顧客郵箱</th>
                        <th width="70" style="text-align: center">訂單日期</th>
                        <th  style="text-align: center">是否有打折</th>
                        <th  style="text-align: center">總額</th>
                        <th>完成</th>
                        <th>訂單確認</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td style="text-align: center">{{ $order->id }}</td>
                            <td style="text-align: center">{{ $order->user_id }}</td>
                            <td style="text-align: center">{{ $order->date }}</td>
                            <td style="text-align: center">{{ ($order->is_discount)? 'V':'X' }}</td>
                            <td style="text-align: center">{{$order->last_price}}</td>
                            <td style="text-align: center">{{ ($order->ma_check)? 'V':'X' }}</td>

                            <td>

                                <a href="{{ route('manage.item.index', $order->id) }}" class="btn btn-primary">明細</a>

                                <form action="{{route('manage.order.destroy',$order->id)}}" method="POST"style=" display: inline">

                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger" onclick="return confirm('是否確認刪除')">訂單送出</button>
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
