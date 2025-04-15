<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class libro extends Model
{
    public function autores(){
        return $this->belongsTo(autor::class,"autor_id","id");
    }

    public function usuarios(){
        return $this->belongsToMany(usuario::class,'libro_usuarios',"libro_id","usuario_id")
            ->withPivot('fechaprestamo','fechadevolucion','id');
    }
}
