<?php

namespace App\Http\Controllers;

use App\Models\libro_usuario;
use App\Models\libro;
use App\Models\usuario;
use Illuminate\Http\Request;

class LibroUsuarioController extends Controller
{

    public function prestar(Request $request, libro $libro)
    {
        if (libro_usuario::where('usuario_id', '=', $request->usuario_id)
            ->where('libro_id', '=', $libro->id)
            ->wherenull('fechadevolucion')
            ->doesntExist()){
            $nuevoPrestamo=new libro_usuario();
            $nuevoPrestamo->usuario_id=$request->usuario_id;
            $nuevoPrestamo->libro_id=$libro->id;
            $nuevoPrestamo->fechaprestamo=now();
            $nuevoPrestamo->save();
            $libro->numcopias--;
            $libro->save();
            session()->flash("mensaje","Libro prestado");
        } else {
            session()->flash("mensaje","El usuario ya tiene este libro");
        }
        return redirect()->route("libro.index");
    }

    public function devolver(libro_usuario $librousuario)
    {
        $librousuario->fechadevolucion=now();
        $librousuario->save();
        $libro=libro::find($librousuario->libro_id);
        $libro->numcopias++;
        $libro->save();
        $usuario=usuario::find($librousuario->usuario_id);
        session()->flash("mensaje","libro devuelto");
        return view("usuario.show",["usuario"=>$usuario]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(libro_usuario $libro_usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(libro_usuario $libro_usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, libro_usuario $libro_usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(libro_usuario $libro_usuario)
    {
        //
    }
}
