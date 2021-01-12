@extends('manage.layouts.master')

@section('title', '顧客評論')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                顧客回報<small>所有回報列表</small>
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
                        <th width="30" style="text-align: center">問題號碼</th>
                        <th width="70">客戶名</th>
                        <th width="70" style="text-align: center">回報時間</th>
                        <th  style="text-align: center">標題</th>
                        <th  style="text-align: center">報怨內容</th>



                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td style="text-align: center">{{ $comment->id }}</td>
                            <td style="text-align: center">{{ $comment->user_id }}</td>
                            <td style="text-align: center">{{ $comment->date }}</td>
                            <td style="text-align: center">{{ $comment->title }}</td>
                            <td style="text-align: center">{{ $comment->content }}</td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection
