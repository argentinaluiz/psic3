<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use App\Models\Painel\Product;

class ProductForm extends Form
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
            ])
            ->add('details', 'text', [
                'label' => 'Detalhes',
                'rules' => 'max:255'
            ])
            ->add('old_price', 'number', [
                'label' => 'Preço anterior',
                'rules' => 'required'
            ])
            ->add('price', 'number', [
                'label' => 'Preço',
                'rules' => 'required'
            ])
            ->add('description', 'textarea', [
                'label' => 'Descrição',
                'rules' => 'min:3|max:1000'
            ])

            ->add('featured', 'checkbox', [
                'label' => 'Produto em destaque',
                'value' => true,
                'checked' => false
            ])
            
            ->add('active', 'checkbox', [
                'label' => 'Produto ativo',
                'value' => true,
                'checked' => true
            ]);

    }
}
