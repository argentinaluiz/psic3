<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['state'];
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public static $states = [
        'AC',
        'AL',
        'AP',
        'AM',
        'BA',
        'CE',
        'DF',
        'ES',
        'GO',
        'MA',
        'MT',
        'MS',
        'MG',
        'PA',
        'PB',
        'PR',
        'PE',
        'PI',
        'RJ',
        'RN',
        'RS',
        'RO',
        'RR',
        'SC',
        'SP',
        'SE',
        'TO'
    ];

}
