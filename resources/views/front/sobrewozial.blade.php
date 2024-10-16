@extends('layouts.app')

@section('title', 'sobre wozial')

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

        .par-est{
            margin-left: 10rem;
            margin-right: 10rem;
        }

        .par-est p{
            font-size: 1.4375rem; 
            white-space: pre-wrap;
        }

        .par-est b{
            font-size: 1.4375rem; 
            white-space: pre-wrap;
        }

        .estilop{
            margin-top: 5rem;
            margin-left: 10rem;
            margin-right: 10rem;
        }

        .estilop p{
            font-size: 3.75rem; 
            font-weight: 100;
            white-space: pre-wrap;
        }

        .container {
            display: flex;
            justify-content: space-between; 
            width: 80%; 
            max-width: 75rem; 
        }

        .item {
            text-align: center; 
            margin-left: 50%
            width: 40%; 
            font-size: 3.125rem; 
            margin-top: 1.875rem; 
            margin-bottom: 1.875rem; 
        }

        .div-p{
            padding: 3rem 3rem;
        }

        .div-p p{
            text-align: center;
            font-style: italic;
            font-size: 5.625rem;
            font-weight: 200;
            margin: 2rem 4rem;
            text-decoration: underline;
            text-decoration-thickness: 2px;
            white-space: pre-wrap;
        }
    
        @media (min-width: 992px) {
            
        }       

        @media (min-width: 576px) and (max-width: 992px) {
            .div-p{
                padding: 3rem 2rem;
            }


            .estilop p{
                font-size: 2.75rem; 
            }
           
        }

        @media (max-width: 576px) {
            .div-p{
                padding: 3rem 1rem;
            }

            .div-p p{
                font-size: 2rem;
                margin: 0;
            }

            .par-est{
                margin-left: 2rem;
            }

            .par-est p{
                font-size: 1.4375rem; 
                width: 20rem;
            }

            .par-est b{
                font-size: 1.4375rem; 
                width: 20rem;;
            }

            .estilop{
                margin-left: 2rem;
            }

            .estilop p{
                font-size: 2rem; 
                width: 20rem;
        }
            
        }

   </style>
@endsection

@section('content')
    <section>
        <div class="alin-center">
            <img  src="{{ asset('img/photos/imagenes_estaticas/' . $elements[0]->imagen) }}" width="350" height="130" style="margin-top: 4rem;" alt="Ícono 1">
            <div class="div-p">
                <p>{{$elements[1]->texto}}</p>
            </div>
            <div class="par-est">
                <p>{{$elements[2]->texto}}</p>
            </div>
        </div>
    </section>
    <section>
        <div class="alin-center">
            <div class="estilop">
                <p>{{$elements[3]->texto}}</p>
            </div>
            <div class="d-flex flex-lg-row flex-md-column flex-column justify-content-center align-items-center">
                <div class="d-flex col-lg-4 col-md-4 col-12 justify-content-center">
                    <div class="item">
                        <img class="cuadrado" src="{{ asset("img/design/recursos/wozial/logo_01.png")}}" alt="Ícono 1"> 
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12 justify-content-center">
                    <div class="item">
                        <img class="cuadrado" src="{{ asset("img/design/recursos/wozial/logo_02.png")}}" alt="Ícono 2"> 
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12 justify-content-center">
                    <div class="item">
                        <img class="cuadrado" src="{{ asset("img/design/recursos/wozial/logo_03.png")}}" alt="Ícono 3"> 
                    </div>
                </div>
                
            </div>
        </div>
    </section>
@endsection

@section('scripts')
   
@endsection