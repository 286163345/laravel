<?php
/**
 * Created by PhpStorm.
 * User: 乔明明
 * Date: 2019/4/16
 * Time: 17:14
 */
namespace App\Service;

use Ramsey\Uuid\Uuid;
class CommonService
{
    public static function uuidGenerated()
    {
        return (string) Uuid::uuid1();
    }
}

