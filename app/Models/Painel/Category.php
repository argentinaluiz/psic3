<?php

namespace App\Models\Painel;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements TableInterface
{
    protected $fillable = [
        'name', 'slug'
    ];


    public function getTableHeaders()
    {
        return ['ID', 'Título', 'Abreviação'];
    }

    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'ID':
                return $this->id;
            case 'Título':
                return $this->name;
            case 'Abreviação':
                return $this->slug;
        }
    }

    public function researches()
    {
      return $this->belongsToMany(Research::class);
    }
}
