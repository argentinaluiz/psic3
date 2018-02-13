<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class GalleryForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'text')
            ->add('description', 'text')
            ->add('url', 'text');
    }
}
