<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    public function account()
    {
        return $this->hasMany('App\Account');
    }
}
