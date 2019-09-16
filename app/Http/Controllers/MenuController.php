<?php
/**
 * Created by PhpStorm.
 * User: 乔明明
 * Date: 2019/9/13
 * Time: 1:26
 */
namespace App\Http\Controllers;

use Carbon\Carbon;
use Doctrine\Common\Cache\PredisCache;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Spatie\Menu\Link;
use Spatie\Menu\Menu;
class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::new()
            ->addClass('nav navbar-nav')
            ->link("/show", '<i class="fa fa-th-large"></i> <span class="nav-label">首页</span>')
            ->link("/show/company", '<i class="fa fa-th-large"></i> <span class="nav-label">公司列表</span>')
            ->link('/category', '<i class="fa fa-th-large"></i> <span class="nav-label">产品列表</span>')
            ->link('/category', '<i class="fa fa-th-large"></i> <span class="nav-label">类目列表</span>')
            ->submenu(
                Link::to('#', '<i class="fa fa-th-large"></i> <span class="nav-label">其他列表</span> <span class="fa arrow"></span>'),
//                    ->addClass('dropdown-toggle')
//                    ->setAttributes(['data-toggle' => 'dropdown', 'role' => 'button']), //给a标签添加属性
                Menu::new()
                    ->addClass('nav nav-second-level ')
                    ->link('#', '子菜单1')
                    ->link('#', '子菜单2')
//                    ->html('', ['role' => 'separator', 'class' => 'divider']) //添加li并添加权限
            );
//            ->wrap('div')在菜单最外层用div包裹元素
//            ->setActive('/one'); 指定导航是激活状态
        $menu->setWrapperTag('');
        Redis::del('Menu');
        Redis::set('Menu',$menu);

        $param = array(
            'menu'=>$menu,
        );
        return view('blade.index',$param);
    }
}
//案例
//Menu::new()
//    ->add(Menu::new()
//        ->link('/introduction', 'Introduction')
//        ->link('/requirements', 'Requirements')
//        ->link('/installation-setup', 'Installation and Setup')
//    )
//    ->add(Menu::new()
//        ->prepend('<h2>Basic Usage</h2>')
//        ->prefixLinks('/basic-usage')
//        ->link('/your-first-menu', 'Your First Menu')
//        ->link('/working-with-items', 'Working With Items')
//        ->link('/adding-sub-menus', 'Adding Sub Menus')
//    );