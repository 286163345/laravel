<?php

namespace App\Admin\Controllers;

use App\Admin\Models\Company;
use App\Admin\Models\CompanySite;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;

class CompanyController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());

    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Company);

        $grid->id('Id');
        $grid->uuid('Uuid');
        $grid->name('Name');
        $grid->address('Address');
//        $grid->companySite()->display(function ($companySite) {
//
//            $res = array_map(function ($companySite) {
//                return "<span class='label label-success'>{$companySite['name']}</span>";
//            }, $companySite);
//
//            return $res;
//        });
        $grid->companySite('Branch')->display(function ($branch) {
            $count = count($branch);
            return "<span class='label label-warning'>{$count}</span>";
        });
        $grid->paginate(15);

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Company::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Company);
        $form->text('name', 'Company Name');
        $form->text('address', 'Address');
        $form->multipleSelect('CompanySites')->options(CompanySite::all()->pluck('name','id')->dump());
        $this->setTableUuid($form);
        return $form;
    }
}
