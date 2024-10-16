@extends('layouts.app')

@section('title', 'Marketing')

@section('extracss')
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
            white-space: pre-wrap;
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

        .acomodar{
            text-align: center; 
        }

        .quicksand {
            font-family: "Quicksand", sans-serif;
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

        .titulox {
            font-family: "Quicksand", sans-serif;
            font-size: 4.2rem;
            font-weight: 300;
            text-decoration: line-through;
            text-decoration-thickness: 0.2rem;
            text-align: center;
            margin-top: 8rem;
            margin-bottom: 2rem;
        }

        .container {
            display: flex;
            justify-content: space-between;
            width: 80%;
            max-width: 75rem; 
        }

        .item {
            text-align: center;
            width: 40%;
            font-size: 3.125rem; 
        }

        .item img {
            width: 3.75rem; 
            height: 3.75rem; 
        }

        .item p {
            font-weight: bold;
            margin: 2.5rem; 
        }

        .centro, .centro2 {
                text-align: center;
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

        .imagen-slider {
            width: 100%;
            object-fit: cover; /* Cambié de 100% a cover para un mejor ajuste */
        }

        .titulo-slider {
            font-size: 3.8rem;
            font-weight: 300;
            line-height: 1.2;
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
            white-space: pre-wrap;
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
            white-space: pre-wrap;
        }

        .serb-mens b {
            font-style: italic;
            font-size:30px;
            white-space: pre-wrap;
        }
        
        i {
            margin-top: 4rem;
            font-size: 40px;

        }

        .lock-img {
            position: relative;
            z-index: 1;
            width:30rem;
            height:40rem;
            margin-left: 5rem;
            margin-top: 2rem;
        }

        @media (min-width: 992px) {
            
        }       

        @media (min-width: 576px) and (max-width: 992px) {
            .div-p {
                margin-left: 0;
                
            }

            .acomodar{
                text-align: left; 
            }

            .div-p p {
                padding-left: 10rem;
                width: 40rem;
                text-align: center;
            }

            h1 { 
                text-align: center;
                font-size: 60px;
                width: 50rem;
            }

            .button {
                margin-left: 18.5rem;
            }

            .lock-img {
                margin-left: 9rem;
            }

            .serb-mens {
                padding-left:4rem;
                
            }

            .serb-mens p {
                font-size:29px;
            }

            .serb-mens b {
                font-size:29px;
            }

           
        }

        @media (max-width: 576px) {
            .div-p {
                margin-left: 2rem;
                
            }

            .div-p p {
                padding-left: 0;
                width: 20rem;
                text-align: center;
            }

            h1 { 
                text-align: left;
                font-size: 40px;
                width: 50rem;
            }

            .button {
                margin-left: 0;
            }

            .lock-img {
                width:20rem;
                height:30rem;
                margin-left: 1.5rem;
            }

                
            .container {
                flex-direction: column; 
                align-items: center;
                width: 100%; 
            }

            .item {
                width: 80%; 
                margin-bottom: 2rem; 
            }

            .item img {
                width: 6rem; 
                height: 6rem; 
            }

            .item p {
                font-size: 1.5rem; 
            }

            .centro, .centro2 {
                text-align: center;
                padding: 1rem; 
            }

            .quicksand {
                padding: 1rem; 
            }

            .parrafo {
                margin-left: 5%;
                margin-right: 5%;
                font-size: 1.5rem; 
            }

            .titulox {
                font-size: 3rem;
            }

            .serb-mens {
                padding-left:1rem;
                
            }

            .serb-mens p {
                font-size:29px;
            }

            .serb-mens b {
                font-size:29px;
            }
           
           

        }

   </style>
@endsection

@section('content')
    <section>
        <div class="d-flex flex-lg-row flex-md-column flex-column">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="titlepage">
                    <div class="div-p">
                        <h1>{{$elements[0]->texto}}</h1>
                        <p>{{$elements[1]->texto}}</p>
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
                <img class="lock-img" src="{{ asset('img/photos/imagenes_estaticas/' . $elements[2]->imagen) }}" alt="Ícono 1">
               </div>
            </div>
        </div>
    </section>

    <section>
        <div class="centro">
            <p class="titulox">Sabemos que...</p>
        </div>
        <div class="centro">
            <div class="container">
                <div class="item">
                    <img class="cuadrado" src="{{ asset('img/photos/imagenes_estaticas/' . $elements[3]->imagen) }}" alt="Ícono 1">
                    <p class="estilo" style="">{{$elements[4]->texto}}</p>
                </div>
                <div class="item">
                    <img class="cuadrado" src="{{ asset('img/photos/imagenes_estaticas/' . $elements[5]->imagen) }}" alt="Ícono 1">
                    <p class="estilo" style="">{{$elements[6]->texto}}</p>
                </div>
                <div class="item">
                    <img class="cuadrado" src="{{ asset('img/photos/imagenes_estaticas/' . $elements[7]->imagen) }}" alt="Ícono 1">
                    <p class="estilo" style="">{{$elements[8]->texto}}</p>
                </div>
            </div>
        </div>
        </div>

        <div class="centro">
            <div class="quicksand">
                <p class="parrafo">{{$elements[9]->texto}}</p>
            </div>
        </div>
    </section>

    <section>
        <div class="alin-text">
            <div class="espacio">
                <p style="font-size: 22px; white-space: pre-wrap;"><b style="font-size: 22px;">{{$elements[10]->texto}}</b></p>
            </div>
        </div>
        <div class="serb-mens">
            <p><b>{{$elements[11]->texto}}</b></p>
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
        <div class="acomodar">
            <button class="button type1">
                <span class="btn-txt">COTIZACIÓN</span>
            </button>
        </div>
    </section>
  
@endsection

@section('scripts')
   
@endsection