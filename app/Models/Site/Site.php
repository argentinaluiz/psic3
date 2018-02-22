<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
  public function imagens()
  {
    return $this->hasMany(Gallery::class);
  }


}
