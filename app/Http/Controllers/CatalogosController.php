<?php

namespace App\Http\Controllers;

use App\Catalogo;
use App\CatalogoCaracteristicas;
use App\Categoria;
use App\Talla;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CatalogosController extends Controller
{
    public function index()
    {
        // Ya se encuentra en secciones, no es necesario definirlo
    }

    public function create()
    {
        $categorias = Categoria::all();
        $tallas = Talla::all();

        return view('config.secciones.catalogos.create', compact('categorias', 'tallas'));
    }

    public function store(Request $request)
    {
        $catalogo = new Catalogo;

        $file_catalogo = $request->file('archivo');
        $extension_catalogo = $file_catalogo->getClientOriginalExtension();
        $namefile_catalogo = Str::random(30) . '.' . $extension_catalogo;

        \Storage::disk('local')->put("img/photos/catalogo/" . $namefile_catalogo, \File::get($file_catalogo));

        $catalogo->categoria_id = $request->categoria;
        $catalogo->talla_id = $request->talla;
        $catalogo->nombre = $request->nombre;
        $catalogo->portada = $namefile_catalogo;
        $catalogo->largo = $request->largo;
        $catalogo->ancho = $request->ancho;
        $catalogo->alto = $request->alto;
        $catalogo->activo = 1;
        $catalogo->visible = 0;
        $catalogo->inicio = 0;

        $catalogo->save();

        $caracteristicas = $request->input('caracteristicas');

        foreach ($caracteristicas as $caracteristica) {
            CatalogoCaracteristicas::create([
                'caracteristica' => $caracteristica, 
                'catalogo_id' => $catalogo->id
            ]);
        }

        \Toastr::success('Brincolin creado con éxito');
        return redirect()->route('seccion.show', ['slug' => 'catalogo']);
    }

    public function show(Catalogo $catalogo)
    {
        return view('config.secciones.catalogos.show', compact('catalogo'));
    }

    public function edit(Catalogo $catalogo)
    {
        $categorias = Categoria::all();
        $tallas = Talla::all();
        
        return view('config.secciones.catalogos.edit', compact('categorias', 'tallas', 'catalogo'));
    }

    public function update(Request $request, Catalogo $catalogo)
    {
        $request->validate([
            'categoria' => 'required',
            'talla' => 'required',
            'nombre' => 'required|string|max:255',
            'largo' => 'nullable|numeric',
            'ancho' => 'nullable|numeric',
            'alto' => 'nullable|numeric',
            'caracteristicas.*' => 'nullable|string|max:255',
            'archivo' => 'nullable|image|max:2048',
        ]);
    
        try {
            $catalogo->categoria_id = $request->categoria;
            $catalogo->talla_id = $request->talla;
            $catalogo->nombre = $request->nombre;
            $catalogo->largo = $request->largo;
            $catalogo->ancho = $request->ancho;
            $catalogo->alto = $request->alto;
    
            if ($request->hasFile('archivo')) {
                if ($catalogo->portada && Storage::exists('img/photos/catalogo/' . $catalogo->portada)) {
                    Storage::delete('img/photos/catalogo/' . $catalogo->portada);
                }
    
                $file_catalogo = $request->file('archivo');
                $namefile_catalogo = Str::random(30) . '.' . $file_catalogo->getClientOriginalExtension();
                Storage::disk('local')->put("img/photos/catalogo/" . $namefile_catalogo, File::get($file_catalogo));
                $catalogo->portada = $namefile_catalogo;
            }
    
            $catalogo->save();
    
            $caracteristicas = $request->input('caracteristicas', []);
            foreach ($caracteristicas as $caracteristica) {
                if (!empty($caracteristica)) {
                    $existingCaracteristica = CatalogoCaracteristicas::where('catalogo_id', $catalogo->id)->where('caracteristica', $caracteristica)->first();

                    if (!$existingCaracteristica) {
                        CatalogoCaracteristicas::create([
                            'caracteristica' => $caracteristica,
                            'catalogo_id' => $catalogo->id,
                        ]);
                    }
                }
            }
            
            \Toastr::success('Brincolin actualizado con éxito');
            return redirect()->route('seccion.show', ['slug' => 'catalogo']);
        } catch (\Exception $e) {
            \Toastr::error('Error al actualizar el Brincolin');
            return redirect()->back()->withInput();
        }
    }
    
    public function deactivate(Catalogo $catalogo)
    {
        try {
            $catalogo->activo = 0;
            $catalogo->update();
    
            return response()->json(['success' => true,  'message' => 'Catálogo eliminado.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'No se pudo eliminar el catálogo.'], 500);
        }
    }

    public function activate(Catalogo $catalogo)
    {
        try {
            $catalogo->activo = 1;
            $catalogo->update();
    
            return response()->json(['success' => true,  'message' => 'Catálogo eliminado.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'No se pudo eliminar el catálogo.'], 500);
        }
    }

    public function destroy($id)
    {
        // Test de los datos
        // return response()->json(['success' => true, 'catalogo' => $catalogo, 'categoria_catalogo' => $catalogo->categoria,'catalogo_tall' => $catalogo->talla,'catalogo_catacteristicas' => $catalogo->caracteristicas,'catalogo_galeria' => $catalogo->galeria], 200);
$catalogo = Catalogo::find($id);
        try {
            // Borramos las imagenes en el sistema de archivos (eliminación física)
            $img_catalogo = 'img/photos/catalogo/'.$catalogo->portada;
            unlink($img_catalogo);

            $catalogo->delete();

            \Toastr::success('Se elimino catalogo');
            return redirect()->back();
        } catch (\Exception $e) {
            \Toastr::success('Error al eliminar catalogo');
            return redirect()->back();
        }
    }

    public function paginaweb($id){
        $categoria = Catalogo::find($id);
        
        return view('config.secciones.paginaweb', compact('categoria'));
    }
}


