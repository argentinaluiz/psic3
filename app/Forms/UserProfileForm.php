<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class UserProfileForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('address', 'text', [
                'label' => 'Endereço',
                'rules' => 'required|max:255'
            ])
            ->add('cep', 'text', [
                'label' => 'CEP',
                'rules' => 'required|max:8'
            ])
            ->add('number', 'text', [
                'label' => 'Número',
                'rules' => 'required|max:255'
            ])
            ->add('complement', 'text', [
                'label' => 'Complemento',
                'rules' => 'max:255'
            ])

            ->add('estados', 'entity', [
                'class' => '\App\Models\Painel\State', // Entity that holds data
                'property' => 'name', // Value that will be used as a label for each choice option, default: name
                'property_key' => 'id', // Value that will be used as a value for each choice option, default: id
                'query_builder' => function(\App\Models\Painel\State $state) {   // If provided, gets data from this closure and lists it
                    return $state->all();
                }
            ])

            ->add('cidades', 'entity', [
                'class' => '\App\Models\Painel\City', 
                'property' => 'name', 
                'property_key' => 'id', 
                'query_builder' => function(\App\Models\Painel\City $city) {   
                    return $city->where('state_id', '3');
                }
            ])

            ->add('neighborhood', 'text', [
                'label' => 'Bairro',
                'rules' => 'required|max:255'
            ]);
    }


}
