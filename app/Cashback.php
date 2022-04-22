<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashback extends Model
{
    protected $table = 'cashbacks';

    protected $fillable = ['cashback', 'logo'];

    public function stores()
    {
        return $this->belongsToMany('App\Store', 'stores_cashbacks')->withPivot('perc_cashback');
    }
}
