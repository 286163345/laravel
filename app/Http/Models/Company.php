<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //选择不同数据库
    protected $connection = 'mysql_home';

}
