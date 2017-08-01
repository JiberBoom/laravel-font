@extends('layouts.app')


@section('content')
    @include('../layouts.sidebar')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">字体列表</div>
                    <div class="panel-body">
                        <a href="{{url('/admin/fonts/add')}}" class="btn btn-sm btn-success">新增</a>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" style="text-align: center">
                                <th class="info">编号</th>
                                <th class="info">字体名</th>
                                <th class="info">是否付费</th>
                                <th class="info">价格</th>
                                <th class="info">大小</th>
                                <th class="info">下载量</th>
                                <th class="info">语种</th>
                                <th class="info">标签</th>
                                <th class="info">状态</th>
                                <th class="info">时间</th>
                                <th class="info">上/下架</th>
                                <th class="info">操作</th>

                                @foreach($lists as $val)
                                    <tr>
                                        <td>{{$val->id}}</td>
                                        <td> {{$val->name}}</td>
                                        <td>
                                            @if($val->is_pay)
                                                <img width="30" height="30" src="/images/admin/pay.png" alt="付费字体" title="付费字体">
                                            @else
                                                <img width="30" height="30" src="/images/admin/free.png" alt="免费字体" title="免费字体">
                                            @endif
                                        </td>
                                        <td>{{$val->price}}</td>
                                        <td>{{$val->size}}</td>
                                        <td>{{$val->download}}</td>
                                        <td>{{$val->code}}</td>
                                        <td>
                                            @if($val->tags == 0)
                                                <img width="20" height="20" src="/images/admin/normal.png" alt="普通" title="普通">

                                            @elseif($val->tags == 1)
                                                <img width="30" height="30" src="/images/admin/news.png" alt="最新" title="最新">

                                            @elseif($val->tags == 2)
                                                <img width="30" height="30" src="/images/admin/hot.png" alt="最热" title="最热">

                                            @endif
                                        </td>
                                        <td>
                                            @if($val->status)
                                                <img width="30" height="30" src="/images/admin/uped.png" alt="已上架" title="已上架">

                                            @else
                                                <img width="30" height="30" src="/images/admin/downed.png" alt="已下架" title="已下架">

                                            @endif

                                        </td>
                                        <td>{{$val->created_at}}</td>
                                        <td>
                                            <a href="{{url('/fonts/'.$val->id.'/changeStatus/'.$val->status)}}" onclick="return confirm('确定要执行此操作吗？')">
                                                    <img width="30" height="30"
                                                         @if($val->status) src="/images/admin/down.png" alt="下架" title="下架操作"
                                                         @else src="/images/admin/up.png" alt="上架" title="上架操作"
                                                            @endif >
                                            </a>
                                        </td>
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
