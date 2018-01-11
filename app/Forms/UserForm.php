<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use App\User;

class UserForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('email', 'email');
    }
}
