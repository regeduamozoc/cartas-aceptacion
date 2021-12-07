<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function institucions(){
        return $this->belongsTo(Institucion::class, 'id_institucion');
    }

    public function carreras(){
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }

    public function proyectos(){
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }

    public function servicios(){
        return $this->belongsTo(Servicio::class,'id_servicio');
    }
}
