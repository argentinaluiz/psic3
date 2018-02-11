<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        "url","size", "imagem_id"
      ];
  
      public function imagem()
      {
        return $this->belongsTo('App\Models\Painel\Imagem');
      }
  
}
