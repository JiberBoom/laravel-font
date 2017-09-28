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
                                        {{--分配成员--}}
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
                                                                    <td  class="info">操作</td>
                                                                </tr>

                                                                @foreach($val->users as $vval)
                                                                    <tr>
                                                                        <td>{{$vval->name}}</td>
                                                                        <td>{{$vval->email}}</td>
                                                                        <td><a href="{{url('/roles/'.$val->name.'/revokeRole/'.$vval->id)}}">撤回角色</a></td>
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
                                        {{--分配权限--}}
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
                                                                    <td class="info">操作</td>
                                                                </tr>

                                                                @foreach($val->permissions as $vval)
                                                                    <tr>
                                                                        <td>{{$vval->id}}</td>
                                                                        <td>{{$vval->name}}</td>
                                                                        <td>{{$vval->guard_name}}</td>
                                                                        <td><a href="{{url('/roles/'.$val->id.'/revokePermission/'.$vval->name)}}">撤回权限</a></td>
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
                                        <td>
                                            <a href="{{url('/roles/'.$val->id.'/edit')}}">编辑</a> |
                                            <a href="{{url('/roles/add')}}">增加</a> |
                                            <a href="#" data-toggle="modal" data-target="#assignUsersModal{{$val->id}}" data-whatever="@getbootstrap"><span class="badge">分配成员</span> |
                                            </a>
                                            {{--用户列表模态框--}}
                                            <div class="modal fade" id="assignUsersModal{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="exampleModalLabel">用户列表</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table  class="table table-striped table-bordered table-hover" >
                                                                <tr>
                                                                    <td  class="info">编号</td>
                                                                    <td  class="info">姓名</td>
                                                                    <td  class="info">邮箱</td>
                                                                    <td></td>
                                                                </tr>

                                                                @foreach($userlists as $uval)
                                                                    <tr>
                                                                        <td>{{$uval->id}}</td>
                                                                        <td>{{$uval->name}}</td>
                                                                        <td>{{$uval->email}}</td>
                                                                        <td><input type="checkbox" name="users" value="{{$uval->id}}"></td>
                                                                    </tr>
                                                                @endforeach
                                                            </table>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                                            <button type="button" role_id="{{$val->id}}" role_name="{{$val->name}}" class="btn btn-primary"  onclick="assignFunc(event)" >分配</button>
                                                        </div>
                                                        {{--警告框--}}
                                                        <div class="alert alert-danger alert-dismissible" role="alert" style="display: none">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <strong>警告!</strong> 分配成员失败！
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#"> <span class="badge" data-toggle="modal" data-target="#assignPermissionsModal{{$val->id}}">分配权限</span></a>

                                            {{--权限列表模态框--}}
                                            <div class="modal fade" id="assignPermissionsModal{{$val->id}}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">权限列表</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table  class="table table-striped table-bordered table-hover" >
                                                                <tr>
                                                                    <td  class="info">编号</td>
                                                                    <td  class="info">权限名</td>
                                                                    <td  class="info">权限Guard</td>
                                                                    <td></td>
                                                                </tr>

                                                                @foreach($permissionlists as $pval)
                                                                    <tr>
                                                                        <td>{{$pval->id}}</td>
                                                                        <td>{{$pval->name}}</td>
                                                                        <td>{{$pval->guard_name}}</td>
                                                                        <td><input type="checkbox" name="permissions" value="{{$pval->name}}"></td>
                                                                    </tr>
                                                                @endforeach
                                                            </table>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                                            <button type="button" role_id="{{$val->id}}" role_name="{{$val->name}}" class="btn btn-primary"  onclick="assignPermissionFunc(event)" >分配</button>
                                                        </div>
                                                        {{--警告框--}}
                                                        <div class="alert assign-permission-alert alert-danger alert-dismissible" role="alert" style="display: none">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <strong>警告!</strong> 分配权限失败！
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
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

        //分配成员
        function assignFunc(e) {

            var chk_value =[];//获取选中的用户id列表
            var role_name = $(e.currentTarget).attr('role_name');//获取角色名
            var role_id = $(e.currentTarget).attr('role_id');//获取角色id

            $('input[name="users"]:checked').each(function(){

                chk_value.push($(this).val());

            });

            $.ajax({
                type: 'GET',
                url: '/roles/assignRole',
                data: {'ids[]':chk_value,'role_name':role_name},
                success: function (data) {

                    if(data){
                        $(".alert").css('display','none');
                        $(e.currentTarget).attr({
                            'data-toggle':'modal',
                            'data-target':'#assignPermissionsModal'+role_id
                        });

                        var a = "assignUsersModal"+role_id;

                        $('#a').modal('hide');

                        parent.location.reload();
                    }
                },
                error:function (data) {

                    $(".alert").css('display','block');

                    setTimeout(function () {
                        $(".alert").css('display','none');

                    },3000);

                },
                dataType: 'json'
            });
        }

        //分配权限
        function assignPermissionFunc(e) {

            var chk_value =[];//获取选中的权限名字列表
            var role_id = $(e.currentTarget).attr('role_id');//获取角色id

            $('input[name="permissions"]:checked').each(function(){

                chk_value.push($(this).val());

            });

            $.ajax({
                type: 'GET',
                url: '/roles/assignRolePermission',
                data: {'permission_names[]':chk_value,'role_id':role_id},
                success: function (data) {

                    if(data.code=='200'){

                        $(".assign-permission-alert").css('display','none');
                        $(e.currentTarget).attr({
                            'data-toggle':'modal',
                            'data-target':'#assignPermissionsModal'+role_id
                        });

                        var a = "assignPermissionsModal"+role_id;

                        $('#a').modal('hide');

                        parent.location.reload();

                    }else if(data.code=='201'){

                        $(".assign-permission-alert").css('display','block');

                        setTimeout(function () {
                            $(".assign-permission-alert").css('display','none');

                        },3000);
                    }
                },
                error:function (data) {

                    $(".assign-permission-alert").css('display','block');

                    setTimeout(function () {
                        $(".assign-permission-alert").css('display','none');

                    },3000);

                },
                dataType: 'json'
            });
        }

    </script>
@endsection
