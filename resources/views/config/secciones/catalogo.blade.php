@extends('layouts.admin')

@section('extraCSS')

    <style>

        .imagen-categoria {
            position: relative;
            display: block;
        }

        .overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .col-1:hover .overlay {
            opacity: 1;
            visibility: visible;
        }

        .btn-outlinea {
            background-color: rgba(255, 255, 255, 0.8); 
            border: 1px solid #ddd; 
        }

        .imagen-categoria {
            width: 100%;
            height: 3rem;
        }

        .portada-catalogo {
            width: 100%;
            height: 3rem;
            transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1), box-shadow 0.4s cubic-bezier(0.25, 0.8, 0.25, 1); /* Ajustar la duración y función de temporización */
            position: relative;
            z-index: 1;
        }

        .portada-catalogo:hover {
            transform: scale(1.6); /* Efecto de zoom */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Añadir sombra */
            z-index: 10; /* Asegurar que la imagen esté encima de otros elementos */
        }

    </style>

    <style>

        .switch-visible {
            background-color: #E5E7EB !important;
            border: 1px solid rgb(146, 144, 144) !important;
        }

        .switch-visible:checked {
            background-color: #9CA3AF !important;
            border: 1px solid rgb(146, 144, 144) !important;
        }

        .switch-inicio {
            background-color: #FEF3C7 !important;
            border: 1px solid rgb(146, 144, 144) !important;
        }

        .switch-inicio:checked {
            background-color: #FCD34D !important;
            border: 1px solid rgb(146, 144, 144) !important;
        }

    </style>

    <script>
        
        toastr.options = {
            "progressBar": true,   
        }

    </script>

    <style>

        .file-upload input[type="file"] {
            position: absolute;
            left: -9999px;
        }

        .file-upload label {
            display: inline-block;
            background-color: #00000031;
            color: #fff;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 4px;
            font-weight: normal;
              /* opacity: 80%; */
        }

        .file-upload input[type="file"] + label:before {
            content: "\f07b";
            font-family: "Font Awesome 5 Free";
            font-size: 16px;
            margin-right: 5px;
            transition: all 0.5s;
        }

        .file-upload input[type="file"] + label {
            transition: all 0.5s;
        }                  
        
        .file-upload input[type="file"]:focus + label,
        .file-upload input[type="file"] + label:hover {
            backdrop-filter: blur(5px);
            background-color: #41464a37;
            opacity: 100%;
            transition: all 0.5s;
        }
  
    </style>

    <style>
        .fixed-button {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 1000;
        }

        .fixed-button2 {
            position: fixed;
            bottom: 60px;
            left: 20px;
            z-index: 1000;
        }
    </style>

@endsection

