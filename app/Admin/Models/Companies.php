<?php
/**
 * Created by PhpStorm.
 * User: 乔明明
 * Date: 2019/5/2
 * Time: 15:14
 */
namespace App\Admin\Models;

use App\Admin\Models\BaseModel;

class Companies extends BaseModel
{
    //设置可以被批量赋值
    protected $fillable = ['company_name'];

    //黑名单
    protected $guarded = [];
}
