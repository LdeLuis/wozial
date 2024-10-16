<?php

namespace App\Http\Controllers;

use App\Ventana;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class VentanasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todas las ventanas
        $ventanas = Ventana::all();
        return view('config.secciones.index', compact('ventanas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mostrar formulario de creación
        return view('ventanas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Crear una nueva instancia de Ventana
        $ventana = new Ventana;

        // Procesar el archivo de imagen
        $file_ventana = $request->file('archivo'); // Obtener el archivo de la solicitud
        $extension = $file_ventana->getClientOriginalExtension(); // Obtener la extensión original del archivo
        $namefile_ventana = Str::random(30) . '.' . $extension; // Crear un nombre de archivo aleatorio
    
        // Guardar la imagen en el almacenamiento local
        \Storage::disk('local')->put("img/photos/ventanas/" . $namefile_ventana, \File::get($file_ventana));
    
        // Asignar los campos al modelo
        $ventana->nombre = $request->nombre; // Nombre ingresado por el usuario
        $ventana->portada = $namefile_ventana; // Nombre de la imagen guardada
    
        // Guardar el registro en la base de datos
        $ventana->save();
    
        // Redirigir con un mensaje de éxito
        \Toastr::success('Ventana creada con éxito');
        return redirect()->route('ventanas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mostrar una ventana específica
        $ventana = Ventana::findOrFail($id);
        return view('config.secciones.ventanas.show', compact('ventana'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Mostrar el formulario de edición para una ventana específica
        $ventana = Ventana::findOrFail($id);
        return view('ventanas.edit', compact('ventana'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validar la solicitud
        $request->validate([
            'nombre' => 'required'
        ]);
    
        try {
            // Buscar la ventana por su ID
            $ventana = Ventana::findOrFail($id);

            // Actualizar los datos principales de la Ventana
            $ventana->nombre = $request->nombre;
    
            // Verificar si se ha subido un nuevo archivo de portada
            if ($request->hasFile('archivo')) {
                // Eliminar la imagen anterior si existe
                if ($ventana->portada && Storage::exists('img/photos/ventanas/' . $ventana->portada)) {
                    Storage::delete('img/photos/ventanas/' . $ventana->portada);
                }
    
                // Subir la nueva imagen
                $file_ventana = $request->file('archivo');
                $namefile_ventana = Str::random(30) . '.' . $file_ventana->getClientOriginalExtension();
                Storage::disk('local')->put("img/photos/ventanas/" . $namefile_ventana, File::get($file_ventana));
                
                // Actualizar el campo 'portada' con el nuevo nombre de archivo
                $ventana->portada = $namefile_ventana;
            }
    
            // Guardar los cambios en la base de datos
            $ventana->save();
    
            // Mensaje de éxito
            \Toastr::success('Ventana actualizada con éxito');
            return redirect()->route('ventanas.index'); // Redirigir al índice de ventanas
        } catch (\Exception $e) {
            // Manejo de errores
            \Toastr::error('Error al actualizar la Ventana');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ventana  $ventana
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ventana = Ventana::find($id);

        $img_ventana = 'img/photos/ventana/'.$ventana->portada;

        if (file_exists($ventana)) {
            unlink($ventana);
        }

        $ventana->delete();

        \Toastr::success('Ventana eliminada con exito');
            return redirect()->back();
    }

    public function portafolio(){
        $ventana = Ventana::all();
        
        return view('config.secciones.portafolio', compact('ventana'));
    }

}
