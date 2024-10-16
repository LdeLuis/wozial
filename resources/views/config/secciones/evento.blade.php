@extends('layouts.admin')

@section('extraCSS')
    
<style>

    body {
        background-color: white;
        
    }
    .principal{
        padding-left: 6rem;
        padding-right: 6rem;
        
    }

    h1 {
        text-align: center; 
        font-style: italic;
        font-weight: 300;
        text-decoration: underline;
        text-decoration-thickness: 2px;
        font-size: 80px;
        padding-top: 3rem;
    }
    h2 {
        text-align: center; 
        font-style: italic;
        font-size: 60px;
        padding-top: 3rem;
        margin-bottom: 2rem;
    }

    .div-p {
        margin-left: 5rem;
        margin-top: 0;
        font-family: "Quicksand", sans-serif;
        font-weight: <weight>;
        
    }

    .div-p p {
        font-size: 20px;
        padding-left: 1rem;
        width: 30rem;
        text-align: justify;
    }

    .lock_img {
        position: relative;
        z-index: 1;
        width:20rem;
        height:20rem;
        margin-left: 3rem;
    }


    .but-cen {
        text-align: center; 
        position: relative;
        z-index: 2;
    }

    .button {
    height: 50px;
    width: 200px;
    margin-top: 3rem;
    margin-left: 7rem !important;
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

    section {
        padding-bottom: 3rem;
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
        <a href="{{ route('front.admin') }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
    </div>
    <div style="background-color: #fff">
        <section class="principal">
            <h1>¡No te lo pierdas!</h1>

            <div class="d-flex flex-lg-12 flex-column text-center mt-5">
                <div class="col-lg-12 mb-5">
                    <h4>Agregar evento</h4>
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
                                            <form action="{{route('seccion.agregar_seccion_3')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                <label for="file-upload" class="form-label">Seleccionar archivo</label>
                                                <div class="input-group">
                                                    <input type="file" name="archivo" class="form-control" id="file-upload">
                                                </div>
                                                </div>
                                                <div class="mb-3">
                                                <label for="section-name" class="form-label">Titulo del evento:</label>
                                                <input type="text" name="titulo" class="form-control" id="section-titulo">
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
                    @foreach ($evento as $e)
                    <div class="col-12" style="padding-bottom: 5rem;">
                        <div class="d-flex flex-row justify-content-center alin-items-center">
                            <div class="col-1" style="margin-top: 15rem;">
                                <div class="form-check form-switch row">
                                    <div class="col-12 d-flex align-items-center justify-content-center p-0 m-0 text-center">
                                        <input class="form-check-input switch-color-inicio switch-visible fs-3 shadow-none rounded-0" role="switch" id="switch_visible_3-{{$e->id}}" data-id="{{$e->id}}" data-campo="visible" type="checkbox" @if($e->visible == 1) checked @endif>
                                    </div>
                                </div>
                                <script>
                                        $('#switch_visible_3-'+{{$e->id}}).change(function (e){
                                            var checkbox = $(this);
                                            console.log('switch-'+{{$e->id}});
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
                                            var URL = "{{ route('ajax.switch_visible_3') }}";
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
                            <div class="col-10 d-flex flex-row">
                                <div class="col-6">
                                    <div class="titlepage">
                                        <div class="div-p">
                                            <textarea class="editarajax" data-model="Evento" data-field="titulo" data-id="{{$e->id}}" name=" " id="" cols="40" rows="5">{{$e->titulo}}</textarea>
                
                                            <textarea class="editarajax" data-model="Evento" data-field="descripcion" data-id="{{$e->id}}" name="" id="" cols="40" rows="20">{{$e->descripcion}}</textarea>
                                        
                                        </div> 
                                        <div class="but-cen">
                                            <button class="button type1">
                                                <span class="btn-txt">MÁS INFO</span>
                                            </button>
                                          </div>
                                    </div> 
                                </div>
                                <div class="col-6" style="">
                                   <div class="about_img"><br><br><br>
                                        <form class="img-contact" style="position: relative" id="form_slider_image_{{$e->id}}" action="{{ route('seccion.cambiar_imagen_seccion_4') }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" name="archivo" id="hidden_file_input_{{$e->id}}" style="display: none;">
                                            <input type="hidden" name="id_imagen" value="{{$e->id}}" id="">
                                            <div class="carru-modal" style="width:20rem; height:20rem; margin-left:3rem;" id="clickable_area_{{$e->id}}">
                                                <p>CAMBIAR IMAGEN</p>
                                            </div>
                                            <img class="lock_img" src="{{ asset('img/photos/evento/' . $e->portada) }}" style="object-fit:contain; " alt="">
                                        </form>
                                   </div>
                                </div>
                            </div>
                            <div class="col-1" style="margin-top: 15rem;">
                                <form action="{{ route('evento.destroy', $e->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este evento?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="background: red; border: none; color:white;">
                                        <i class="fas fa-trash" style="font-size: 3rem;"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                        document.getElementById('clickable_area_{{ $e->id }}').addEventListener('click', function() {
                            document.getElementById('hidden_file_input_{{ $e->id }}').click();
                        });
                
                        document.getElementById('hidden_file_input_{{ $e->id }}').addEventListener('change', function() {
                            document.getElementById('form_slider_image_{{ $e->id }}').submit();
                        });
                    </script>
                    @endforeach
                </div>
            </div>
            
        </section>
    </div>
    

@endsection

@section('extraJS')

    

@endsection