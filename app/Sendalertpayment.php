<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sendalertpayment extends Model
{
    public function property()
    {
        return $this->belongsTo('App\Property','property_id');
    }
}
