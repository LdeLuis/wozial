@extends('layouts.app')

@section('title', 'Home')

@section('extracss')

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

    .secundario{
        padding: 0;
    }

    .cursiva {
        font-style: italic;
        text-decoration: underline;
        text-decoration-thickness: 0.2rem;
        font-size: 100px;
        font-weight: 300;
        font-family: "Quicksand", sans-serif;
        transition: ease all 0.7s;
        color: black;
    }

    .cursiva:hover {
        transform: translateX(3rem);
        color: blue;
    }

    .lock_img {
        position: absolute;
        top: 6rem;
        right: 4rem;
        z-index: 1;
        width:40rem;
        height:33rem;
    }

    .centro2, .centro {
        text-align: center;
        position: relative;
        z-index: 2;
    }

    .centro3 {
        text-align: center;
        position: relative;
        z-index: 2;
        margin: 5rem;
    }

    .estilo {
        font-family: "Quicksand", sans-serif;
        font-size: 25px !important;
    }

    .estilo p {
        font-size: 1.4rem;
        padding-left: 1rem;
        width: 30rem;
        white-space: pre-wrap;
    }

    .estilo h1 {
        font-style: italic;
        font-size: 4rem;
        margin-top: 6rem;
        margin-bottom: 2rem;
        white-space: pre-wrap;
    }

    .titulox {
        font-family: "Quicksand", sans-serif;
        font-size: 4.2rem;
        font-weight: 300;
        text-decoration: line-through;
        text-decoration-thickness: 0.2rem;
        margin-top: 8rem;
        margin-bottom: 2rem;
    }

    .quicksand {
        font-family: "Quicksand", sans-serif;
    }

    .button {
        height: 4rem;
        width: 13rem;
        position: relative;
        background-color: transparent;
        cursor: pointer;
        border: .0.2rem solid #252525;
        overflow: hidden;
        border-radius: 2rem;
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
        transform: scale(100) translateX(0.125rem); 
    }

    .parrafo {
        margin: 1.25rem; 
        margin-bottom: 5rem;
        margin-top: 5rem;
        font-size: 1.875rem; 
        margin-left: 25%;
        margin-right: 25%;
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

    .imagen-slider {
        width: 100%;
        object-fit: cover; /* Cambié de 100% a cover para un mejor ajuste */
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
        bottom: 0.9375rem; 
        left: 3.4375rem; 
        transform: translateX(-50%);
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .dots li {
        display: inline-block;
        margin: 0 0.3125rem; 
    }

    .dots li.slick-active button {
        background-color: var(--boton-verde);
        border: 1px solid var(--boton-verde);
    }

    .dots button {
        width: 1.125rem; 
        height: 1.125rem; 
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
        width: 18.75rem; 
        height: 18.75rem; 
        animation-name: moverYColor;
        animation-duration: 2s;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
    }

    /* Media Queries */
    @media (min-width: 992px) {
        .imagen-slider {
            height: 52rem;
        }

        .titulo-slider {
            font-size: 3.8rem;
        }

        .parrafo {
            margin-left: 20%;
            margin-right: 20%;
        }

        .cursiva {
            font-size: 8rem; 
        }
    }

    @media (min-width: 576px) and (max-width: 992px) {
        .imagen-slider {
            height: 40rem;
        }

        .titulo-slider {
            font-size: 2.8rem;
        }

        .parrafo {
            margin-left: 10%;
            margin-right: 10%;
        }

        .cursiva {
            font-size: 4rem; 
        }

        .principal {
            padding: 0 10rem 20rem 6rem;
        }

        .button{
            margin-left: 0;
        }


        .lock_img {
            position: relative;
            object-fit: cover;
            width:30rem;
            height:23rem;
            margin-left: 8rem;
        }

        .estilo {
            font-size: 16px !important;
        }

        .estilo p {
            width: 30rem;
        }

        .estilo h1 {
            font-size: 3rem;
            width:40rem;;
        }


        
    }

    @media (max-width: 576px) {
        .imagen-slider {
            height: 32rem;
        }

        .titulo-slider {
            font-size: 1.8rem;
        }

        .parrafo {
            margin-left: 5%;
            margin-right: 5%;
            font-size: 1.5rem; 
        }

        .cursiva {
            font-size: 2rem; }

        .button {
            width: 10rem; 
            height: 3rem; 
        }

        .centro3 {
            text-align: left;
            position: relative;
            z-index: 2;
            margin: 5rem 0 5rem 2rem;
        }

        .lock_img {
            position: relative;
            object-fit: cover;
            width:20rem;
            height:15rem;
            margin-left: 4rem;
        }

        .principal {
            padding: 0 10rem 20rem 2rem;
        }

        .button{
            margin-left:4.5rem;
        }

        .estilo p {
            width: 20rem;
        }

        .estilo h1 {
            font-size: 3rem;
            width: 25rem;;
        }

        .titulox {
            font-size: 3.2rem;
            margin-top: 5rem;
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

    }

</style>

@endsection

@section('content')

    <section class="principal">
        <div class="d-flex flex-lg-row flex-md-column flex-column">
            <div class="col-lg-6 col-md-6 col-12" >
                <div class="titlepage">
                    <div class="estilo">
                        <h1>{{$elements[0]->texto}}</h1>
                        <p>{{$elements[1]->texto}}</p>
                        <br><br>
                    </div>
                    <div class="centro2">
                        <button class="button type1">
                            <span class="btn-txt">COTIZACIÓN</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12" style="height:10rem;">
                <div class="about_img" style="height: 100%; width:100%">
                    <img class="lock_img" src="{{ asset('img/photos/imagenes_estaticas/' . $elements[2]->imagen) }}"  alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="row">
                @foreach ($catalogos as $c)
                    @if ($c->visible == 1)
                        <a class="cursiva" href="{{ route('front.paginaweb',$c->id) }}">• {{$c->nombre}}</a>
                    @endif  
                @endforeach
            </div>
        </div>
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
                    <img class="cuadrado" src="{{ asset('img/photos/imagenes_estaticas/' . $elements[3]->imagen) }}" alt="Ícono 1">
                    <p class="estilo" style="">{{$elements[4]->texto}}</p>
                </div>
                <div class="item">
                    <img class="cuadrado" src="{{ asset('img/photos/imagenes_estaticas/' . $elements[5]->imagen) }}" alt="Ícono 2">
                    <p class="estilo" style="">{{$elements[6]->texto}}</p>
                </div>
                <div class="item">
                    <img class="cuadrado" src="{{ asset('img/photos/imagenes_estaticas/' . $elements[7]->imagen) }}" alt="Ícono 3">
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



@endsection

@section('scripts')

    <script>
        $('.slider-principal').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            appendDots: $('.dots'),
            customPaging: function(slider, i) {
                return '<button></button>';
            }
        });
    </script>

@endsection
