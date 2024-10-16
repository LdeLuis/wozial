<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;
use App\Seccion;
use App\Elemento;
use App\Faq;
use App\Politica;
use App\SliderPrincipal;
use App\Categoria;
use App\Catalogo;
use App\CatalogoCaracteristicas;
use App\CatalogoGaleria;
use App\Blog;
use App\Tematica;
use App\Ventana;
use App\Evento;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class SeccionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $seccion = Seccion::all();
        return view('config.secciones.index', compact('seccion'));
    }

    public function show($seccion) {
        $config = Configuracion::first();
		$seccion = Seccion::where('slug',$seccion)->first();
        $elements = Elemento::where('seccion',$seccion->id)->get()->toBase();
        $elem_general = Elemento::all();
        $faqs = Faq::all();
        $sliders = SliderPrincipal::all();
        $politicas = Politica::all();
        $categorias = Categoria::all();
        $catalogos = Catalogo::where('activo', 1)->get()->toBase();
        $catalogo_caracteristicas = CatalogoCaracteristicas::all();
        $catalogo_galeria = CatalogoGaleria::all();
        $tematicas = Tematica::where('activo', 1)->get()->toBase();
        $blogs = Blog::where('activo', 1)->get()->toBase();
        $evento = Evento::all();
        $ventana = Ventana::all();
        $vcount = 0;
        foreach($ventana as $v){
            $v->cuenta=$vcount;
            $vcount ++;
        };

        if($seccion->seccion == 'configuracion') { 
            $ruta = 'config.general.contacto';
        } else if($seccion->seccion == 'politicas') {
            $ruta = 'config.politicas.index';
        } else if($seccion->seccion == 'faqs') {    
            $ruta = 'config.faqs.index';
        } else {
            $ruta = 'config.secciones.'.$seccion->seccion;
        }

        return view($ruta, compact('seccion', 'config', 'elem_general', 'faqs', 'vcount', 'politicas', 'elements', 'sliders', 'categorias', 'catalogos', 'catalogo_caracteristicas', 'catalogo_galeria', 'tematicas', 'blogs', 'ventana', 'evento'));
    }

    public function textglobalseccion(Request $request){
        if (empty($request->tabla)) {
            return false;
        }

        $nameSpace = '\\App\\';
        $model = $nameSpace . ucfirst($request->tabla);

        $field = $request->campo;
        $val = $request->valor;
        // $model = $model::find($request->id);
        // $model->$field = $request->valor;
        // $model->save();

        // $model::find($request->id)->update(["$field" => "$val"]);
        if ($model::find($request->id)->update(["$field" => "$val"])) {
            return response()->json(['success'=>true, 'mensaje'=>'Cambio Exitoso']);
        }else {
            // code...
            return response()->json(['success'=>false, 'mensaje'=>'Error al actualizar']);
        }
        // return $request->valor;
    }
    
    //FUNCION EN PHP
    public function cambiar_imagen_seccion(Request $request) {
        $elemento = Elemento::find($request->id_imagen);
        
        $file = $request->file('archivo');

        // Verifica si existe un archivo antiguo y elimínalo
        $oldFile = 'img/photos/imagenes_estaticas/' . $elemento->imagen;
        if (Storage::disk('local')->exists($oldFile)) {
            Storage::disk('local')->delete($oldFile);
        }

        // Genera el nombre del nuevo archivo y almacénalo
        $extension = $file->getClientOriginalExtension();
        $namefile = Str::random(30) . '.' . $extension;
        $path = 'img/photos/imagenes_estaticas/' . $namefile;

        // Almacena el nuevo archivo
        Storage::disk('local')->put($path, file_get_contents($file));

        // Actualiza el registro con el nuevo nombre de archivo
        $elemento->imagen = $namefile;
        $elemento->save();

        // Mensaje de éxito y redirección
        \Toastr::success('Guardado');
        return redirect()->back();  
    }
    public function cambiar_imagen_seccion_4(Request $request) {
        $evento = Evento::find($request->id_imagen);
        
        $file = $request->file('archivo');

        // Verifica si existe un archivo antiguo y elimínalo
        $oldFile = 'img/photos/evento/' . $evento->portada;
        if (Storage::disk('local')->exists($oldFile)) {
            Storage::disk('local')->delete($oldFile);
        }

        // Genera el nombre del nuevo archivo y almacénalo
        $extension = $file->getClientOriginalExtension();
        $namefile = Str::random(30) . '.' . $extension;
        $path = 'img/photos/evento/' . $namefile;

        // Almacena el nuevo archivo
        Storage::disk('local')->put($path, file_get_contents($file));

        // Actualiza el registro con el nuevo nombre de archivo
        $evento->portada = $namefile;
        $evento->save();

        // Mensaje de éxito y redirección
        \Toastr::success('Guardado');
        return redirect()->back();  
    }

    public function cambiar_imagen_seccion_2(Request $request) {
        $categoria = Catalogo::find($request->id_imagen);
        
        $file = $request->file('archivo');

        // Verifica si existe un archivo antiguo y elimínalo
        $oldFile = 'img/photos/catalogo/' . $categoria->portada;
        if (Storage::disk('local')->exists($oldFile)) {
            Storage::disk('local')->delete($oldFile);
        }

        // Genera el nombre del nuevo archivo y almacénalo
        $extension = $file->getClientOriginalExtension();
        $namefile = Str::random(30) . '.' . $extension;
        $path = 'img/photos/catalogo/' . $namefile;

        // Almacena el nuevo archivo
        Storage::disk('local')->put($path, file_get_contents($file));

        // Actualiza el registro con el nuevo nombre de archivo
        $categoria->portada = $namefile;
        $categoria->save();

        // Mensaje de éxito y redirección
        \Toastr::success('Guardado');
        return redirect()->back();  
    }

    public function cambiar_imagen_seccion_3(Request $request) {
        $ventana = Ventana::find($request->id_imagen);
        
        $file = $request->file('archivo');

        // Verifica si existe un archivo antiguo y elimínalo
        $oldFile = 'img/photos/ventana/' . $ventana->portada;
        if (Storage::disk('local')->exists($oldFile)) {
            Storage::disk('local')->delete($oldFile);
        }

        // Genera el nombre del nuevo archivo y almacénalo
        $extension = $file->getClientOriginalExtension();
        $namefile = Str::random(30) . '.' . $extension;
        $path = 'img/photos/ventana/' . $namefile;

        // Almacena el nuevo archivo
        Storage::disk('local')->put($path, file_get_contents($file));

        // Actualiza el registro con el nuevo nombre de archivo
        $ventana->portada = $namefile;
        $ventana->save();

        // Mensaje de éxito y redirección
        \Toastr::success('Guardado');
        return redirect()->back();  
    }


    public function agregar_seccion(Request $request){
        $categoria = new Catalogo;

        $file_catalogo = $request->file('archivo');
        $extension_catalogo = $file_catalogo->getClientOriginalExtension();
        $namefile_catalogo = Str::random(30) . '.' . $extension_catalogo;

        \Storage::disk('local')->put("img/photos/catalogo/" . $namefile_catalogo, \File::get($file_catalogo));

        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->portada = $namefile_catalogo;
        $categoria->visible = 0;

        if($categoria->save()){
            \Toastr::success('Categoria creada con exito');
            return redirect()->back();
        }else{
            \Toastr::error('Categoria no pudo crearse');
            return redirect()->back();
        }

    }
    public function agregar_seccion_2(Request $request){
        $ventana = new Ventana;

        $file_ventana = $request->file('archivo');
        $extension_ventana = $file_ventana->getClientOriginalExtension();
        $namefile_ventana = Str::random(30) . '.' . $extension_ventana;

        \Storage::disk('local')->put("img/photos/ventana/" . $namefile_ventana, \File::get($file_ventana));

        $ventana->nombre = $request->nombre;
        $ventana->portada = $namefile_ventana;

        if($ventana->save()){
            \Toastr::success('Ventana creada con exito');
            return redirect()->back();
        }else{
            \Toastr::error('Ventana no pudo crearse');
            return redirect()->back();
        }

    }
    public function agregar_seccion_3(Request $request){
        $evento = new Evento;

        $file_evento = $request->file('archivo');
        $extension_evento = $file_evento->getClientOriginalExtension();
        $namefile_evento = Str::random(30) . '.' . $extension_evento;

        \Storage::disk('local')->put("img/photos/evento/" . $namefile_evento, \File::get($file_evento));

        $evento->titulo = $request->titulo;
        $evento->descripcion = $request->descripcion;
        $evento->portada = $namefile_evento;

        if($evento->save()){
            \Toastr::success('evento creada con exito');
            return redirect()->back();
        }else{
            \Toastr::error('evento no pudo crearse');
            return redirect()->back();
        }

    }

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


}
