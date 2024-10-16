@extends('layouts.app')

@section('title', 'tienda en linea')

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
                position: relative;
                top: 3rem;
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
                margin-left: 25%;
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
                height:15rem;
                margin-left: 12.5%;
            }
        }

</style>
@endsection

@section('content')
<section>
    <h1>• Tienda en línea</h1>
    <div class="d-flex flex-lg-row flex-md-column flex-column">
        <div class="col-lg-6 col-md-6 col-12">
            <div class="titlepage">
                <div class="div-p">
                    <p>
                        ¡Yea! Estas apunto de dar el paso y lo mejor de mano de los expertos…
                    </p>
                    <p>
                        Más de 13 años desarrollando y estudiando el comportamiendo  de las tiendas en línea.
                    </p>  
                    <p>
                        No solo es una Página ¡Es tu centro de negocios!
                    </p>
                    <p>
                        Desarrollamos un sitio 100% intuitivo tanto para el usuario como para el administrador.
                    </p>
                    <p>
                        Tendrás acceso a un panel donde podrás actualizar de forma inmediata TODA LA INFORMACIÓN del sitio y de tus productos. 
                    </p>
                    <p>Podrás visualizar los pedidos realizados y dar seguimiento!!!</p>
                    <p>Desde $38,300 mx</p>
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
              <img class="lock_img" src="{{ asset("img/design/recursos/home/tienda.png")}}"  alt="">
           </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    
@endsection 