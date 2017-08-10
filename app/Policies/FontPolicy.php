<?php

namespace App\Policies;

use App\User;
use App\Models\Font;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class FontPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the font.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Font  $font
     * @return mixed
     */
    public function view(User $user)
    {
        //查看字体列表权限

       $permissions =  $this->getUserPermissions();

        Log::info(Auth::user()->name.'查看了字体列表');

       return  in_array('font list',$permissions);
    }

    /**
     * Determine whether the user can create fonts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //进入增加字体页面权限
        $permissions =  $this->getUserPermissions();

        Log::info(Auth::user()->name.'点击了字体增加按钮');

        return in_array('add font',$permissions);
    }

    /**
     * Determine whether the user can update the font.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Font  $font
     * @return mixed
     */
    public function update(User $user)
    {
        //更新字体的权限
        $permissions =  $this->getUserPermissions();

        return in_array('update font',$permissions);
    }

    /**
     * Determine whether the user can delete the font.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Font  $font
     * @return mixed
     */
    public function delete(User $user)
    {
        //删除字体权限
        $permissions =  $this->getUserPermissions();

        return in_array('delete font',$permissions);
    }

    /***
     * @return bool
     */
    public function edit()
    {
        $permissions =  $this->getUserPermissions();

        return in_array('edit font',$permissions);
    }

    /***
     * 查看字体详情权限
     * @param User $user
     * @return bool
     */
    public function info()
    {

        $permissions =  $this->getUserPermissions();

        return in_array('font info',$permissions);
    }

    /***
     * 上下架操作的权限
     * @return bool
     */
    public function changeStatus()
    {
        $permissions =  $this->getUserPermissions();

        return in_array('change font status',$permissions);
    }
    //返回用户所拥有的权限
    function getUserPermissions(){


        $user_role = Auth::user()->where('id',Auth::id())->with('roles')->get();//限定每个用户只能拥有一个角色

        $role_id = collect($user_role)->map(function ($roles){

            return $roles->roles;

        })->flatten(1)->pluck('id')->toArray();


        $user_permission = Role::where('id',$role_id)->with('permissions')->get();

        $collection = collect($user_permission)->map(function($collection){

            return $collection->permissions;

        })->flatten(1)->map(function ($permissions){

            return $permissions->name;

        })->toArray();

        return $collection;
    }
}
