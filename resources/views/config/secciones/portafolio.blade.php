@extends('layouts.admin')

@section('extraCSS')
    
<style>
    body{
        background-color: white;
    }

    .alin-center{
        text-align: center;
        position: relative;
        z-index: 2;
    }

    .par-est{
        margin-left: 10rem;
        margin-right: 10rem; 
    
    }

    .par-est p{
        font-size: 26px;
        margin-left: 15rem;
        margin-right: 15rem;
        margin-bottom: 5rem;
        
    }

    .estilop{
        margin-top: 5rem;
        margin-left: 10rem;
        margin-right: 10rem; 
    }
    .estilop p{
        font-size: 60px;
        font-weight: 100;

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
        margin-top: 3rem;
        margin-bottom: 3rem;
    }

    .estile{
        font-size: 80px !important;
        font-weight: 100;
    }

    .cuadro {
        width:330px; 
        height: 370px; 
        border: 2px solid black; 
        border-width:5px;
        padding: 20px;
    }


    .alin-center p{
        font-size: 25px;
        margin-top: 18px;
        text-decoration: underline;
        font-style: italic;
        
    }

    .alin-center i{
        font-size: 23px;
        margin-top: 23px;
        margin-left: 5px;
        margin-right: 5px;
    }

    .f-par{
            text-align: center;
            font-style: italic;
            font-size: 90px;
            font-weight: 200;
            margin: 2rem 4rem;
            text-decoration: underline;
            text-decoration-thickness: 2px;
        }

    .div-p{
        padding: 3rem 3rem;
    }

    .img-contact{
        position: relative;
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
        <section>
            <div class="alin-center">
                <form class="img-contact" id="form_slider_image" action="{{ route('seccion.cambiar_imagen_seccion') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="archivo" id="hidden_file_input" style="display: none;">
                    <input type="hidden" name="id_imagen" value="{{ $elements[0]->id }}" id="">
                    <div class="carru-modal" style="width: 30rem; height:15rem; margin-left: 24rem;" id="clickable_area">
                            <p>CAMBIAR IMAGEN</p>
                    </div>
                    <img src="{{ asset('img/photos/imagenes_estaticas/' . $elements[0]->imagen) }}" style="margin-top: 4rem;" width="350" height="130" alt="">
                </form>
                <div class="div-p">
                    <input class="editarajax" data-model="Elemento" data-field="texto" data-id="{{$elements[1]->id}}" style="font-size: 55px; width:30rem;" type="text" value="{{$elements[1]->texto}}">
                </div>
                <div class="par-est">
                    <textarea class="editarajax" data-model="Elemento" data-field="texto" data-id="{{$elements[2]->id}}" style="font-size:25px;" name="" id="" cols="30" rows="10">{{$elements[2]->texto}}</textarea>
                    
                </div>
            </div>
        </section>
        <section>

            <div class="d-flex flex-lg-12 flex-column text-center" style="padding-top: 6rem;">
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
                            <h5 class="modal-title" id="exampleModalLabel">Nueva ventana</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex col-12 flec-column">
                                    <div class="col-12">
                                        <form action="{{route('seccion.agregar_seccion_2')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                              <label for="file-upload" class="form-label">Seleccionar archivo</label>
                                              <div class="input-group">
                                                <input type="file" name="archivo" class="form-control" id="file-upload">
                                              </div>
                                            </div>
                                            <div class="mb-3">
                                              <label for="section-name" class="form-label">Nombre:</label>
                                              <input type="text" name="nombre" class="form-control" id="section-name">
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






            <div class="col-12 d-flex flex-wrap" style="justify-content:start; ">
                @foreach ($ventana as $v)
                @if ($v->cuenta%2 == 0)
                <div class="col-6 d-flex justify-content-center py-5 ps-3" style="transform:translateY(-4rem)">
                    <div class="form-check form-switch row">
                        <div class="col-12 d-flex align-items-center justify-content-center p-0 m-0 text-center">
                            <input class="form-check-input switch-color-inicio switch-visible fs-3 shadow-none rounded-0" role="switch" id="switch_visible-{{$v->id}}" data-id="{{$v->id}}" data-campo="visible" type="checkbox" @if($v->visible == 1) checked @endif>
                        </div>
                    </div>
                    <script>
                        $('#switch_visible-'+{{$v->id}}).change(function (e){
                            var checkbox = $(this);
                            console.log('switch-'+{{$v->id}});
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
                    <div class="col-8" style="height:25rem; border: solid 2px #000; ">
                        <div class="head col-12 d-flex flex-row" style="height: 20%;">
                            <div class="col-8 border border-dark alin-center" style="height: 100%; padding-top: 1.5rem;">
                                <input type="text" class="editarajax" style="font-size: 1.5rem; width: 10rem" data-model="ventana" data-field="nombre" data-id="{{$v->id}}" value="{{$v->nombre}}">
                            </div>
                            <div class="col-4 border border-dark alin-center" style="height: 100%; background-color:;"> 
                                <form action="{{ route('seccion.destroy', $v->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este registro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="background: none; border: none; color:black;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                
                            </div>
                        </div>
                        <div class="col-12 d-flex" style="height: 80%;">
                            <form class="img-contact" id="form_slider_image_{{$v->id}}" action="{{ route('seccion.cambiar_imagen_seccion_3') }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="archivo" id="hidden_file_input_{{$v->id}}" style="display: none;">
                                <input type="hidden" name="id_imagen" value="{{$v->id}}" id="">
                                <div class="carru-modal" style="width: 25rem; height:20rem;  margin-left:  0;" id="clickable_area_{{$v->id}}">
                                    <p>CAMBIAR IMAGEN</p>
                                </div>
                                <img class="lock_img" src="{{ asset('img/photos/ventana/' . $v->portada) }}" style="object-fit:contain; width:100%; height:100%" alt="">
                            </form>
                        </div>
                    </div>
                </div>
                    
                @else
                    
                        <div class="col-6 d-flex justify-content-center py-5 ps-3" style="transform:translateY(7rem)">
                            <div class="form-check form-switch row">
                                <div class="col-12 d-flex align-items-center justify-content-center p-0 m-0 text-center">
                                    <input class="form-check-input switch-color-inicio switch-visible fs-3 shadow-none rounded-0" role="switch" id="switch_visible-{{$v->id}}" data-id="{{$v->id}}" data-campo="visible" type="checkbox" @if($v->visible == 1) checked @endif>
                                </div>
                            </div>
                            <script>
                                $('#switch_visible-'+{{$v->id}}).change(function (e){
                                    var checkbox = $(this);
                                    console.log('switch-'+{{$v->id}});
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
                            <div class="col-8" style="height:25rem; border: solid 2px #000; ">
                                <div class="head col-12 d-flex flex-row" style="height: 20%;">
                                    <div class="col-8 border border-dark alin-center" style="height: 100%; padding-top: 1.5rem;">
                                        <input type="text" class="editarajax" style="font-size: 1.5rem; width: 10rem" data-model="ventana" data-field="nombre" data-id="{{$v->id}}" value="{{$v->nombre}}">
                                    </div>
                                    <div class="col-4 border border-dark alin-center" style="height: 100%; background-color:;"> 
                                        <form action="{{ route('seccion.destroy', $v->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este registro?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" style="background: none; border: none; color:black;">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-12 d-flex" style="height: 80%;">
                                    <form class="img-contact" id="form_slider_image_{{$v->id}}" action="{{ route('seccion.cambiar_imagen_seccion_3') }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="archivo" id="hidden_file_input_{{$v->id}}" style="display: none;">
                                        <input type="hidden" name="id_imagen" value="{{$v->id}}" id="">
                                        <div class="carru-modal" style="width: 25rem; height:20rem;  margin-left:  0;" id="clickable_area_{{$v->id}}">
                                            <p>CAMBIAR IMAGEN</p>
                                        </div>
                                        <img class="lock_img" src="{{ asset('img/photos/ventana/' . $v->portada) }}" style="object-fit:contain; width:100%; height:100%" alt="">
                                    </form>
                                </div>
                            </div>
                        </div>
                    
                @endif

                        <script>
                            document.getElementById('clickable_area_{{ $v->id }}').addEventListener('click', function() {
                                document.getElementById('hidden_file_input_{{ $v->id }}').click();
                            });
                    
                            document.getElementById('hidden_file_input_{{ $v->id }}').addEventListener('change', function() {
                                document.getElementById('form_slider_image_{{ $v->id }}').submit();
                            });
                        </script>
                @endforeach
                
    
            </div>
            
            <div class="div.p" style="justify-items:center; padding-top:15rem; padding-left:20rem;">
                
                <textarea class="editarajax" data-model="Elemento" data-field="texto" data-id="{{$elements[3]->id}}" style="font-size: 45px; width:40rem; " id="" cols="30" rows="4">{{$elements[3]->texto}}</textarea>
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

        
   </script>

@endsection

@section('extraJS')

    

@endsection