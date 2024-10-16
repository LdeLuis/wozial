<style>
    .principal2{
            padding-right: 2rem;
            padding-left: 2rem;
            padding-bottom: 2rem;
            padding-top: 1rem;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            z-index: 0;
            width: 100%;
            height: 100%;
            background-image: url({{asset('img/design/recursos/home/patron_01.png')}});
        }

        hr{
            margin-top: 100px;
            height: 5px;
            background-color: black;
            opacity: 1;
        }


        .contenedor {
            display: flex;
            justify-content: space-between; 
            width: 100%;
        }

        .estiloso {
            font-size: 25px;
            margin-top: 40px;
            font-family: "Quicksand", sans-serif;
            font-weight: <weight>;
            
        }

        .estiloso p {
            font-size: 20px;
            text-align: right;
        }

        .estiloso2 {
            margin-left: 180px;
        }

        

        .contact {
            display: flex; /* Usar Flexbox para los íconos de contacto */
            align-items: center; /* Alineación vertical */
        }
        .contact-icon {
            font-size: 25px; /* Tamaño de los íconos de contacto */
            margin-left: 15px; /* Espaciado entre íconos */
            cursor: pointer; /* Cambia el cursor al pasar el ratón */
        }


        .f-par{
            text-align: center;
            font-style: italic;
            font-size: 90px;
            font-weight: 200;
            margin: 2rem 4rem;
            text-decoration: underline;
            text-decoration-thickness: 2px;
        }

        .siseve{
            display: block;
        }

        .noseve{
            display: none;
        }

        @media (min-width: 576px) and (max-width: 768px) {
            .estiloso {
                font-size: 25px;
                margin-top: 40px;
                text-align: center;
                font-family: "Quicksand", sans-serif;
                font-weight: <weight>;
                
            }

            .estiloso p {
                font-size: 20px;
                text-align: center;
            }

            .f-par{
                font-size:40px;
            }

            .estiloso2 {
                margin-left: 0;
                text-align: center;
            }
        }

        @media (max-width: 576px){
            
            .f-par{
                font-size:20px;
                margin: 0;
            }

            .estiloso p {
                font-size: 20px;
                text-align: center;
            }

            .estiloso2 {
                margin-left: 0;
                text-align: center;
            }
            
        }

        
</style>
<footer class="">
        <section class="principal2">
            <hr>
            <div class="contenedor d-flex flex-lg-row flex-md-column flex-column justify-content-center align-items-center">
                <div class="col-lg-6  col-12" >
                    <div class="estiloso ">
                        <p style="">Todos los derechos reservados wozial marketing lovers 2024</p>
                    </div>
                </div>
                
                <div class="col-lg-6  col-12" style="">
                    <div class="estiloso">
                        <p style="">citas y cotizaciones: 3338096501 / sonrie@wozial.com</p>
                        <div class="estiloso2">
                            <i class="fab fa-whatsapp contact-icon"></i>
                            <i class="fab fa-facebook contact-icon"></i>
                            <i class="fab fa-instagram contact-icon"></i>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="{{ (Route::currentRouteName() == 'front.paginaweb' || Route::currentRouteName() == 'front.webadmin' || Route::currentRouteName() == 'front.tiendaenlinea') ? 'siseve' : 'noseve' }}" style="padding: 3rem 3rem;">
                <p class="f-par">Do more of what makes you happy</p>
            </div>
        </section>
        
</footer>
