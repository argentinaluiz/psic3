<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = [
        "url","type", "document_id"
      ];
  
      public function document()
      {
        return $this->belongsTo('App\Models\Painel\Document');
      }
