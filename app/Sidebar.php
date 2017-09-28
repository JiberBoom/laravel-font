<?php
/**
 * Created by PhpStorm.
 * User: liangzhenfeng
 * Date: 2017/7/26
 * Time: 下午3:53
 */

namespace App;
use Menu;

class Sidebar
{
    public function __construct()
    {
        Menu::make('MyNavBar', function($menu){

            //字体管理
           $font =  $menu->add('字体管理',['url'=>'#','class'=>'tree-toggle nav-header']);
           $font->link->attr(array('class'=>'glyphicon glyphicon-folder-open'));
           $font->link->href('#');

           $font->add('字体列表',['url'=>url('/admin/fonts/index'),'class'=>'tree-toggle nav-header'])->link->attr(array('class'=>'glyphicon glyphicon-th-list'));

           $font->add('美元价格列表',['url'=>'#','class'=>'tree-toggle nav-header'])->link->attr(array('class'=>'glyphicon glyphicon-th-list'));

           $font->add('语种列表',['url'=>url('/admin/languages/index'),'class'=>'tree-toggle nav-header'])->link->attr(array('class'=>'glyphicon glyphicon-th-list'));

           $font->add('模板图列表',['url'=>'#','class'=>'tree-toggle nav-header'])->link->attr(array('class'=>'glyphicon glyphicon-th-list'));


            //壁纸管理
           $wallpaper = $menu->add('壁纸管理',['url'=>'#','class'=>'tree-toggle nav-header']);

           $wallpaper->link->attr(array('class'=>'glyphicon glyphicon-folder-open'));
           $wallpaper->link->href('#');

           $wallpaper->add('壁纸列表',['url'=>'#','class'=>'tree-toggle nav-header'])->link->attr(array('class'=>'glyphicon glyphicon-th-list'));

           $wallpaper->add('壁纸类别列表',['url'=>'#','class'=>'tree-toggle nav-header'])->link->attr(array('class'=>'glyphicon glyphicon-th-list'));


           //订单管理
            $order = $menu->add('订单管理', ['url'=>'#','class'=>'tree-toggle nav-header']);
            $order->link->attr(array('class'=>'glyphicon glyphicon-folder-open'));
            $order->link->href('#');

            $order->add('订单列表',['url'=>'#','class'=>'tree-toggle nav-header'])->link->attr(array('class'=>'glyphicon glyphicon-th-list'));

            //角色管理
            $role = $menu->add('角色权限管理', ['url'=>'#','class'=>'tree-toggle nav-header']);
            $role->link->attr(array('class'=>'glyphicon glyphicon-folder-open'));
            $role->link->href('#');

            $role->add('角色列表',['url'=>url('/roles/index'),'class'=>'tree-toggle nav-header'])->link->attr(array('class'=>'glyphicon glyphicon-th-list'));

            $role->add('权限列表',['url'=>url('/permissions/index'),'class'=>'tree-toggle nav-header'])->link->attr(array('class'=>'glyphicon glyphicon-th-list'));

        });
    }
}