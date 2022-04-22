<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    protected $fillable = ['name', 'image', 'link'];

    public function cashbacks()
    {
        return $this->belongsToMany(Cashback::class, 'stores_cashbacks', 'store_id', 'cashback_id')->withPivot('perc_cashback');
    }
}
