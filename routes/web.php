<?php

    use Illuminate\Support\Facades\Route;
    use Illuminate\App\Http\Controllers\FrontController;
    use Illuminate\App\Http\Controllers\SeccionController;
    use Illuminate\App\Http\Controllers\AJAXController;
    use Illuminate\App\Http\Controllers\Auth\LoginController;
    use Illuminate\App\Http\Controllers\SliderPrincipalController;
    use Illuminate\App\Http\Controllers\CategoriasController;
    use Illuminate\App\Http\Controllers\CatalogosController;
    use Illuminate\App\Http\Controllers\CatalogoCaracteristicasController;
    use Illuminate\App\Http\Controllers\CatalogoGaleriasController;
    use Illuminate\App\Http\Controllers\TallasController;
    use Illuminate\App\Http\Controllers\TematicasController;
    use Illuminate\App\Http\Controllers\BlogsController;
    use Illuminate\App\Http\Controllers\ProxyController;
    use Illuminate\App\Http\Controllers\ImageUploadController;
    use Illuminate\App\Http\Controllers\VentanasController;
   

    Route::get('/', 'FrontController@index')->name('front.home');
    Route::get('/paginaweb/{id}', 'FrontController@paginaweb')->name('front.paginaweb');
    Route::get('/webadmin', 'FrontController@webadmin')->name('front.webadmin');
    Route::get('/tiendaenlinea', 'FrontController@tiendaenlinea')->name('front.tiendaenlinea');
    Route::get('/sobrewozial', 'FrontController@sobrewozial')->name('front.sobrewozial');
    Route::get('/marketing', 'FrontController@marketing')->name('front.marketing');
    Route::get('/eventos', 'FrontController@eventos')->name('front.eventos');
    Route::get('/portafolio', 'FrontController@portafolio')->name('front.portafolio');
    Route::get('/contacto', 'FrontController@contacto')->name('front.contacto');


    Route::get('/nosotros', 'FrontController@nosotros')->name('front.nosotros');
    Route::get('/tienda', 'FrontController@catalogo_productos')->name('front.catalogo_productos');
    Route::get('/catalogo_detalle/{producto}', 'FrontController@catalogo_detalle')->name('front.catalogo_detalle');
    Route::get('/blog', 'FrontController@blog')->name('front.blog');
    Route::get('/blog_detalle/{blog}', 'FrontController@blog_detalle')->name('front.blog_detalle');
    Route::get('/aviso_privacidad', 'FrontController@aviso_privacidad')->name('front.aviso_privacidad');
    Route::get('/metodos_pago', 'FrontController@metodos_pago')->name('front.metodos_pago');
    Route::get('/devoluciones', 'FrontController@devoluciones')->name('front.devoluciones');
    Route::get('/terminos_condiciones', 'FrontController@terminos_condiciones')->name('front.terminos_condiciones');
    Route::get('/garantias', 'FrontController@garantias')->name('front.garantias');
    Route::get('/politicas_envio', 'FrontController@politicas_envio')->name('front.politicas_envio');
    Route::get('/faqs', 'FrontController@faqs')->name('front.faqs');
    Route::post('/formularioContact', 'FrontController@formularioContact')->name('formularioContact');
    Route::get('/mailtest', 'FrontController@mailtest')->name('mailtest');

    Route::post('/proxy', 'ProxyController@proxy')->name('proxy');
 
    Route::get('/admin', 'FrontController@admin')->name('front.admin')->middleware('checkAdminAccess');

    Auth::routes();
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::group(['middleware' => ['auth', 'isUser']], function() {
        Route::get('home', 'HomeController@index')->name('user.home'); 
    });

    Route::group(['middleware' => ['auth', 'isAdmin']], function() {
        Route::get('homeA', 'SeccionController@index')->name('admin.index');

        Route::prefix('politicas')->name('politicas.')->group(function(){
            Route::get('/','PoliticasController@index')->name('index');
            Route::get('/edit/{id}','PoliticasController@edit')->name('edit');
            Route::put('/update/{id}','PoliticasController@update')->name('update');
        });

        Route::prefix('faqsA')->name('faqsA.')->group(function(){
            Route::get('/','FAQController@index')->name('index');
            Route::get('/create','FAQController@create')->name('create');
            Route::post('/store','FAQController@store')->name('store');
            Route::get('/show/{id}','FAQController@show')->name('show');
            Route::get('/edit/{id}','FAQController@edit')->name('edit');
            Route::put('/update/{id}','FAQController@update')->name('update');
            Route::delete('/destoy/{id}','FAQController@destroy')->name('destroy');
        });

        Route::prefix('slider')->name('slider.')->group(function(){
            Route::get('/', 'SliderPrincipalController@index')->name('slider.index');
            Route::post('/store', 'SliderPrincipalController@store')->name('slider.store');
            Route::delete('/destroy/{slider}', 'SliderPrincipalController@destroy')->name('slider.destroy');
        });

        Route::prefix('galeria')->name('galeria.')->group(function(){
            Route::get('/{catalogo}', 'CatalogoGaleriasController@index')->name('galeria.index');
            Route::post('/store', 'CatalogoGaleriasController@store')->name('galeria.store');
            Route::delete('/destroy/{galeria}', 'CatalogoGaleriasController@destroy')->name('galeria.destroy');
        });

        Route::prefix('categorias')->name('categorias.')->group(function(){
            Route::post('/store', 'CategoriasController@store')->name('store');
            Route::patch('/deactivate/{categoria}', 'CategoriasController@deactivate')->name('deactivate');
            Route::patch('/activate/{categoria}', 'CategoriasController@activate')->name('activate');
            Route::delete('/destroy/{categoria}', 'CategoriasController@destroy')->name('destroy');
        });

        Route::prefix('catalogo')->name('catalogo.')->group(function(){
            Route::get('/', 'CatalogosController@index')->name('catalogo.index');
            Route::get('/create', 'CatalogosController@create')->name('catalogo.create');
            Route::post('/store', 'CatalogosController@store')->name('catalogo.store');
            Route::get('/edit/{catalogo}', 'CatalogosController@edit')->name('catalogo.edit');
            Route::get('/show/{catalogo}', 'CatalogosController@show')->name('catalogo.show');
            Route::put('/update/{catalogo}', 'CatalogosController@update')->name('catalogo.update');
            Route::patch('/deactivate/{catalogo}', 'CatalogosController@deactivate')->name('catalogo.deactivate');
            Route::patch('/activate/{catalogo}', 'CatalogosController@activate')->name('catalogo.activate');
            Route::delete('/destroy/{id}', 'CatalogosController@destroy')->name('destroy');
            Route::get('paginaweb/{id}', 'CatalogosController@paginaweb')->name('paginaweb');
        });

        Route::prefix('tematicas')->name('tematicas.')->group(function(){
            Route::post('/store', 'TematicasController@store')->name('store');
            Route::patch('/deactivate/{tematica}', 'TematicasController@deactivate')->name('deactivate');
            Route::patch('/activate/{tematica}', 'TematicasController@activate')->name('activate');
            Route::delete('/destroy/{tematica}', 'TematicasController@destroy')->name('destroy');
        });

        Route::prefix('blogs')->name('blogs.')->group(function(){
            Route::get('/', 'BlogsController@index')->name('index');
            Route::get('/create', 'BlogsController@create')->name('create');
            Route::post('/store', 'BlogsController@store')->name('store');
            Route::get('/edit/{blog}', 'BlogsController@edit')->name('edit');
            Route::get('/show/{blog}', 'BlogsController@show')->name('show');
            Route::put('/update/{blog}', 'BlogsController@update')->name('update');
            Route::patch('/deactivate/{blog}', 'BlogsController@deactivate')->name('deactivate');
            Route::patch('/activate/{blog}', 'BlogsController@activate')->name('activate');
            Route::delete('/destroy/{blog}', 'BlogsController@destroy')->name('destroy');
        });

        Route::prefix('catalogo_caracteristica')->name('catalogo_caracteristica')->group(function() {
            Route::delete('destroy/{id}', 'CatalogoCaracteristicasController@destroy')->name('destroy');
        });

        Route::prefix('archivados')->name('archivados.')->group(function(){
            Route::get('/archivados-categorias', 'ArchivadosController@archivados_categorias')->name('archivados.categorias');
            Route::get('/archivados-catalogos', 'ArchivadosController@archivados_catalogos')->name('archivados.catalogos');
            Route::get('/archivados-tematicas', 'ArchivadosController@archivados_tematicas')->name('archivados.tematicas');
            Route::get('/archivados-blogs', 'ArchivadosController@archivados_blogs')->name('archivados.blogs');
        });

        Route::prefix('secciones')->name('seccion.')->group(function(){
            Route::get('/','SeccionController@index')->name('index');
			Route::get('/{slug}','SeccionController@show')->name('show');
            Route::post('/cambiar_imagen_seccion','SeccionController@cambiar_imagen_seccion')->name('cambiar_imagen_seccion');
            Route::post('/cambiar_imagen_seccion_2','SeccionController@cambiar_imagen_seccion_2')->name('cambiar_imagen_seccion_2');
            Route::post('/cambiar_imagen_seccion_3','SeccionController@cambiar_imagen_seccion_3')->name('cambiar_imagen_seccion_3');
            Route::post('/cambiar_imagen_seccion_4','SeccionController@cambiar_imagen_seccion_4')->name('cambiar_imagen_seccion_4');
            Route::post('/agregar_seccion', 'SeccionController@agregar_seccion')->name('agregar_seccion');
            Route::post('/agregar_seccion_2', 'SeccionController@agregar_seccion_2')->name('agregar_seccion_2');
            Route::post('/agregar_seccion_3', 'SeccionController@agregar_seccion_3')->name('agregar_seccion_3');
            Route::delete('/destroy/{id}', 'SeccionController@destroy')->name('destroy');
        });

        Route::prefix('ventanas')->name('ventana.')->group(function(){
            Route::get('/', 'VentanasController@index')->name('index');
            Route::get('/create', 'VentanasController@create')->name('create');
            Route::post('/store', 'VentanasController@store')->name('store');
            Route::get('/edit', 'VentanasController@edit')->name('edit');
            Route::get('/show', 'VentanasController@show')->name('show');
            Route::put('/update', 'VentanasController@update')->name('update');
            Route::post('portafolio', 'VentanasController@portafolio')->name('portafolio');
        });

        Route::prefix('eventos')->name('evento.')->group(function(){
            Route::get('/', 'EventosController@index')->name('index');
            Route::get('/create', 'EventosController@create')->name('create');
            Route::post('/store', 'EventosController@store')->name('store');
            Route::get('/edit', 'EventosController@edit')->name('edit');
            Route::get('/show', 'EventosController@show')->name('show');
            Route::put('/update', 'EventosController@update')->name('update');
            Route::post('eventos', 'EventosController@eventos')->name('eventos');
            Route::delete('/destroy/{id}', 'EventosController@destroy')->name('destroy');
        });
    });

    Route::patch('/editarajax', 'AJAXController@editarajax');
    Route::post('/switch_inicio', 'AJAXController@switch_inicio')->name('ajax.switch_inicio');
    Route::post('/switch_visible', 'AJAXController@switch_visible')->name('ajax.switch_visible');
    Route::post('/switch_visible_2', 'AJAXController@switch_visible_2')->name('ajax.switch_visible_2');
    Route::post('/switch_visible_3', 'AJAXController@switch_visible_3')->name('ajax.switch_visible_3');
    Route::post('/switch_eliminar', 'AJAXController@switch_eliminar')->name('ajax.switch_eliminar');
    Route::post('/cambiar_imagen', 'AJAXController@cambiar_imagen')->name('ajax.cambiar_imagen');
    Route::post('/cambiar_imagen_categoria', 'AJAXController@cambiar_imagen_categoria')->name('ajax.cambiar_imagen_categoria');
    Route::post('/upload_image', 'ImageUploadController@uploadImage')->name('upload.image');

    
  


