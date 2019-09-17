<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CompanyForm extends Form
{
    public function buildForm()
    {
        // Add fields here...
        $this->add('name','text');
    }
}
