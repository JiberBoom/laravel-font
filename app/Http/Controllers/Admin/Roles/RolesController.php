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
        $roles = Role::with(['users','permissions'])->paginate(5);//查询角色对应的用户

        return view('admin.roles.index',compact('roles'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = User::find(2);//用户为ID

//        $role = Role::create(['name'=>'admin']);//创建角色

//        $permission = Permission::create(['name'=>'edit font']);//创建权限

//        $user->givePermissionTo('edit font', 'delete font'); //授予权限

//        $user->revokePermissionTo('delete font');

//        $permissions = $user->permissions;//获取权限列表


//        $user->assignRole('member');//授予角色

//          $user->removeRole('admin');//撤回角色

//        $roles = $user->roles()->pluck('name');//获取角色列表

        $roles = Role::find(1);
//        $roles->givePermissionTo('edit font');//给角色授予权限
//        $roles->hasPermissionTo('edit font');//判断该角色是否有权限

//        dd($user->hasRole('member'));//判断用户是否是该角色
        dd($user->can('edit-articles'));

//        return $roles;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
