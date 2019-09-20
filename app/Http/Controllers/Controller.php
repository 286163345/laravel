<?php

namespace App\Http\Controllers;

use Encore\Admin\Form;
use App\Service\CommonService;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redis;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //uuid生成方法
    public function setTableUuid(Form $form)
    {
        //保存前回调
        $form->saving(function (Form $form) {
            if(empty($form->model()->uuid)){
                $form->model()->uuid = CommonService::uuidGenerated();
            }
        });
    }

    /**
     * @param $view
     * @param array $parameters
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function renderView($view, array $parameters = array())
    {
        $globalArray = array(
            'menu' => Redis::get('Menu'),
        );
        $templateArray = array_merge($parameters,$globalArray);
        return view($view,$templateArray);
    }

}
