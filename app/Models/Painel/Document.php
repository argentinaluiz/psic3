<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        "title","description","deleted"
      ];
  

      public function folders()
      {
        return $this->hasMany('App\Models\Painel\Folder');
      }
    
      public function somUrl()
      {
        $url = asset($this->folders()->where('type','=','mp3')->first()->url);
        
        return $url;
      }
  
      public function videoUrl()
      {
        $url = asset($this->folders()->where('type','=','mp4')->first()->url);
        return $url;
      }
      public function textoUrl()
      {
        $url = asset($this->folders()->where('type','=','pdf')->first()->url);
        return $url;
      }
}
