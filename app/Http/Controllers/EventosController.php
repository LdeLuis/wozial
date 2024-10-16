<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $veventos = Evento::all();
        return view('config.secciones.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $evento = new Evento;

        $file_evento = $request->file('archivo'); 
        $extension = $file_evento->getClientOriginalExtension(); 
        $namefile_evento = Str::random(30) . '.' . $extension; 
    
        \Storage::disk('local')->put("img/photos/eventos/" . $namefile_evento, \File::get($file_evento));
    
        $evento->nombre = $request->nombre; 
        $evento->portada = $namefile_evento; 
    
        $evento->save();
    
        \Toastr::success('evento creada con éxito');
        return redirect()->route('eventos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $evento = Evento::findOrFail($id);
        return view('config.secciones.eventos.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $evento = Evento::findOrFail($id);
        return view('eventos.edit', compact('evento'));
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
        //
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required'
        ]);
    
        try {
            $evento = evento::findOrFail($id);

            $evento->titulo = $request->titulo;
            $evento->descripcion = $request->descripcion;
    
            if ($request->hasFile('archivo')) {
                if ($evento->portada && Storage::exists('img/photos/eventos/' . $evento->portada)) {
                    Storage::delete('img/photos/eventos/' . $evento->portada);
                }
    
                $file_evento = $request->file('archivo');
                $namefile_evento = Str::random(30) . '.' . $file_evento->getClientOriginalExtension();
                Storage::disk('local')->put("img/photos/eventos/" . $namefile_evento, File::get($file_evento));
                
                $evento->portada = $namefile_evento;
            }
    
            $evento->save();
    
            \Toastr::success('evento actualizada con éxito');
            return redirect()->route('eventos.index'); 
        } catch (\Exception $e) {
            \Toastr::error('Error al actualizar la evento');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Encuentra el evento por ID
        $evento = Evento::find($id);
    
        // Construye la ruta de la imagen del evento
        $img_evento = public_path('img/photos/evento/' . $evento->portada);
    
        // Verifica si el archivo de la imagen existe y lo elimina
        if (file_exists($img_evento)) {
            unlink($img_evento);
        }
    
        // Elimina el registro del evento de la base de datos
        $evento->delete();
    
        // Mensaje de éxito
        \Toastr::success('Evento eliminado con éxito');
        return redirect()->back();
    }



    public function eventos(){
        $eventos = Eventos::all();
        
        return view('config.secciones.evento', compact('eventos'));
    }
}
