@extends('layouts.app')


@section('content')
    @include('../layouts.sidebar')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">权限列表</div>
                    <div class="panel-body">
                        <a href="{{url('/permissions/add')}}" class="btn btn-sm btn-success">新增</a>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" style="text-align: center">
                                <tr>
                                    <td class="info">编号</td>
                                    <td class="info">权限名</td>
                                    <td class="info">权限Guard</td>
                                    <td class="info">时间</td>
                                    <td class="">操作</td>
                                </tr>

                                @foreach($lists as $val)

                                    <tr>
                                        <td>{{$val->id}}</td>
                                        <td> {{$val->name}}</td>
                                        <td>{{$val->guard_name}}</td>
                                        <td>{{$val->created_at}}</td>
                                        <td>
                                            <a href="{{url('/permissions/add')}}">
                                                <img width="15" height="15" src="/images/admin/add.png" alt="增加" title="增加操作">
                                            </a>

                                            <a href="/permissions/{{$val->id}}/edit">
                                                <img width="15" height="15" src="/images/admin/edit.png" alt="编辑" title="编辑操作">
                                            </a>

                                        </td>
                                    </tr>

                                @endforeach
                            </table>
                            {!! PaginateRoute::renderPageList($lists,false,'pagination',true) !!}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection
