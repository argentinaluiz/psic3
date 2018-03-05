<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use App\Models\Painel\Category;

class CategoryForm extends Form
{
    public function buildForm()
    {
        $id = $this->getData('id');
        $this
        ->add('name', 'text', [
            'label' => 'Título',
            'rules' => 'required|min:3|max:50'
        ])
        ->add('slug', 'text', [
            'label' => 'Abreviação',
            'rules' => 'max:8'
        ]);
    }
}
