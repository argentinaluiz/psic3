<?php

namespace App\Models\Painel;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model implements TableInterface
{
    protected $fillable = [
        'imagem_id','title', 'description', 'link', 'order','deleted'
    ];

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['ID', 'Título', 'Descrição', 'Link', 'Ordem','Deletado'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'ID':
                return $this->id;
            case 'Título':
                return $this->title;
            case 'Descrição':
                return $this->description;
            case 'Link':
                return $this->link;
            case 'Ordem':
                return $this->order;
            case 'Deletado':
                return $this->deleted?'Sim': 'Não';
        }
    }
  
    public function imagem()
    {
      return $this->belongsTo(Imagem::class);
    }
  
    public function getUrlAttribute($value)
    {
        $imagem = $this->imagem;
        $url = $imagem->files()->where('size','=','S')->first()->url;
  
        return asset($url);
    }
}
