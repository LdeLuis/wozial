@extends('layouts.admin')

@section('extraCSS')
    
<style>

    body {
        background-color: white;
        
    }

    h1 { 
        font-style: italic;
        text-decoration: underline;
        text-decoration-thickness: 2px;
        font-size: 60px;
    }

    .div-p {
        margin-left: 5rem;
        font-family: "Quicksand", sans-serif;
        font-weight: <weight>;
        
    }

    .div-p p {
        font-size: 20px;
        padding-left: 1rem;
        padding-top: 2rem;
        width: 30rem;
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

    .alin-text {
        text-align: center; 
        position: relative;
        z-index: 2;
    }

    .tipo-letra{
        font-family: "Quicksand", sans-serif;
        font-weight: <weight>;
        font-size: 80px;
        font-weight: 300;
        text-decoration: line-through;
        text-decoration-thickness: 4px;
        margin-top: 4rem;
        margin-bottom: 2rem;

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

    .contenedor {
        display: flex;
        justify-content: space-between; 
        width: 80%; 
        max-width: 1200px; 
    }

    .item {
        margin-left: 7rem;
        text-align: center; 
        width: 30%; 
        font-size: 50px; 
    }

    .item img {
        width: 80px; 
        height: 80px; 
    }
    
    .item p {
        font-weight: bold; 
        margin: 40px;
        margin-left: 4rem;
        font-size: 20px;
        width: 180px;

    }

    .estilo {
        font-family: "Quicksand", sans-serif;
        font-weight: <weight>;
        
    }

    .estilo p {
        font-size: 40px;
        padding-left: 1rem;
        width: 30rem;
    } 

    .quicksand {
        font-family: "Quicksand", sans-serif;
        font-weight: <weight>;
    }

    .parrafo{
        margin: 20px;
        margin-bottom: 5rem;
        margin-top: 5rem;
        font-size: 30px;
        margin-left: 25%;
        margin-right: 25%;
    } 

    .espacio {
        margin-bottom: 4rem;
        margin-top: 4rem;
    }

    .serb-mens {
        padding-left: 20rem;
        font-family: "Roboto Condensed", sans-serif;
        font-weight: <weight>;
        
    }

    .serb-mens p {
        font-style: italic;
        font-size:30px;
    }

    .serb-mens b {
        font-style: italic;
        font-size:30px;
    }
    
    i {
        margin-top: 4rem;
        font-size: 40px;

    }


</style>

@endsection

@section('content')

    <div class="row mt-5 mb-4 px-2">
        <a href="{{ route('front.admin') }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i>Regresar</a>
    </div>
    <div style="background-color: #fff">
        <section>
            <div class="row">
                <div class="col-md-6">
                    <div class="titlepage">
                        <div class="div-p">
                            <input class="editarajax" data-model="Elemento" data-field="texto" data-id="{{$elements[0]->id}}" style="font-size:35px;" type="text" value="{{$elements[0]->texto}}">
                            <textarea class="editarajax" data-model="Elemento" data-field="texto" data-id="{{$elements[1]->id}}" name="" style="font-size: 25px; width:30rem;" id="" cols="30" rows="20">{{$elements[1]->texto}}</textarea>
                            <p>
                                
                            </p>
                        </div> 
                        <div class="but-cen">
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
                            <div class="carru-modal" style="width: 30rem; height:35rem; margin-top:20rem;" id="clickable_area">
                                <p>CAMBIAR IMAGEN</p>
                            </div>
                            <img src="{{ asset('img/photos/imagenes_estaticas/' . $elements[2]->imagen) }}" width="600" height="700" alt="">
                        </form>
                        
                   </div>
                </div>
            </div>
        </section>
    
        <section>
            <div class="alin-text">   
                <p class="tipo-letra">Sabemos que...</p>
            </div>
            <div class="alin-text">
                <div class="contenedor">
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
            <div class="alin-text">
                <div class="quicksand">

                    <textarea class="editarajax" data-model="Elemento" data-field="texto" data-id="{{$elements[9]->id}}" style="font-size: 45px;" name="" id="" cols="30" rows="5">{{$elements[9]->texto}}</textarea>
                    
                </div>
            </div>
            
        </section>
    
        <section>
            <div class="alin-text">
                <div class="espacio">
                    <input class="editarajax" data-model="Elemento" data-field="texto" data-id="{{$elements[10]->id}}" type="text" style="font-size: 25px; width:40rem;" value="{{$elements[10]->texto}}">
                </div>
            </div>
            <div class="serb-mens">
                <textarea class="editarajax" data-model="Elemento" data-field="texto" data-id="{{$elements[11]->id}}" style="font-size: 30px; width: 45rem;" name="" id="" cols="30" rows="10">{{$elements[11]->texto}}</textarea>

                
              
            </div>
            <div class="alin-text">
                <div class="">
                    <i class="fa-brands fa-whatsapp"></i>
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <img class="" src="{{ asset("img/design/recursos/home/adwords.png")}}" width="40" height="40" style="margin-top: -20px;" alt="">
                    <i class="fa-brands fa-tiktok"></i>
                    <i class="fa-brands fa-google"></i>
                </div>
            </div>
            <div class="alin-text">
                <button class="button type1">
                    <span class="btn-txt">COTIZACIÓN</span>
                </button>
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