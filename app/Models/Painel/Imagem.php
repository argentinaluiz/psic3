<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $table = "imagens";
    protected $fillable = [
      "title","description","deleted"
    ];

    public function files()
    {
      return $this->hasMany('App\Models\Painel\File');
    }

    public function pequenaUrl()
    {
      $url = asset($this->files()->where('size','=','P')->first()->url);
      return $url;
    }

    public function galeriaUrl()
    {
      $url = asset($this->files()->where('size','=','G')->first()->url);
      
      return $url;
    }

    public function slideUrl()
    {
      $url = asset($this->files()->where('size','=','S')->first()->url);
      return $url;
    }

}