@section('content')
    <a href="{{ route('archivados.archivados.categorias') }}" class="btn btn-danger fixed-button2">Catálogos archivados</a>
    <a href="{{ route('archivados.archivados.catalogos') }}" class="btn btn-danger fixed-button">Productos archivados</a>

    <div class="row mt-5" >
        <div class="col">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="row">
                        <a href="{{ route('front.admin') }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto w-50"><i class="fa fa-reply"></i> Regresar</a>
                    </div>
                    <div class="row mt-1 d-flex align-items-center justify-content-center">
                        <div class="col text-center fs-1 fw-bolder">
                            <button class="btn btn-dark w-100 rounded-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop-categorias">Nuevo catálogo <i class="bi bi-plus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 mt-4">
                    <div class="row">
                        <div class="col text-center fs-1 fw-bolder">
                            Catálogo
                        </div>
                    </div>
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="col text-center mt-3 fw-bolder">
                            @if($categorias->isEmpty()) 
                                <button disabled class="btn btn-danger w-100 rounded-pill mt-3">No puedes crear productos porque no hay catálogos</button>
                            @else
                                <a href="{{ route('catalogo.catalogo.create') }}" class="btn btn-dark w-100 rounded-0">Crear nuevo producto <i class="bi bi-plus"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-3 mb-5 px-0">
        <div class="row">
            <div class="col">
                <div class="row mb-2">
                    <div class="col-lg-6 col-12">
                        <button class="btn btn-dark fs-5 w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Administrar categorías del catálogo</button>
                    </div>
                    <div class="col-lg-6 col-12 mt-lg-0 mt-2 border px-0">
                        <input class="form-control shadow-none" id="myInput" type="text" placeholder="Filtrar por nombre o categoría">
                    </div>
                </div>
                <div class="row">
                    <div class="card bg-dark text-white fs-bolder text-center py-1 col-12 mt-md-0 mt-1">
                        <div class="row">
                            <div class="col-md-1 col-12 position-relative">   
                                <i class="bi bi-camera"></i>
                            </div>
                            <div class="col-md-2 col-12 d-flex align-items-center justify-content-start">
                                Catálogo
                            </div>
                            <div class="col-lg-5 col-12 d-flex align-items-center justify-content-start">
                                Producto
                            </div>
                            <div class="col-lg-1 col-12">
                                Ocultar
                            </div>
                            <div class="col-lg-1 col-12">
                                Inicio
                            </div>
                            <div class="col-lg-2 col-12 d-flex align-items-center justify-content-center">               
                                Acciones
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="myList">
                    @foreach ($catalogos as $cata)
                        <div  class="catalogo-card card col-12 mt-md-0 mt-1" data-categoria-id="{{ $cata->categoria_id }}">
                            <div class="row">
                                <div class="col-md-1 col-12 position-relative">   
                                    <img src="{{ asset('img/photos/catalogo/'.$cata->portada) }}" alt="" class="img-fluid portada-catalogo">
                                </div>
                                <div class="col-md-2 col-12 d-flex align-items-center justify-content-start">
                                    {{ $cata->categoria->categoria }}
                                </div>
                                <div class="col-lg-5 col-12 d-flex align-items-center justify-content-start">
                                    {{ $cata->nombre }}
                                </div>
                                <div class="col-lg-1 col-6 d-flex align-items-center justify-content-center text-center">
                                    <div class="form-check form-switch row">
                                        <div class="col-12 d-flex align-items-center justify-content-center p-0 m-0 text-center">
                                            <input class="form-check-input switch-color-inicio switch-visible fs-3 shadow-none rounded-0" role="switch" id="switch_visible-{{$cata->id}}" data-id="{{$cata->id}}" data-campo="visible" type="checkbox" @if($cata->visible == 1) checked @endif>
                                        </div>
                                    </div>
                                    <script>
                                        $('#switch_visible-'+{{$cata->id}}).change(function (e){
                                            var checkbox = $(this);
                                            console.log('switch-'+{{$cata->id}});
                                            var check = 0;
                                            if (checkbox.prop('checked')) {
                                                check = 1;
                                            } else {
                                                check = 2;
                                            }
                                            console.log(check);
                                            var id = checkbox.attr("data-id");
                                            var tcsrf = $('meta[name="csrf-token"]').attr('content');
                                            var valor = check;
                                            var URL = "{{ route('ajax.switch_visible') }}";
                                            console.log("valor: " + valor);
                                            $.ajax({
                                                url: URL,
                                                type: 'post',
                                                dataType: 'json',
                                                data: {
                                                    "_method": 'post',
                                                    "_token": tcsrf,
                                                    "id": id,
                                                    "valor": valor
                                                }
                                            })
                                            .done(function(msg) {
                                                console.log(msg);
                                                if (msg.success) {
                                                    toastr["warning"](msg.mensaje);
                                                    if (msg.mensaje.valor == 1) {
                                                        checkbox.prop('checked', true);
                                                    } else if (msg.mensaje.valor == 2) {
                                                        checkbox.prop('checked', false);
                                                    }
                                                } else {
                                                    toastr["error"](msg.mensaje);
                                                }
                                            })
                                            .fail(function(msg) {
                                                toastr["error"]('Error al cambiar el estatus');
                                            });
                                        });
                                    </script>
                                </div>
                                <div class="col-lg-1 col-6 d-flex align-items-center justify-content-center text-center">
                                    <div class="form-check form-switch row">
                                        <div class="col-12 d-flex align-items-center justify-content-center">
                                            <input class="form-check-input switch-color-inicio switch-inicio fs-3 shadow-none rounded-0" role="switch" id="switch_inicio-{{$cata->id}}" data-id="{{$cata->id}}" data-campo="inicio" type="checkbox" @if($cata->inicio == 1) checked @endif>
                                        </div>
                                    </div>
                                    <script>
                                        $('#switch_inicio-'+{{$cata->id}}).change(function (e){
                                            var checkbox = $(this);
                                            console.log('switch-'+{{$cata->id}});
                                            var check = 0;
                                            if (checkbox.prop('checked')) {
                                                check = 1;
                                            } else {
                                                check = 2;
                                            }
                                            console.log(check);
                                            var id = checkbox.attr("data-id");
                                            var tcsrf = $('meta[name="csrf-token"]').attr('content');
                                            var valor = check;
                                            var URL = "{{ route('ajax.switch_inicio') }}";
                                            console.log("valor: " + valor);
                                            $.ajax({
                                                url: URL,
                                                type: 'post',
                                                dataType: 'json',
                                                data: {
                                                    "_method": 'post',
                                                    "_token": tcsrf,
                                                    "id": id,
                                                    "valor": valor
                                                }
                                            })
                                            .done(function(msg) {
                                                console.log(msg);
                                                if (msg.success) {
                                                    toastr["warning"](msg.mensaje);
                                                    if (msg.mensaje.valor == 1) {
                                                        checkbox.prop('checked', true);
                                                    } else if (msg.mensaje.valor == 2) {
                                                        checkbox.prop('checked', false);
                                                    }
                                                } else {
                                                    toastr["error"](msg.mensaje);
                                                }
                                            })
                                            .fail(function(msg) {
                                                toastr["error"]('Error al destacar en inicio');
                                            });
                                        });
                                    </script>
                                </div>
                                <div class="col-lg-2 col-12 d-flex align-items-center justify-content-center">               
                                    <a href="{{ route('galeria.galeria.index', ['catalogo' => $cata->id]) }}" class="btn btn-dark rounded-0 w-100">
                                        <i class="bi bi-camera"></i>
                                    </a>  
                                    <a href="{{ route('catalogo.catalogo.show', ['catalogo' => $cata->id]) }}" class="btn btn-primary rounded-0 w-100">
                                        <i class="bi bi-eye"></i>
                                    </a>                    
                                    <a href="{{ route('catalogo.catalogo.edit', ['catalogo' => $cata->id]) }}" class="btn btn-info rounded-0 w-100">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>                   
                                    <form action="{{ route('catalogo.catalogo.deactivate', $cata->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('POST')
                                        <button type="button" class="btn btn-danger btn-desactivar-catalogo rounded-0 w-100">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row mt-3" id="noResultsMessage" style="display: none;">
                    <div class="col-12 text-center">
                        <div class="alert alert-danger">
                            No hay catálogos/categorías con ese nombre.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade mt-5" id="staticBackdrop-categorias" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-categorias" aria-hidden="true">
        <div class="modal-dialog modal-lg mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel-categorias">Nueva Categoría</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-nueva-categoria" action="{{ route('categorias.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="input-nueva_categoria--nombre">Nombre de la categoría</span>
                            <input type="text" name="n_categoria_nombre" class="form-control shadow-none" aria-label="alto" aria-describedby="input-nueva_categoria--nombre" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="input-nueva_categoria--portada">Icono/Imagen</span>
                            <input type="file" name="n_categoria_portada" class="form-control shadow-none" aria-label="alto" aria-describedby="input-nueva_categoria--portada" required>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <button type="submit" class="btn btn-dark w-100 btn-crear-categoria">Crear nueva categoría</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal">Cacnelar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade mt-5" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Administrar categorías</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @foreach ($categorias as $cate)
                            @if ($cate->activo != 0)
                                <div class="col-12 border-bottom border-dark" id="categoria-{{ $cate->id }}">
                                    <div class="row">
                                        <div class="col-1 border-bottom border-white px-0 position-relative">
                                            <img src="{{ asset('img/photos/categorias/'.$cate->portada) }}" alt="categoría imagen" class="img-fluid w-100 imagen-categoria" id="imagen-{{ $cate->id }}">
                                            <div class="overlay position-absolute top-50 start-50 translate-middle">
                                                <form id="form-imagen-{{ $cate->id }}" action="{{ route('ajax.cambiar_imagen_categoria') }}" method="POST" class="file-upload mt-2" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="tipo_imagen" value="categoria_imagen">
                                                    <input type="hidden" name="id_imagen" value="{{ $cate->id }}">
                                                    <input id="input-imagen-{{ $cate->id }}" class="m-0 p-0 input-imagen" type="file" name="imagen">
                                                    <label class="col-12 m-0 p-2 d-flex justify-content-center align-items-center" for="input-imagen-{{ $cate->id }}" style="opacity: 100%; !important; border-radius: 26px; background-color: #FFFFFF; color: #000000;">
                                                        <i class="bi bi-plus"></i>
                                                    </label>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-9 d-flex align-items-center justify-content-start">
                                            <input type="text" class="form-control shadow-none bg-white editarajax" data-model="Categoria" data-id="{{ $cate->id }}" data-field="categoria" value="{{ $cate->categoria }}">
                                        </div>
                                        <div class="col-2 mt-1">
                                            <form action="{{ route('categorias.deactivate', $cate->id) }}" method="POST" class="form-deactivate-categoria" data-id="{{ $cate->id }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="button" class="btn btn-danger w-100 px-1 btn-desactivar-categoria rounded-0">
                                                    Desactivar
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success w-100" data-bs-dismiss="modal">Salir de las categorías</button>
                </div>
            </div>
        </div>
    </div>
    
    

@endsection

@section('extraJS')

    <script>
        
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener el token CSRF del meta tag
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            document.querySelectorAll('.input-imagen').forEach(function(input) {
                input.addEventListener('change', function(event) {
                    let form = event.target.closest('form');
                    let formData = new FormData(form);

                    fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': csrfToken // Incluir el token CSRF en los encabezados
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            let imgElement = document.getElementById('imagen-' + data.id);
                            imgElement.src = data.new_image_url;
                            Swal.fire(
                                '¡Imagen agregada!',
                                'La imagen de la categoría ha sido actualziada',
                                'success'
                            );
                        } else {
                            alert('Hubo un problema al actualizar la imagen');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error al procesar la solicitud');
                    });
                });
            });
        });

    </script>

    <script>

        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                var hasVisible = false;
                $("#myList .card").filter(function() {
                    var match = $(this).text().toLowerCase().indexOf(value) > -1;
                    $(this).toggle(match);
                    if (match) {    
                        hasVisible = true;
                    }
                });
                $("#noResultsMessage").toggle(!hasVisible);
            });

            
            // $('.btn-desactivar-catalogo').on('click', function(e) {
            //     e.preventDefault();
            //     var form = $(this).closest('form');
            //     var url = form.attr('action');
                
            //     Swal.fire({
            //         title: '¿Estás seguro de que deseas desactivar este catálogo?',
            //         text: "",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Sí, desactivarlo!'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             $.ajax({
            //                 url: url,
            //                 type: 'PATCH',
            //                 data: {
            //                     _token: $('meta[name="csrf-token"]').attr('content')
            //                 },
            //                 success: function(response) {
            //                     if (response.success) {
            //                         toastr.success(response.message);
            //                         Swal.fire(
            //                             'Desactivado!',
            //                             'El catálogo ha sido desactivado.',
            //                             'success'
            //                         ).then(() => {
            //                             form.closest('.card').remove();
            //                         });
            //                     } else {
            //                         toastr.error(response.message);
            //                         Swal.fire(
            //                             'Error!',
            //                             'Hubo un problema al desactivar el catálogo.',
            //                             'error'
            //                         );
            //                     }
            //                 },
            //                 error: function(xhr) {
            //                     toastr.error('No se pudo desactivar el catálogo.');
            //                     Swal.fire(
            //                         'Error!',
            //                         'Hubo un problema al desactivar el catálogo.',
            //                         'error'
            //                     );
            //                 }
            //             });
            //         }
            //     });
            // });

            // $(document).ready(function() {
            //     $('#form-nueva-categoria').on('submit', function(event) {
            //         event.preventDefault(); // Prevenir el envío tradicional del formulario

            //         let formData = new FormData(this); // Crear un objeto FormData con los datos del formulario

            //         $.ajax({
            //             url: $(this).attr('action'), // URL del formulario
            //             type: $(this).attr('method'), // Método HTTP (POST)
            //             data: formData, // Datos del formulario
            //             contentType: false, // Para enviar archivos
            //             processData: false, // Para evitar que jQuery procese los datos
            //             success: function(response) {
            //                 if(response.success) {
            //                     // Mostrar mensaje de éxito
            //                     alert(response.message);

            //                     // Opcional: Agregar la nueva categoría a la lista en el frontend
            //                     // $("#category-list").append(`<li>${response.categoria.categoria}</li>`);

            //                     // Limpiar el formulario y cerrar el modal
            //                     $('#form-nueva-categoria')[0].reset();
            //                     $('#staticBackdrop-categorias').modal('hide');
            //                 } else {
            //                     // Manejo de errores del servidor
            //                     alert('Hubo un error: ' + response.message);
            //                 }
            //             },
            //             error: function(xhr) {
            //                 // Manejo de errores de la solicitud Ajax
            //                 console.log(xhr.responseText);
            //                 alert('Hubo un error al crear la categoría.');
            //             }
            //         });
            //     });
            // });


            // $(document).ready(function() {
            //     $('.btn-desactivar-categoria').on('click', function(e) {
            //         e.preventDefault();
            //         var form = $(this).closest('form');
            //         var categoryId = form.data('id');

            //         Swal.fire({
            //             title: '¿Estás seguro de que deseas deshabilitar esta categoría?',
            //             text: "¡Todos los brincolines asociados a esta categoría también serán deshabilitados!",
            //             icon: 'warning',
            //             showCancelButton: true,
            //             confirmButtonColor: '#3085d6',
            //             cancelButtonColor: '#d33',
            //             confirmButtonText: 'Sí, deshabilitar!'
            //         }).then((result) => {
            //             if (result.isConfirmed) {
            //                 $.ajax({
            //                     url: form.attr('action'),
            //                     type: 'POST',
            //                     data: form.serialize(),
            //                     success: function(response) {
            //                         if (response.success) {
            //                             $('#categoria-' + categoryId).remove();
            //                             Swal.fire(
            //                                 'Eliminado!',
            //                                 'La categoría ha sido eliminada.',
            //                                 'success'
            //                             );
            //                         } else {
            //                             Swal.fire(
            //                                 'Error!',
            //                                 'No se pudo eliminar la categoría.',
            //                                 'error'
            //                             );
            //                         }
            //                     },
            //                     error: function(response) {
            //                         Swal.fire(
            //                             'Error!',
            //                             'Ocurrió un error. Intenta de nuevo más tarde.',
            //                             'error'
            //                         );
            //                     }
            //                 });
            //             }
            //         });
            //     });
            // });

        });

    </script>

    <script>

        $(document).ready(function(){
            $('.btn-desactivar-catalogo').on('click', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                var url = form.attr('action');

                Swal.fire({
                    title: '¿Estás seguro de que deseas desactivar este producto?',
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, desactivarlo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'PATCH',
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.success) {
                                    toastr.success(response.message);
                                    Swal.fire(
                                        'Desactivado!',
                                        'El producto ha sido desactivado.',
                                        'success'
                                    ).then(() => {
                                        form.closest('.card').remove(); // Eliminar el elemento del DOM
                                    });
                                } else {
                                    toastr.error(response.message);
                                    Swal.fire(
                                        'Error!',
                                        'Hubo un problema al desactivar el producto.',
                                        'error'
                                    );
                                }
                            },
                            error: function(xhr) {
                                toastr.error('No se pudo desactivar el producto.');
                                Swal.fire(
                                    'Error!',
                                    'Hubo un problema al desactivar el producto.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

            $('.btn-desactivar-categoria').on('click', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                var categoryId = form.data('id');

                Swal.fire({
                    title: '¿Estás seguro de que deseas deshabilitar este catálogo?',
                    text: "¡Todos los brincolines asociados a este catálogo también serán deshabilitados!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, deshabilitar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: form.attr('action'),
                            type: 'POST',
                            data: form.serialize(),
                            success: function(response) {
                                if (response.success) {
                                    // Eliminar la categoría del DOM
                                    $('#categoria-' + categoryId).remove();

                                    // Eliminar todos los catálogos relacionados del DOM
                                    $('.catalogo-card[data-categoria-id="' + categoryId + '"]').remove();

                                    Swal.fire(
                                        'Eliminado!',
                                        'El catálogo ha sido deshabilitada junto con sus productos.',
                                        'success'
                                    );
                                } else {
                                    Swal.fire(
                                        'Error!',
                                        'No se pudo eliminar el catálogo.',
                                        'error'
                                    );
                                }
                            },
                            error: function(response) {
                                Swal.fire(
                                    'Error!',
                                    'Ocurrió un error. Intenta de nuevo más tarde.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });

    </script>

    {{-- Lazy Loading para mejorar el rendimiendo de la página en las etiquetas <img> --}}
    <script>

        $(function() {
            $('img.lazy-load').each(function() {
                $(this).attr('data-src', $(this).attr('src'));
                $(this).removeAttr('src');
            });
        
            $(window).on('scroll', function() {
                $('img.lazy-load').each(function() {
                    if ($(this).offset().top < $(window).scrollTop() + $(window).height()) {
                        $(this).attr('src', $(this).data('src'));
                    }
                });
            });
        });

    </script>

@endsection
