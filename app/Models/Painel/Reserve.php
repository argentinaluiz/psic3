<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    const STATUS = [
        1 => 'Reservado',
        2 => 'Cancelado',
        3 => 'Pago',
        4 => 'Aguardando'
    ];

    protected $fillable = [
        'client_id',
        'agenda_id',
        'date_reserved',
        'status'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }


}

