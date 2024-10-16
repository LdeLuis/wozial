@extends('layouts.app')

@section('title', 'web administrable')

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
        text-decoration-thickness: 2px;
        font-size: 100px;
        padding-top: 3rem;
    }

    .div-p {
        margin-left: 5rem;
        margin-top: 7rem;
        font-family: "Quicksand", sans-serif;
        font-weight: <weight>;
        
    }

    .div-p p {
        font-size: 20px;
        padding-left: 1rem;
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
                margin-left: 20%;
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
    <h1>• Web administrable</h1>
    <div class="d-flex flex-lg-row flex-md-column flex-column">
        <div class="col-lg-6 col-md-6 col-12">
            <div class="titlepage">
                <div class="div-p">
                    <p>
                        ¡Las maravillas de tener una Página web + su control total!
                    </p>
                    <p>
                        Wozial desarollará la estructura ideal para que tu Página comunique, genere confianza y por sobre todas las cosas prospecte por ti…
                    </p>  
                    <p>
                        Sumando la experiencia de tener el control total de tu sitio! ¿Requieres un cambio? Tendrás la capacidad de hacerlo de forma inmediata sin la necesidad de contactar a un programador..
                    </p>
                    <p>
                        Tu Página administrable incluye un gestor de contenidos, donde practicamente podrás modificar la información, imágenes y otros elementos.
                    </p>
                    <p>
                        Disponible des $36,800  
                    </p>
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
              <img class="lock_img" src="{{ asset("img/design/recursos/home/weba.png")}}"  alt="">
           </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')

@endsection