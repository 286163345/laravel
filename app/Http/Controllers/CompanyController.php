<?php
/**
 * Created by PhpStorm.
 * User: 乔明明
 * Date: 2019/9/13
 * Time: 9:19
 */
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;

class CompanyController extends Controller
{
    public function index()
    {
        $param = array(
            'menu' => Redis::get('Menu'),
        );

        return view('blade.company.list',$param);
    }
}