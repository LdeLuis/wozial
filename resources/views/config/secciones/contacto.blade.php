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


    .estilo {
        padding-top: 6rem;
        font-family: "Quicksand", sans-serif;
        font-weight: <weight>;
    }

    .estilo h1{
        font-size: 73px;
        font-weight: 200;
        margin-bottom: 4rem;
        font-style: italic;
        text-decoration: underline;
        text-decoration-thickness: 2px;
    }

    .estilo p{
        font-size: 25px;
        margin-left: 28rem;
        margin-right: 28rem;
        

    }

    .estilo b{
        font-size: 20px;    
    }

    .espacio{
        margin-top: 3rem;
        margin-left: 13rem;
    }
    
    .custom-font-contacto{
        font-family: 'Poppins', sans-serif;
        font-weight: 300;
        text-decoration: underline;
        font-style: italic;
        background: transparent !important;
        font-size: 34px;
        border: none !important;
    
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


</style>

@endsection

@section('content')

    <div class="row mt-5 mb-4 px-2">
        <a href="{{ route('front.admin') }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
    </div>
    <div style="background-color: white">
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
                <div class="estilo">
                    <input class="editarajax" data-model="Elemento" data-field="texto" data-id="{{$elements[1]->id}}" type="text" style="font-size:45px; width:40rem;" value="{{$elements[1]->texto}}"><br><br>
                    <textarea class="editarajax" data-model="Elemento" data-field="texto" data-id="{{$elements[2]->id}}" name="" id="" style="font-size: 20px;" cols="50" rows="8">{{$elements[2]->texto}}</textarea>
                    
                    <div style="font-size: 20px;">Encuentranos en: Avenida Lapizlazuli 2074 int. 3</div>
                    <div style="font-size: 20px;">
                        contacto@wozial.com / 
                        <a href="mailto:sonrie@wozial.com" style="font-size: 20px;">sonrie@wozial.com </a>
                    </div>
                    <div style="font-size: 20px;">Whatsapp: 3338096501</div>
                    <div style="margin-top:3rem;">
                        <i class="fab fa-whatsapp contact-icon"></i>
                        <i class="fab fa-facebook contact-icon"></i>
                        <i class="fab fa-instagram contact-icon"></i>
                    </div>
                </div>
            </div>
            <div  class="espacio">
                
                <div class="col-10 d-flex flex-wrap" style=" justify-content:center;">
                    <form action="formularioContac" method="POST">
                        <div class="col-10 col-md-10 col-lg-12 d-flex flex-wrap justify-content-start" style="padding-top: 60px">
                            <div class="col-12 col-md-4 col-lg-4 d-flex justify-content-start" style="padding-right: ; ">
                                <input type="text" class=" custom-font-contacto text-center" style="outline: none;" name="nombre" placeholder="TU NOMBRE :" aria-label="nombre">
                            </div>
                            <div class="col-12 col-md-4 col-lg-4 d-flex justify-content-start">
                                <input type="text" class=" custom-font-contacto text-center" style="outline: none;" name="whatsapp" placeholder="WHATSAPP :" aria-label="whatsapp">
                            </div>
                            <div class="col-12 col-md-4 col-lg-4 d-flex justify-content-start" style="padding-left: ">
                                <input type="text" class=" custom-font-contacto text-center" style="outline: none;" name="mensaje" placeholder="MENSAJE :" aria-label="mensaje">
                            </div>    
                        </div>
                        <div class="justify-content-center d-flex">
                            <button class="button type1">
                                <span class="btn-txt">ENVIAR</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="alin-center">
                <div class="estilo" style="margin-top: 4rem;">
                    <input class="editarajax" data-model="Elemento" data-field="texto" data-id="{{$elements[3]->id}}" type="text" style="font-size: 50px;" value="{{$elements[3]->texto}}">
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

