<?php
/**
 * Created by PhpStorm.
 * User: 乔明明
 * Date: 2019/9/13
 * Time: 9:19
 */
namespace App\Http\Controllers;

use App\Admin\Models\Companies;
use App\Forms\CompanyForm;
use http\Env\Response;
use Illuminate\Support\Facades\Redis;
use Kris\LaravelFormBuilder\FormBuilder;
use Symfony\Component\HttpFoundation\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
//        $request->get('');
        $where = [];
        $company = Companies::where($where)->orderBy('id','desc')->paginate(15);
        $param = array(
            'company' => $company,
            'menu' => Redis::get('Menu'),
        );

        return view('blade.company.list',$param);
    }

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(CompanyForm::class, [
            'method' => 'POST',
            'url' => route('company.store')
        ]);

        $param = array(
            'form' => $form,
            'menu' => Redis::get('Menu'),
        );
        return view('blade.company.add',$param);
    }

    public function store(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(CompanyForm::class);
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $company = Companies::create($form->getFieldValues());
        if(!empty($company->id)){
            return redirect('show/company')->with('message', '保存成功!');;
        }
    }
}