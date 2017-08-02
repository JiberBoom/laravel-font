@extends('layouts.app')


@section('content')
    @include('../layouts.sidebar')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">语种列表</div>
                    <div class="panel-body">
                        <a href="{{url('/admin/languages/add')}}" class="btn btn-sm btn-success">新增</a>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" style="text-align: center">
                                <th class="info">编号</th>
                                <th class="info">国际语种code</th>
                                <th class="info">语种描述</th>
                                <th class="info">语种类别</th>
                                <th class="info">操作</th>

                                @foreach($lists as $val)
                                    <tr>
                                        <td>{{$val->id}}</td>
                                        <td> {{$val->code}}</td>
                                        <td>{{$val->desc}}</td>
                                        <td>{{$val->category}}</td>
                                        <td>
                                            <a href="{{url('admin/fonts/add')}}">
                                                <img width="15" height="15" src="/images/admin/add.png" alt="增加" title="增加操作">
                                            </a>
                                            <form style="display: inline" action="/fonts/{{$val->id}}" method="post">
                                                {{method_field('DELETE')}}
                                                {!! csrf_field() !!}

                                                <input type="image" src="/images/admin/delete.png" width="15" height="15" onclick="return confirm('确定要删除吗?')" alt="删除" title="删除操作">
                                            </form>

                                            <a href="/fonts/{{$val->id}}/edit">
                                                <img width="15" height="15" src="/images/admin/edit.png" alt="编辑" title="编辑操作">
                                            </a>
                                            <a href="/fonts/{{$val->id}}">
                                                <img width="15" height="15" src="/images/admin/info.png" alt="查看详情" title="{{$val->name}}">
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
    <script>

    </script>
    @endsection
