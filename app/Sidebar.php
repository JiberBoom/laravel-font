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
//
//            $menu->add('About',['url'=>'#','class'=>'tree-toggle nav-header'])
//                 ->add('About-one',['url'=>'#','class'=>'tree-toggle nav-header'])
//                 ->add('About-two',['url'=>'#','class'=>'tree-toggle nav-header'])
//            ;
            //字体管理
           $font =  $menu->add('字体管理',['url'=>'#','class'=>'glyphicon glyphicon-folder-open tree-toggle nav-header']);

           $font->add('字体列表',['url'=>url('/admin/fonts/index'),'class'=>'tree-toggle nav-header']);

           $font->add('美元价格列表',['url'=>'#','class'=>'tree-toggle nav-header']);

           $font->add('语种列表',['url'=>url('/admin/languages/index'),'class'=>'tree-toggle nav-header']);

           $font->add('模板图列表',['url'=>'#','class'=>'tree-toggle nav-header']);


            //壁纸管理
           $wallpaper = $menu->add('壁纸管理',['url'=>'#','class'=>'glyphicon glyphicon-folder-open tree-toggle nav-header']);

           $wallpaper->add('壁纸列表',['url'=>'#','class'=>'tree-toggle nav-header']);

           $wallpaper->add('壁纸类别列表',['url'=>'#','class'=>'tree-toggle nav-header']);


           //订单管理
            $order = $menu->add('订单管理', ['url'=>'#','class'=>'glyphicon glyphicon-folder-open tree-toggle nav-header']);

            $order->add('订单列表',['url'=>'#','class'=>'tree-toggle nav-header']);

            //角色管理
            $permission = $menu->add('角色权限管理', ['url'=>'#','class'=>'glyphicon glyphicon-folder-open tree-toggle nav-header']);

            $permission->add('角色列表',['url'=>url('/roles/index'),'class'=>'tree-toggle nav-header']);

        });
    }
}