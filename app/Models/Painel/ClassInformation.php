<?php
namespace App\Models\Painel;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class ClassInformation extends Model implements TableInterface
{
    
    const CLASS_TYPES = [
        1 => 'Criança',
        2 => 'Jovem',
        3 => 'Adulto',
        4 => 'Idoso'
    ];
    
    protected $fillable = [
        'date_start',
        'date_end',
        'name',
        'semester',
        'year'
    ];

    protected $dates = [
        'date_start', //Carbon wrapper \DateTime
        'date_end'
    ];

    public function patients()
    {
        return $this->belongsToMany(Patient::class);//quando estou trabalhando com uma tabela pivot, o método correto é o belongsToMany
    }

  

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return [
            'ID',
            'Data Início',
            'Data Fim',
            'Tipo',
            'Semestre',
            'Ano'
        ];
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
            case 'Data Início':
                return $this->date_start->format('d/m/Y'); //Carbon
            case 'Data Fim':
                return $this->date_end->format('d/m/Y'); 
            case 'Tipo':
                return $this->name;
            case 'Semestre':
                return $this->semester;
            case 'Ano':
                return $this->year;
        }
    }


    
}
