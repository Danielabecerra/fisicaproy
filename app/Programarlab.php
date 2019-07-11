<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programarlab extends Model
{
    public function docente()
    {
        return $this->belongsTo('App\Docente', 'id_d');
    }

    public function horario()
    {
        return $this->belongsTo('App\Horario', 'id_h');
    }

    public function materia()
    {
        return $this->belongsTo('App\Materia', 'id_m');
    }
}
