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

      public function newDocument($request, $nameFile = '')
    {
        $data = $request->all();
        $data['active'] = $request->has('active');
        $data['image'] = $nameFile;
        return $this->create($data);
    }

    public function updateDocument($request, $nameFile = '')
    {
        $data = $request->all();
        $data['active'] = $request->has('active');
        $data['image'] = $nameFile;
        
        return $this->update($data);
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
