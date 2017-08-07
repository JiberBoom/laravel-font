<?php

namespace App\Http\Controllers\Admin\Roles;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with(['users','permissions'])->orderBy('id','desc')->paginate(5);//查询角色对应的用户

        $userlists = User::all();

        $permissionlists = Permission::all();

        return view('admin.roles.index',['roles'=>$roles,'userlists'=>$userlists,'permissionlists'=>$permissionlists]);

    }

    //授予角色
    public function assignRole(Request $request)
    {
        $ids = $request->get('ids');

        foreach($ids as $k=>$v){

            User::find($v)->assignRole($request->get('role_name'));

        }
        return 1;
    }

    //撤回角色
    public function revokeRole(Request $request,$role_name,$uid)
    {
        $user = User::find($uid);

        if($user->hasRole($role_name)){

            $user->removeRole($role_name);//撤回角色

            return redirect('/roles/index');

        }else{

            return view('error.503');
        }

    }

    //给角色授予权限
    public function assignRolePermission(Request $request)
    {

        $roles = Role::find($request->get('role_id'));

        $permission_names = $request->get('permission_names');//多个权限

        $is_has_permission = false;

        //检测该角色是否授权过其中某个权限
        foreach($permission_names as $k=>$v){

            $res = $roles->hasPermissionTo($v);

            if($res){
                $is_has_permission =true;
                break;
            }
        }

        if(!$is_has_permission){

            $res = $roles->givePermissionTo($permission_names);//给角色授予权限

            if($res){

                $result['code']=200;
                $result['msg'] ='sccuess';

            }else{

                $result['code']=201;
                $result['msg'] ='授权失败';
            }

        }
        return $result;

    }

    //撤回权限
    public function revokePermission(Request $request,$role_id,$permission_name)
    {
        $roles = Role::find($role_id);

        $res =  $roles->hasPermissionTo($permission_name);//判断该角色是否有权限

        if($res){

            $isfail = $roles ->revokePermissionTo($permission_name);

            if($isfail){

                return redirect('/roles/index');

            }else{

                return view('error.503');
            }

        }else{

            return view('error.503');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//        $user = User::find(2);//用户为ID

//        $role = Role::create(['name'=>'admin']);//创建角色

//        $permission = Permission::create(['name'=>'edit font']);//创建权限

//        $user->givePermissionTo('edit font', 'delete font'); //授予权限

//        $user->revokePermissionTo('delete font');

//        $permissions = $user->permissions;//获取权限列表


//        $user->assignRole('member');//授予角色

//          $user->removeRole('admin');//撤回角色
//        您可以确定角色是否具有一定权限：



//        $roles = $user->roles()->pluck('name');//获取角色列表

//        $roles = Role::find(1);
//        $roles->givePermissionTo('edit font');//给角色授予权限
//        $roles->hasPermissionTo('edit font');//判断该角色是否有权限
        //可以从角色撤销权限：

        //$ role - > revokePermissionTo（' edit articles '）;

//        dd($user->hasRole('member'));//判断用户是否是该角色
//        dd($user->can('edit-articles'));

//        return $roles;
        return view('admin.roles.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Role::create(['name'=>$request->get('name'),'guard_name'=>$request->get('guard_name')]);//创建角色

        return redirect('/roles/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infos = Role::find($id);

        return view('admin.roles.edit',compact('infos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //编辑角色
        Role::where('id',$id)->update([
            'name'=>$request->get('name'),
//            'guard_name'=>$request->get('guard_name')
        ]);

        return redirect('/roles/index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
