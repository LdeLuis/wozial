@extends('layouts.app')

@section('title', 'Contacto')

@section('extracss')
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
        white-space: pre-wrap;
    }

    .estilo p{
        font-size: 25px;
        margin-left: 28rem;
        margin-right: 28rem;
        white-space: pre-wrap;

    }

    .estilo b{
        font-size: 20px;   
        white-space: pre-wrap; 
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

        @media (min-width: 992px) {

            
        }

        @media (min-width: 576px) and (max-width: 992px) {
            .estilo h1{
                font-size: 5rem;
                font-weight: 200;
            }

            .estilo p{
                font-size: 25px;
                margin-left: 2rem;
                margin-right: 2rem;

            }

            .espacio{
                margin-top: 3rem;
                
                margin-left: 8rem;
            }

            .esp-input{
                margin-left: 4.5rem;
            }
        }

        @media (max-width: 576px) {
            .estilo h1{
                font-size: 2rem;
                font-weight: 200;
            }

            .estilo p{
                font-size: 1.5rem;
                margin-left: 1rem;
                margin-right: 1rem;

            }

            .espacio{
                margin-top: 3rem;
                margin-left: 2rem;
            }
        }


</style>

@endsection

@section('content')

<section>
    <div class="alin-center">
        <img class="cuadrado" src="{{ asset('img/photos/imagenes_estaticas/' . $elements[0]->imagen) }}"  style="margin-top: 4rem;" width="350" height="130" alt="Ícono 1">
        <div class="estilo">
            <h1>{{$elements[1]->texto}}</h1>
            <p>{{$elements[2]->texto}}</p><br>
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
                <div class="esp-input col-10 col-md-10 col-lg-12 d-flex flex-wrap justify-content-start" style="padding-top: 60px">
                    <div class="col-12  col-lg-4 d-flex justify-content-start " style="padding-right: ; ">
                        <input type="text" class=" custom-font-contacto text-center" style="outline: none;" name="nombre" placeholder="TU NOMBRE :" aria-label="nombre">
                    </div>
                    <div class="col-12  col-lg-4 d-flex justify-content-start">
                        <input type="text" class=" custom-font-contacto text-center" style="outline: none;" name="whatsapp" placeholder="WHATSAPP :" aria-label="whatsapp">
                    </div>
                    <div class="col-12 col-lg-4 d-flex justify-content-start" style="padding-left: ">
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
            <h1>{{$elements[3]->texto}}</h1>
        </div>
    </div>
    

</section>

@endsection

@section('scripts')

@endsection