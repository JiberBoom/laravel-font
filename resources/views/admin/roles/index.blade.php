@extends('layouts.app')


@section('content')
    @include('../layouts.sidebar')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">角色列表</div>
                    <div class="panel-body">
                        <a href="{{url('/roles/add')}}" class="btn btn-sm btn-success">新增</a>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" style="text-align: center">
                                <tr>
                                    <td class="info">编号</td>
                                    <td class="info">角色名</td>
                                    <td class="info">角色Guard</td>
                                    <td class="info">成员数</td>
                                    <td class="info">权限数</td>
                                    <td class="info">时间</td>
                                    <td class="info">操作</td>
                                </tr>

                                @foreach($roles as $val)

                                    <tr>
                                        <td>{{$val->id}}</td>
                                        <td> {{$val->name}}</td>
                                        <td>{{$val->guard_name}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#usersModal{{$val->id}}" data-whatever="@getbootstrap"><span class="badge">{{$val->users->count()}}</span>
                                            </button>
                                            {{--用户模态框--}}

                                            <div class="modal fade" id="usersModal{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="exampleModalLabel">成员列表</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table  class="table table-striped table-bordered table-hover" >
                                                                <tr>
                                                                    <td  class="info">姓名</td>
                                                                    <td  class="info">邮箱</td>
                                                                </tr>

                                                                @foreach($val->users as $vval)
                                                                    <tr>
                                                                        <td>{{$vval->name}}</td>
                                                                        <td>{{$vval->email}}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#permissionsModal{{$val->id}}" data-whatever="@getbootstrap"><span class="badge">{{$val->permissions->count()}}</span>
                                            </button>
                                            {{--权限模态框--}}

                                            <div class="modal fade" id="permissionsModal{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="exampleModalLabel">权限列表</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table  class="table table-striped table-bordered table-hover" >
                                                                <tr>
                                                                    <td  class="info">编号</td>
                                                                    <td  class="info">权限名</td>
                                                                    <td  class="info">权限Guard</td>
                                                                </tr>

                                                                @foreach($val->permissions as $vval)
                                                                    <tr>
                                                                        <td>{{$vval->id}}</td>
                                                                        <td>{{$vval->name}}</td>
                                                                        <td>{{$vval->guard_name}}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                        <td>{{$val->created_at}}</td>
                                        <td>撤回 | 编辑 | 增加</td>
                                    </tr>

                                @endforeach
                            </table>
                            {!! PaginateRoute::renderPageList($roles,false,'pagination',true) !!}
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
