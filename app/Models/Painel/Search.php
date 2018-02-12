<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $table = "researches";
    protected $fillable = [
        'title',
        'description',
        'year',
        'active'
    ];
}
