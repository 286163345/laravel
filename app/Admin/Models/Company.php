<?php
/**
 * Created by PhpStorm.
 * User: 乔明明
 * Date: 2019/5/2
 * Time: 15:14
 */
namespace App\Admin\Models;

use App\Admin\Models\BaseModel;

class company extends BaseModel
{
    public function companySite()
    {
        return $this->hasMany(CompanySite::class,'company_id','id');
    }
}
