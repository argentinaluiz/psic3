<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Agenda extends Model
{
    protected $fillable = [
        'client_clinic_id',
        'room_id',
        'client_psychoanalyst_id',
        'date',
        'time',
        'old_price',
        'price',
        'stallments',
        'is_promotion',
        'qty_sessions',
        'description'

    ];

    /* Mutators
    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
    */

    public function clinic()
    {
        //->expertise(4)
        return $this->belongsTo(Client::class, 'client_clinic_id');
    }


    public function psychoanalyst()
    {
        //->expertise(2)
        return $this->belongsTo(Client::class, 'client_psychoanalyst_id');
    }


    public function room()
    {
        return $this->belongsTo(Room::class);
    }



}
