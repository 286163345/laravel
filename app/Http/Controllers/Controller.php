<?php

namespace App\Http\Controllers;

use Encore\Admin\Form;
use App\Service\CommonService;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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

    //一对多添加方法或者多对一都可以使用,table需要添加的表,bingTable被绑定的表
    /**
     * @param $form
     * @param $table
     * @param $bingTable
     */
    public function oneToMany($form, $table, $bingTable){
        if($form){

        }else{

        }
    }
}
