<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios=usuario::all();
        return view("usuario.index",["usuarios"=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("usuario.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombre"=>"required|min:5",
            "edad"=>"required",
            "email"=>"required",
            "direccion"=>"required",
            "telefono"=>"required",
        ]);
        
        $nuevousuario=new usuario;
        $nuevousuario->nombre=$request->nombre;
        $nuevousuario->edad=$request->edad;
        $nuevousuario->email=$request->email;
        $nuevousuario->direccion=$request->direccion;
        $nuevousuario->telefono=$request->telefono;
        $nuevousuario->save();
        session()->flash("mensaje","Usuario creado correctamente");
        return redirect()->route("usuario.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(usuario $usuario)
    {
        return view("usuario.show", ["usuario"=>$usuario]);
    }

    public function buscar(Request $request)
    {
        $usuarios=usuario::wherelike('nombre',"%$request->usuario%")->get();
        return view("usuario.index",["usuarios"=>$usuarios]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(usuario $usuario)
    {
        //$usuarioEdit=usuario::find($usuario);
        return view("usuario.edit",["usuario"=>$usuario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, usuario $usuario)
    {
        $datos=$request->validate([
            "nombre"=>"required|min:5",
            "edad"=>"required",
            "email"=>"required",
            "direccion"=>"required",
            "telefono"=>"required",
        ]);
        $usuario->update($datos);
        session()->flash("mensaje","Usuario modificado");
        return redirect()->route("usuario.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route("usuario.index");
    }
}
