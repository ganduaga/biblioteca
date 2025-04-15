<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class autor extends Model
{
    public function libros(){
        return $this->hasMany(libro::class,"autor_id","id");
    }
    protected $fillable = [
        'nombre',
        'edad',
    ];
}
