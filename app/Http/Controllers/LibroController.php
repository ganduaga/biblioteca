<?php

namespace App\Http\Controllers;

use App\Models\libro;
use App\Models\usuario;
use App\Models\autor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros=libro::all();
        return view("libro.index",["libros"=>$libros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $autores=autor::all();
        return view("libro.create", ["autores"=>$autores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nuevoLibro=new libro();
        $nuevoLibro->titulo=$request->titulo;
        $nuevoLibro->ISBN=$request->ISBN;
        $nuevoLibro->autor_id=$request->autor_id;
        if ($request->hasFile("portada")){
            $nuevoLibro->portada=$request->file("portada")->store("portadas","public");
        }
        $nuevoLibro->editorial=$request->editorial;
        $nuevoLibro->tema=$request->tema;
        $nuevoLibro->fechaPublicacion=$request->fechaPublicacion;
        $nuevoLibro->numcopias=$request->numcopias;
        $nuevoLibro->save();
        session()->flash("mensaje","Libro creado correctamente");
        return redirect()->route("libro.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(libro $libro)
    {
        $usuarios=usuario::all();
        return view("libro.show",["libro"=>$libro,"usuarios"=>$usuarios]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(libro $libro)
    {
        $autores=autor::all();
        return view("libro.edit",["libro"=>$libro,"autores"=>$autores]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, libro $libro)
    {
        $libro->titulo=$request->titulo;
        $libro->ISBN=$request->ISBN;
        $libro->autor_id=$request->autor_id;
        if ($request->hasFile("portada")){
            $libro->portada=$request->file("portada")->store("portadas","public");
        }
        $libro->editorial=$request->editorial;
        $libro->tema=$request->tema;
        $libro->fechaPublicacion=$request->fechaPublicacion;
        $libro->numcopias=$request->numcopias;
        $libro->save();
        session()->flash("mensaje","Libro actualizado correctamente");
        return redirect()->route("libro.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(libro $libro)
    {        
        try{
            Storage::delete($libro->portada);
            $libro->delete();
            session()->flash("mensaje","Libro borrado");
        } catch (Exception $e) {
            session()->flash("mensaje","El libro no se puede borrar por que esta prestado");
        }
             
        return redirect()->route("libro.index");
    }
}
