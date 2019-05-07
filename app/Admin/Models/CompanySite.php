<?php
/**
 * Created by PhpStorm.
 * User: 乔明明
 * Date: 2019/5/2
 * Time: 15:14
 */
namespace App\Admin\Models;

use App\Admin\Models\BaseModel;

class CompanySite extends BaseModel
{
    protected $fillable = ['id', 'name'];
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id','id');
    }
}
