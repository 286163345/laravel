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
        );
        return $this->renderView('blade.company.list',$param);
    }

    /**
     * 方法:GET 请求URL:/company/creat
     */
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

    /**
     * 方法:POST 请求URL:/company
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(CompanyForm::class);
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $company = Companies::create($form->getFieldValues());
        if(!empty($company->id)){
            return redirect('show/company')->with('message', '保存成功!');
        }
    }

    /**
     * 方法:GET 请求URL:/company/{id}
     */
    public function show()
    {

    }

    /**
     * 方法:GET 请求URL:/company/{id}/edit
     */
    public function edit()
    {
        dd(11111);
    }

    /**
     * 方法:PUT/PATCH  请求URL:/company/{id}
     */
    public function save()
    {

    }

    /**
     * 方法:GET  请求URL:/company/{id}
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $company = Companies::destroy($id);
        if(!empty($company)){
            return response()->json(['message'=>'删除成功!']);
        }else{
            return response()->json(['error'=>'删除失败!']);
        }
    }
}