@extends('layouts.app')

@section('title', 'Pagina web')

@section('extracss')
   <style>

        body {
            background-color: white;
            
        }

        h1 {
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

        .div-p p {
            font-size: 1.25rem; 
            padding-left: 1rem;
            width: 30rem;
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
            margin-bottom: 6rem;
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
            position: absolute;
            top: 18rem;
            right: 4rem;
            z-index: 1;
            width:40rem;
            height:33rem;
        }


        @media (min-width: 992px) {
            
        }       

        @media (min-width: 576px) and (max-width: 992px) {
            
           
            h1 {
                font-size: 4rem; 
            }
            .div-p {
                margin-left: 8rem;
                text-align: center;
            }
            .button {
                margin-left: 17rem;
            }

            .lock_img {
                position: relative;
                top: 3rem;
                width:40rem;
                height:33rem;
                margin-left: 50%;
            }
        }

        @media (max-width: 576px) {
            
            h1 {
                font-size: 2.9rem; 
            }
            .div-p {
                margin-left: 1rem;
                text-align: center;
            }

            .div-p p {
                font-size: 1.25rem;
                width: 20rem; 
            }

            .lock_img {
                position: relative;
                top: 3rem;
                width:20rem;
                height:13rem;
                margin-left: 25%;
            }
        }

   </style>
@endsection

@section('content')
    <section>
        <h1 data-model="Catalogo" data-field="nombre" data-id="{{$categoria->id}}">• {{$categoria->nombre}}</h1>
        <div class="d-flex flex-lg-row flex-md-column flex-column">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="titlepage">
                    <div class="div-p">
                        <p data-model="Catalogo" data-field="descripcion" data-id="{{$categoria->id}}">{{$categoria->descripcion}}</p>
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
                    <img class="lock_img" src="{{ asset('img/photos/catalogo/' . $categoria->portada) }}"alt="">
               </div>
            </div>
        </div>
    </section>
  
@endsection

@section('scripts')
   
@endsection