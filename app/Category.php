<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
