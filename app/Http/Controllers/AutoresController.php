<?php

namespace App\Http\Controllers;

use App\Models\autor;
use Exception;
use Illuminate\Http\Request;

class AutoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autores=autor::all();
        return view("autor.index",["autores"=>$autores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("autor.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombre"=>"required|min:5",
            "edad"=>"required"
        ]);
        
        $nuevoAutor=new autor;
        $nuevoAutor->nombre=$request->nombre;
        $nuevoAutor->edad=$request->edad;
        $nuevoAutor->save();
        session()->flash("mensaje","Autor creado correctamente");
        return redirect()->route("autor.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(autor $autor)
    {
        return view("autor.show", ["autor"=>$autor]);
    }

    public function buscar(Request $request)
    {
        $autores=autor::wherelike('nombre',"%$request->autor%")->get();
        return view("autor.index",["autores"=>$autores]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    //public function edit(autor $autores)
    public function edit($autor)
    {
        $autorEdit=autor::findorfail($autor);
        return view("autor.edit",["autor"=>$autorEdit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, autor $autor)
    {
        $datos=$request->validate([
            "nombre"=>"required|min:5",
            "edad"=>"required"
        ]);
        $autor->update($datos);
        session()->flash("mensaje","Autor modificado");
         /*                                   
        $autores->nombre=$request->nombre;
        $autores->edad=$request->edad;
        $autores->save();
        */
        return redirect()->route("autor.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(autor $autor)
    {
        try{
            $autor->delete();
            session()->flash("mensaje","Autor borrado");
        } catch (Exception $e){
            session()->flash("mensaje","No se puede borrar un autor que tiene libros");
        }
        return redirect()->route("autor.index");
    }
}
