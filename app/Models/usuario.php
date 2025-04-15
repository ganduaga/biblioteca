<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    protected $fillable = [
        'nombre',
        'edad',
        'email',
        'direccion',
        'telefono',
    ];

    public function libros(){
        return $this->belongsToMany(libro::class,'libro_usuarios',"usuario_id","libro_id")
            ->withPivot('fechaprestamo','fechadevolucion','id')->orderByPivot('fechaprestamo');
    }
}
