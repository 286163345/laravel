<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CompanyForm extends Form
{
    public function buildForm()
    {
        // Add fields here...
        $this->add('company_name','text')
            ->add('submit', 'submit', array(
                'label' => '保存',
                'attr' => ['class' => 'btn btn-sm btn-primary float-right m-t-n-xs']
            ));
    }
}
