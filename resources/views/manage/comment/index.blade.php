@extends('admin.layouts.master')

@section('title', '顧客評論')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                顧客評論 <small>所有評論列表</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 文章管理
                </li>
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
                        <th width="30" style="text-align: center">#</th>
                        <th>標題</th>
                        <th width="70" style="text-align: center">精選？</th>
                        <th width="100" style="text-align: center">功能</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(range(1, 20) as $id)
                        <tr>
                            <td style="text-align: center">{{ $id }}</td>
                            <td>評論標題</td>
                            <td style="text-align: center">V</td>
                            <td>
                                <a href="{{ route('admin.posts.edit', $id) }}">編輯</a>
                                /
                                <a href="#">刪除</a>
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
