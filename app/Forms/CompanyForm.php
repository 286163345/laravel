<?php

namespace App\Forms;

class CompanyForm extends BaseForm
{
    public function buildForm()
    {
        // Add fields here...
        $this->add('company_name','text',[
            'value' => $this->getData('company_name')
        ])
            ->add('submit', 'submit', array(
                'label' => '保存',
                'attr' => ['class' => 'btn btn-sm btn-primary float-right m-t-n-xs']
            ));
    }
}
