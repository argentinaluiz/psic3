<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public static function findByCode($code)
    {
        return self::where('code', $code)->first();
    }

    public function discount($total)
    {
        if ($this->type == 'fixed') {
            return $this->value;
        } elseif ($this->type == 'percent') {
           // dd($total);
            return round(($this->percent_off / 100) * $total);
           // return number_format($this->$percent_off /100, 2, '.', '') * total;
        } else {
            return 0;
        }
    }
}
