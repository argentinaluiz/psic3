<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        "title","description","deleted"
      ];
  
      public function documents()
      {
        return $this->hasMany('App\Models\Painel\Document');
      }
}
