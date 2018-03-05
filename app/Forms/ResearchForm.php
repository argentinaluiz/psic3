<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use App\Models\Painel\Research;

class ResearchForm extends Form
{
    public function buildForm()
    {
        $id = $this->getData('id');
        $this
            ->add('image', 'file', [
                'label' => 'Imagem',
                'rules' => 'image'
            ])

            ->add('title', 'text', [
                'label' => 'Título',
                'rules' => 'required|min:3|max:50'
            ])
           
            ->add('year', 'number', [
                'label' => 'Ano',
                'rules' => 'integer'
            ])

            ->add('description', 'textarea', [
                'label' => 'Descrição',
                'rules' => 'min:3|max:1000'
            ])
            
            ->add('active', 'checkbox', [
                'label' => 'Pesquisa ativa',
                'value' => true,
                'checked' => true
            ]);
    }
}
