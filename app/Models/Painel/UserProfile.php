<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'address',
        'cep',
        'number',
        'complement',
        'city',
        'neighborhood',
        'state'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
