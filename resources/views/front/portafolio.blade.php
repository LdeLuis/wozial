@extends('layouts.app')

@section('title', 'Portafolio')

@section('extracss')
   <style>
        body {
            background-color: white;
        }

        .alin-center {
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .par-est {
            margin-left: 10rem;
            margin-right: 10rem; 
        }

        .par-est p {
            font-size: 1.625rem; 
            margin-left: 15rem;
            margin-right: 15rem;
            margin-bottom: 5rem;
            white-space: pre-wrap;
            text-decoration: underline;
        }

        .estilop {
            margin-top: 5rem;
            margin-left: 10rem;
            margin-right: 10rem; 
        }

        .estilop p {
            font-size: 3.75rem; 
            font-weight: 100;
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
            margin-top: 3rem;
            margin-bottom: 3rem;
        }

        .estile {
            font-size: 5rem !important; 
            font-weight: 100;
            white-space: pre-wrap;
        }

        .cuadro {
            width: 20.625rem; 
            height: 23.125rem; 
            border: 2px solid black;
            border-width: 0.3125rem; 
            padding: 1.25rem; 
        }

        .alin-center p {
            font-size: 1.5625rem; 
            margin-top: 1.125rem;
            font-style: italic;
        }

        .alin-center i {
            font-size: 1.4375rem; 
            margin-top: 1.4375rem; 
            margin-left: 0.3125rem; 
            margin-right: 0.3125rem; 
        }

        .f-par {
            text-align: center;
            font-style: italic;
            font-size: 5.625rem; 
            font-weight: 200;
            margin: 2rem 4rem;
            text-decoration: underline;
            text-decoration-thickness: 0.125rem; 
            white-space: pre-wrap;
        }

        .div-p {
            padding: 3rem 3rem;
        }
        
        .movery{
            transform:translateY(7rem)
        }


        @media (min-width: 992px) {
            
        }       

        @media (min-width: 576px) and (max-width: 992px) {
            
            .par-est p {
                margin-left: 1.5rem;
                width: 25rem;
            }
        }

        @media (max-width: 576px) {
            
            .alin-center {
                text-align: center;
                position: relative;
                z-index: 2;
            }

            .par-est {
                margin-left: 2rem;
            }

            .par-est p {
                margin-left: 1rem;
                font-size: 1.4rem;
                width: 19rem;
            }

            .div-p {
                padding: 3rem 3rem 3rem 2rem;
            }

            .div-p p {
                font-size: 3rem !important;
            }

            .estile {
                font-size: 2rem !important; 
            }

            .col-12 {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }

            .head p {
                font-size: 1rem;
            }

            .head i {
                font-size: 0.8rem;
            }

            .item {
                width: 100% !important;
                font-size: 1.5rem;
                margin-bottom: 2rem;
            }

            .cuadro {
                width: 90% !important;
                height: 18rem !important;
                padding: 1rem !important;
            }


            .f-par {
                font-size: 2rem !important;
                margin: 1rem 1rem !important;
            }

            .alin-center i {
                font-size: 1rem !important;
            }

            .container {
                flex-direction: column;
            }

            .movery{
                transform:translateY(0rem)
            }

        }


   </style>
@endsection

@section('content')
    <section>
        <div class="alin-center">
            <img class="cuadrado" src="{{ asset('img/photos/imagenes_estaticas/' . $elements[0]->imagen) }}" style="margin-top: 4rem;" width="350" height="130" alt="Ícono 1">
            <div class="div-p">
                <p class="estile">{{$elements[1]->texto}}</p>
            </div>
            <div class="par-est">
                <p>{{$elements[2]->texto}}</p>
            </div>
        </div>
    </section>
    <section>
        <div class="col-12 d-flex flex-wrap justify-content-center justify-content-md-start">
            @foreach ($ventana as $v)
                @if ($v->cuenta%2 == 0)
                    <div class="col-12 col-md-6 d-flex justify-content-end justify-content-md-end py-3 py-md-5 pe-md-3">
                        <div class="col-10 col-md-8" style="height: 20rem; border: solid 2px #000;">
                            <div class="head col-12 d-flex flex-row" style="height: 20%;">
                                <div class="col-8 border border-dark alin-center" style="height: 100%;">
                                    <p data-model="ventana" data-field="nombre" data-id="{{$v->id}}">{{$v->nombre}}</p>
                                </div>
                                <div class="col-4 border border-dark alin-center" style="height: 100%;">
                                    <i class="fa-solid fa-window-minimize"></i>
                                    <i class="fa-regular fa-square"></i>
                                    <i class="fa-solid fa-xmark"></i>
                                </div>
                            </div>
                            <div class="col-12 d-flex" style="height: 80%;">
                                <img class="lock_img" src="{{ asset('img/photos/ventana/' . $v->portada) }}" style="object-fit:contain; width:100%; height:100%" alt="">
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-12 col-md-6 d-flex justify-content-start justify-content-md-start py-3 py-md-5 ps-md-3 movery" style="">
                        <div class="col-10 col-md-8" style="height: 20rem; border: solid 2px #000;">
                            <div class="head col-12 d-flex flex-row" style="height: 20%;">
                                <div class="col-8 border border-dark alin-center" style="height: 100%;">
                                    <p data-model="ventana" data-field="nombre" data-id="{{$v->id}}">{{$v->nombre}}</p>
                                </div>
                                <div class="col-4 border border-dark alin-center" style="height: 100%;">
                                    <i class="fa-solid fa-window-minimize"></i>
                                    <i class="fa-regular fa-square"></i>
                                    <i class="fa-solid fa-xmark"></i>
                                </div>
                            </div>
                            <div class="col-12 d-flex" style="height: 80%;">
                                <img class="lock_img" src="{{ asset('img/photos/ventana/' . $v->portada) }}" style="object-fit:contain; width:100%; height:100%" alt="">
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="div.p">
            <p class="f-par" style="padding-top: 6rem">{{$elements[3]->texto}}</p>
        </div>
    </section>
    
@endsection

@section('scripts')
   
@endsection