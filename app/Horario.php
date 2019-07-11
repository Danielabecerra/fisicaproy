<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    public $timestamps = false;

    public function programarlabs()
   {
       return $this->hasMany('App\Programarlab');
   }
}
