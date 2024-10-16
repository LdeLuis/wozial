@extends('layouts.admin')

@section('extraCSS')
    <style>
        .principal {
            padding: 0 10rem 20rem 10rem;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            z-index: 0;
            width: 100%;
            height: 100%;
            background-image: url({{ asset('img/design/recursos/home/background.png') }});
        }

        .cursiva {
            font-style: italic;
            text-decoration: underline;
            text-decoration-thickness: 2px;
            font-size: 100px;
            font-weight: 300;
            font-family: "Quicksand", sans-serif;
            font-weight: <weight>;
            transition: ease all 0.7s;
            color: black;
        }

        h4{
            font-size: 2rem;
        }

        .cursiva:hover {
            transform: translateX(3rem);
            color: blue;
        }

        .lock_img {
            position: absolute;
            top: 40;
            right: 40px;
            z-index: 1;
        }

        .centro2 {
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .centro3 {
            text-align: center;
            margin: 50px;
            position: relative;
            z-index: 2;
        }

        .centro {
            text-align: center;

            position: relative;
            z-index: 2;
        }

        .estilo {
            font-family: "Quicksand", sans-serif;
            font-weight: <weight>;

        }

        .estilo p {
            font-size: 25px;
            padding-left: 1rem;
            width: 30rem;
        }

        .estilo input {
            font-style: italic;
            font-size: 50px;
            margin-top: 6rem;
            z-index: 4;
        }


        .movimient {
            margin-top: 80px;
        }

        .titulox {
            font-family: "Quicksand", sans-serif;
            font-weight: <weight>;
            font-size: 80px;
            font-weight: 300;
            text-decoration: line-through;
            text-decoration-thickness: 4px;
            margin-top: 8rem;
            margin-bottom: 2rem;


        }

        .quicksand {
            font-family: "Quicksand", sans-serif;
            font-weight: <weight>;
        }

        .button {
            height: 50px;
            width: 200px;
            position: relative;
            background-color: transparent;
            cursor: pointer;
            border: 2px solid #252525;
            overflow: hidden;
            border-radius: 30px;
            color: #333;
            transition: all 0.5s ease-in-out;
        }

        .btn-txt {
            z-index: 1;
            font-weight: 800;
            letter-spacing: 4px;
        }

        .type1::after {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            transition: all 0.5s ease-in-out;
            background-color: #333;
            border-radius: 30px;
            visibility: hidden;
            height: 10px;
            width: 10px;
            z-index: -1;
        }

        .button:hover {

            color: #fff;
            border: none;
        }

        .type1:hover::after {
            visibility: visible;
            transform: scale(100) translateX(2px);
        }

        .parrafo {
            margin: 20px;
            margin-bottom: 5rem;
            margin-top: 5rem;
            font-size: 30px;
            margin-left: 25%;
            margin-right: 25%;
        }

        .container {
            display: flex;
            justify-content: space-between;
            width: 80%;
            max-width: 1200px;
        }

        .item {
            text-align: center;
            width: 40%;
            font-size: 50px;
        }

        .item img {
            width: 60px;
            height: 60px;
        }

        .item p {
            font-weight: bold;
            margin: 40px;
        }

        .imagen-slider {
            width: 100%;
            object-fit: 100%;
        }

        .titulo-slider {
            font-size: 3.8rem;
            font-weight: 300;
            line-height: 1.2;
        }

        .boton-slider {
            background-color: var(--boton-verde);
            color: white;
            font-weight: bold;
            border-radius: 0;
        }

        .boton-slider:hover {
            background-color: var(--fondo-verde);
            color: white;
        }


        .dots {
            position: absolute;
            bottom: 15px;
            left: 55px;
            transform: translateX(-50%);
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .dots li {
            display: inline-block;
            margin: 0 5px;
        }

        .dots li.slick-active button {
            background-color: var(--boton-verde);
            border: 1px solid var(--boton-verde);
        }

        .dots button {
            width: 18px;
            height: 18px;
            border-radius: 0;
            background-color: var(--blanco);
            border: 1px solid var(--blanco);
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .slick-dots li button:before {
            content: none;
        }

        @keyframes moverYColor {
            0% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(50deg);
            }

            50% {
                transform: rotate(0deg);
            }

            75% {
                transform: rotate(-50deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        .cuadrado {
            margin-top: 5rem;
            width: 300px;
            height: 300px;
            animation-name: moverYColor;
            animation-duration: 2s;
            animation-timing-function: ease-in-out;
            animation-iteration-count: infinite;
        }

        .modal-body {
            padding: 2rem;
            }

            #file-upload {
            background-color: #f1f1f1;
            border: 1px solid #ddd;
            padding: 1rem;
            text-align: center;
            }

            .modal-footer .btn-secondary {
            background-color: red;
            }

            .modal-footer .btn-primary {
            background-color: blue;
            }

        .switch-visible {
            background-color: #E5E7EB !important;
            border: 1px solid rgb(146, 144, 144) !important;
        }

        .switch-visible:checked {
            background-color: #9CA3AF !important;
            border: 1px solid rgb(146, 144, 144) !important;
        }
    </style>
@endsection

@section('content')
    <div class="row mt-5 mb-4 px-2">
    
        <a href="{{ route('front.admin') }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i>
            Regresar</a>
    </div>

    <div style="background-color: #fff">
        <section class="principal">
            <div class="row">
                <div class="col-md-6">
                    <div class="titlepage">
                        <div class="estilo">
                            <input class="editarajax" data-model="Elemento" data-field="texto" data-id="{{$elements[0]->id}}" type="text" value="{{$elements[0]->texto}}" style="width: 22rem;">

                            <textarea class="editarajax" data-model="Elemento" data-field="texto" data-id="{{$elements[1]->id}}" name="" id="" cols="40" rows="10">{{$elements[1]->texto}}</textarea>
                            <br><br>
                        </div>
                        <div class="centro2">
                            <button class="button type1">
                                <span class="btn-txt">COTIZACIÓN</span>
                            </button>
                        </div>

                    </div>
                </div>


                <div class="col-md-6">
                    <div class="about_img"><br><br><br>
                        <form class="img-contact" id="form_slider_image" action="{{ route('seccion.cambiar_imagen_seccion') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="archivo" id="hidden_file_input" style="display: none;">
                            <input type="hidden" name="id_imagen" value="{{ $elements[2]->id }}" id="">
                            <div class="carru-modal" style="width: 30rem; height:35rem;" id="clickable_area">
                                <p>CAMBIAR IMAGEN</p>
                            </div>
                            <img src="{{ asset('img/photos/imagenes_estaticas/' . $elements[2]->imagen) }}" width="480" height="450" alt="">
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="d-flex flex-lg-12 flex-column text-center">
                <div class="col-lg-12 mb-5">
                    <h4>Agregar sección</h4>
                    <button style="background: none; border: none; color:black;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-circle-plus" style="font-size: 2.5rem;"></i>
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" style="padding-top: 3rem;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nueva sección</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex col-12 flec-column">
                                    <div class="col-12">
                                        <form action="{{route('seccion.agregar_seccion')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                              <label for="file-upload" class="form-label">Seleccionar archivo</label>
                                              <div class="input-group">
                                                <input type="file" name="archivo" class="form-control" id="file-upload">
                                              </div>
                                            </div>
                                            <div class="mb-3">
                                              <label for="section-name" class="form-label">Nombre de Sección:</label>
                                              <input type="text" name="nombre" class="form-control" id="section-name">
                                            </div>
                                            <div class="mb-3">
                                              <label for="section-description" class="form-label">Descripción:</label>
                                              <textarea class="form-control" name="descripcion" id="section-description" rows="3"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                          </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container">
                <div class="d-flex flex-wrap">
                    @foreach ($catalogos as $c)
                    <div  class="col-12">
                        <div class="col-12 d-flex flex-row justify-content-center align-items-center">
                        <div class="col-1">
                            <div class="form-check form-switch row">
                                <div class="col-12 d-flex align-items-center justify-content-center p-0 m-0 text-center">
                                    <input class="form-check-input switch-color-inicio switch-visible fs-3 shadow-none rounded-0" role="switch" id="switch_visible_2-{{$c->id}}" data-id="{{$c->id}}" data-campo="visible" type="checkbox" @if($c->visible == 1) checked @endif>
                                </div>
                            </div>
                            <script>
                                    $('#switch_visible_2-'+{{$c->id}}).change(function (e){
                                        var checkbox = $(this);
                                        console.log('switch-'+{{$c->id}});
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
                                        var URL = "{{ route('ajax.switch_visible_2') }}";
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
                                                toastr["success"](msg.mensaje);
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
                        <div class="col-10">
                            <a class="cursiva" href="{{ route('catalogo.paginaweb',$c->id) }}">• {{$c->nombre}}</a>
                        </div>
                        <div class="col-1">
                            <form action="{{ route('catalogo.destroy', $c->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este registro?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="background: none; border: none; color:black;">
                                    <i class="fas fa-trash" style="font-size: 3rem;"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    </div>
                    @endforeach
                </div>
            </div><br>
            <div class="centro3">
                <button class="button type1">
                    <span class="btn-txt">cotización</span>
                </button>
            </div>
        </section>

        <section>
            <div class="centro">
                <p class="titulox">Sabemos que...</p>
            </div>
            <div class="centro">
                <div class="container">
                    <div class="item">
                        <form class="img-contact" id="form_slider_image_2" action="{{ route('seccion.cambiar_imagen_seccion') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="archivo" id="hidden_file_input_2" style="display: none;">
                            <input type="hidden" name="id_imagen" value="{{ $elements[3]->id }}" id="">
                            <div class="carru-modal" style="width: 20rem; height:14rem;" id="clickable_area_2">
                                <p>CAMBIAR IMAGEN</p>
                            </div>
                            <img class="cuadrado" src="{{ asset('img/photos/imagenes_estaticas/' . $elements[3]->imagen) }}" width="480" height="450" alt="">
                        </form><br>
                        <textarea class="editarajax" data-model="Elemento" data-field="texto" data-id="{{$elements[4]->id}}" style="font-size: 25px;" name="" id="" cols="10" rows="8">{{$elements[4]->texto}}</textarea>
                    </div>
                    <div class="item">
                        <form class="img-contact" id="form_slider_image_3" action="{{ route('seccion.cambiar_imagen_seccion') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="archivo" id="hidden_file_input_3" style="display: none;">
                            <input type="hidden" name="id_imagen" value="{{ $elements[5]->id }}" id="">
                            <div class="carru-modal" style="width: 20rem; height:14rem;" id="clickable_area_3">
                                <p>CAMBIAR IMAGEN</p>
                            </div>
                            <img class="cuadrado" src="{{ asset('img/photos/imagenes_estaticas/' . $elements[5]->imagen) }}" width="480" height="450" alt="">
                        </form><br>
                        <textarea class="editarajax" data-model="Elemento" data-field="texto" data-id="{{$elements[6]->id}}" style="font-size: 25px;" name="" id="" cols="10" rows="8">{{$elements[6]->texto}}</textarea>
                    </div>
                    <div class="item">
                        <form class="img-contact" id="form_slider_image_4" action="{{ route('seccion.cambiar_imagen_seccion') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="archivo" id="hidden_file_input_4" style="display: none;">
                            <input type="hidden" name="id_imagen" value="{{ $elements[7]->id }}" id="">
                            <div class="carru-modal" style="width: 20rem; height:14rem;" id="clickable_area_4">
                                <p>CAMBIAR IMAGEN</p>
                            </div>
                            <img class="cuadrado" src="{{ asset('img/photos/imagenes_estaticas/' . $elements[7]->imagen) }}" width="480" height="450" alt="">
                        </form><br>
                        <textarea class="editarajax" data-model="Elemento" data-field="texto" data-id="{{$elements[8]->id}}" style="font-size: 25px;" name="" id="" cols="10" rows="8">{{$elements[8]->texto}}</textarea>
                    </div>
                </div>
            </div>

            <div class="centro">
                <div class="quicksand">
                    <textarea class="editarajax" data-model="Elemento" data-field="texto" data-id="{{$elements[9]->id}}" style="font-size:25px;" name="" id="" cols="34" rows="6">{{$elements[9]->texto}}</textarea>
                </div>
            </div>
        </section>
    </div>

    <script>

         $('#hidden_file_input').change(function(e) {
            $('#form_slider_image').submit();
        });

        document.getElementById('clickable_area').addEventListener('click', function() {
            document.getElementById('hidden_file_input').click();
        });

        $('#hidden_file_input_2').change(function(e) {
            $('#form_slider_image_2').submit();
        });

        document.getElementById('clickable_area_2').addEventListener('click', function() {
            document.getElementById('hidden_file_input_2').click();
        });

        $('#hidden_file_input_3').change(function(e) {
            $('#form_slider_image_3').submit();
        });

        document.getElementById('clickable_area_3').addEventListener('click', function() {
            document.getElementById('hidden_file_input_3').click();
        });

        $('#hidden_file_input_4').change(function(e) {
            $('#form_slider_image_4').submit();
        });

        document.getElementById('clickable_area_4').addEventListener('click', function() {
            document.getElementById('hidden_file_input_4').click();
        });
    </script>
@endsection

@section('extraJS')
@endsection
