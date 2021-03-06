<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Installation extends Model
{
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
	
	public function taskreservation()
    {
        return $this->hasMany('App\TaskReservation');
    }
}
