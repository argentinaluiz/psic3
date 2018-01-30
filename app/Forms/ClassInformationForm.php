<?php

namespace App\Forms;

use Carbon\Carbon;
use Kris\LaravelFormBuilder\Form;

class ClassInformationForm extends Form
{
    public function buildForm()
    {
        $formatDate = function($value){
            return ($value && $value instanceof Carbon)?$value->format('Y-m-d'):$value;
        };
        $this
            ->add('date_start', 'date', [
                'label' => 'Data Início',
                'rules' => 'required|date',
                'value' => $formatDate
            ])
            ->add('date_end', 'date', [
                'label' => 'Data Final',
                'rules' => 'required|date',
                'value' => $formatDate
            ])

            ->add('type', 'select',[
                'label' => 'Tipo de pacientes',
                'choices' => ['1'=>'Criança', '2'=>'Jovem', '3'=>'Adulto', '4'=>'Idoso' ],
                'selected' => '3',
                'rules' => 'required|in:1,2,3,4'
            ])

            ->add('semester', 'number', [
                'label' => 'Semestre (1 ou 2)',
                'rules' => 'required|in:1,2'
            ])
            ->add('year', 'number', [
                'label' => 'Ano',
                'rules' => 'required|integer'
            ]);
    }
}
