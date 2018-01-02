<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    const CLASS_ROOM = [
        1 => 'Online',
        2 => 'Casal',
        3 => 'Divã',
        4 => 'Criança',
        5 => 'Padrão'
    ];

    protected $fillable = [
        'client_id',
        'qty_pacients',
        'class_room'
    ];


    
}
