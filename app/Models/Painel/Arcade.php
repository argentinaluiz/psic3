<?php

namespace App\Models\Painel;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Arcade extends Model
{
    protected $fillable = [
        'document_id','title', 'description', 'url', 'order','deleted'
    ];

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['ID', 'Título', 'Descrição', 'Url', 'Ordem','Deletado'];
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
            case 'Url':
                return $this->url;
            case 'Ordem':
                return $this->order;
            case 'Deletado':
                return $this->deleted?'Sim': 'Não';
        }
    }

  
    public function research()
    {
      return $this->belongsTo(Research::class);
    }
 
    public function document()
    {
      return $this->belongsTo(Document::class);
    }
  
    public function getUrlAttribute($value)
    {
        $document = $this->document;
        $url = $document->folders()->where('type','=','pdf')->first()->url;
  
        return asset($url);
    }
}
