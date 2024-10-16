@extends('layouts.app')

@section('title', 'Eventos')

@section('extracss')
   <style>
        body {
            background-color: white;
        }

        .principal {
            padding-left: 3.75rem; 
            padding-right: 3.75rem; 
        }

        h1 {
            text-align: center; 
            font-style: italic;
            font-weight: 300;
            text-decoration: underline;
            text-decoration-thickness: 0.125rem; 
            font-size: 5rem; 
            padding-top: 1.875rem; 
        }

        h2 {
            text-align: center; 
            font-style: italic;
            font-size: 3.75rem; 
            padding-top: 1.875rem;
            margin-bottom: 1.25rem; 
            
        }

        .div-p {
            margin-left: 8rem; 
            margin-top: 4.375rem;
            white-space: pre-wrap;
            font-family: "Quicksand", sans-serif;
            font-weight: <weight>;

        }

        .div-p p {
            font-size: 1.25rem; 
            padding-left: 4rem; 
            width: 30rem; 
            text-align: justify;
        }

        .but-cen {
            text-align: center; 
            position: relative;
            z-index: 2;
        }

        .button {
            height: 3.125rem; 
            width: 12.5rem; 
            margin-top: 1.875rem; 
            margin-left: 8rem;
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
            transform: scale(100) translateX(0.125rem);
        }

        section {
            padding-bottom: 1.875rem; 
        }

        .lock-img {
            position: relative;
            z-index: 1;
            width:25rem;
            height:25rem;
            margin-left: 5rem;
            margin-top: 10rem;
        }


        @media (min-width: 992px) {
            
        }       

        @media (min-width: 576px) and (max-width: 992px) {
            
            .principal {
                padding-left: 1rem; 
                padding-right: 1rem; 
            }

            h1 {
                font-size: 4.5rem; 
            }

            h2 {
                font-size: 2.75rem;
                width: 30rem;
                
            }

            .div-p {
                margin-left: 6rem; 
            }

            .div-p p {
                padding-left: 3rem; 
                width: 30rem; 
            }

            .button {
                margin-left: 16rem;
            }

            .lock-img {
                width:27rem;
                height:27rem;
                margin-left: 9rem;
                margin-top: 10rem;
            }
           
        }

        @media (max-width: 576px) {
            .principal {
                padding-left: 0; 
                padding-right: 1rem; 
            }

            h1 {
                font-size: 2.5rem; 
            }

            h2 {
                font-size: 1.75rem;
                width:20rem;
                
            }

            .div-p {
                margin-left: 2rem; 
            }

            .div-p p {
                padding-left: 1rem; 
                width: 19.5rem; 
            }

            .button {
                margin-left: 1rem;
            }

            .lock-img {
                width:20rem;
                height:20rem;
                margin-left: 2rem;
            }

        }

   </style>
@endsection

@section('content')
    <section class="principal">
        <h1>¡No te lo pierdas!</h1>
        @foreach ($evento as $e)
                <div class="d-flex flex-lg-row flex-md-column flex-column">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="titlepage">
                            <div class="div-p">
                                <h2 data-model="evento" data-field="titulo" data-id="{{$e->id}}">{{$e->titulo}}</h2>
                                <p data-model="evento" data-field="descripcion" data-id="{{$e->id}}">{{$e->descripcion}}</p>
                            </div> 
                            <div class="but-cen">
                                <button class="button type1">
                                    <span class="btn-txt">MÁS INFO</span>
                                </button>
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-img">
                        <img class="lock-img" src="{{ asset('img/photos/evento/' . $e->portada) }}"  alt="">
                    </div>
                    </div>
            </div>
        @endforeach
        
    </section>
  
@endsection

@section('scripts')
   
@endsection