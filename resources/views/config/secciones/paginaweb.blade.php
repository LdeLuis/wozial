@extends('layouts.admin')

@section('extraCSS')
    
<style>

    body {
        background-color: white;
    }

    input {
        text-align: center;
        font-style: italic;
        font-weight: 300;
        text-decoration: underline;
        text-decoration-thickness: 0.125rem; 
        font-size: 6.25rem; 
        padding-top: 3rem;
    }

    .div-p {
        margin-left: 5rem;
        margin-top: 7rem;
        font-family: "Quicksand", sans-serif;
        font-weight: <weight>;
    }

    .div-p textarea {
        font-size: 1.25rem; 
        padding-left: 1rem;
        width: 30rem;
        white-space: pre-wrap;
    }

    .but-cen {
        text-align: center;
        position: relative;
        z-index: 2;
    }

    .button {
        height: 3.125rem; 
        width: 12.5rem;
        margin-top: 3rem;
        position: relative;
        background-color: transparent;
        cursor: pointer;
        border: 0.125rem solid #252525;
        overflow: hidden;
        border-radius: 1.875rem; 
        color: #333;
        transition: all 0.5s ease-in-out;
    }

    .btn-txt {
        z-index: 1;
        font-weight: 800;
        letter-spacing: 0.25rem; 
    }

    .type1::after {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        transition: all 0.5s ease-in-out;
        background-color: #333;
        border-radius: 1.875rem; 
        visibility: hidden;
        height: 0.625rem; 
        width: 0.625rem; 
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

    .lock_img {
        position: relative;
        right: 4rem;
        z-index: 1;
        width:35rem;
        height:27rem;
    }


</style>

@endsection

@section('content')

    <div class="row mt-5 mb-4 px-2">
        <a href="{{ route('front.admin') }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
    </div>
    <div style="background-color: white">


        <section>
            <input type="text" style="font-size: 6rem; margin: 3rem 0 0 3rem;" class="editarajax" data-model="Catalogo" data-field="nombre" data-id="{{$categoria->id}}" value="• {{$categoria->nombre}}">
            <div class="d-flex flex-lg-row flex-md-column flex-column">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="titlepage">
                        <div class="div-p">
                            <textarea  class="editarajax" data-model="Catalogo" data-field="descripcion" data-id="{{$categoria->id}}" name="" id="" cols="40" rows="15">{{$categoria->descripcion}}</textarea>
                           
                        </div> 
                        <div class="but-cen">
                            <button class="button type1">
                                <span class="btn-txt">COTIZACIÓN</span>
                            </button>
                          </div>
                    </div> 
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                   <div class="about_img"><br><br><br>
                    <form class="img-contact" id="form_slider_image_{{$categoria->id}}" action="{{ route('seccion.cambiar_imagen_seccion_2') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="archivo" id="hidden_file_input_{{$categoria->id}}" style="display: none;">
                        <input type="hidden" name="id_imagen" value="{{$categoria->id}}" id="">
                        <div class="carru-modal" style="width: 25rem; height:20rem;  margin-left:  0;" id="clickable_area_{{$categoria->id}}">
                            <p>CAMBIAR IMAGEN</p>
                        </div>
                        <img class="lock_img" src="{{ asset('img/photos/catalogo/' . $categoria->portada) }}" style="object-fit:contain; width:100%; height:100%" alt="">
                    </form>
                   </div>
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
    </script>
@endsection

@section('extraJS')

    

@endsection

