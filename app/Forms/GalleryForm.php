<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use App\Models\Painel\Gallery;

class GalleryForm extends Form
{
    public function buildForm()
    {
        $id = $this->getData('id');
        $this
            ->add('title', 'text', [
                'label' => 'Título',
                'rules' => 'required|min:3|max:50'
            ])
            ->add('url', 'text', [
                'label' => 'URL',
                'rules' => 'max:20'
            ])
            ->add('order', 'number', [
                'label' => 'Ordem',
                'rules' => 'required|numeric'
            ])
            ->add('description', 'textarea', [
                'label' => 'Descrição',
                'rules' => 'min:3|max:1000'
            ])
            ->add('deleted', 'checkbox', [
                'label' => 'Imagem deletada?',
                'value' => true,
                'checked' => false
            ]);
            
    }
}
