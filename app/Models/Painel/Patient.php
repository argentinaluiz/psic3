<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function user(){
        return $this->morphOne(User::class,'userable');
    }

    public function classInformations(){
        return $this->belongsToMany(ClassInformation::class);
    }


}
