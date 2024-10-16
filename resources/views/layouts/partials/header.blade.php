<style>
  
    header {
        border-top: 5px solid var(--fondo-verde);
        border-bottom: 2px solid var(--blanco);
        background: var(--fondo-gris);
    }

    .btn-logo {
        text-decoration: none;
    }

    .link-header {
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--texto-header);
        padding: 0.5rem 1.5rem;
        text-decoration: none;
    }

    .link-header:hover {
        color: var(--fondo-verde);
        border-top: 1px solid var(--fondo-verde);
        border-left: 1px solid var(--fondo-verde);
        border-right: 1px solid var(--fondo-verde);
        border-bottom: 5px solid var(--fondo-verde);
    }

    .link-header_small {
        font-size: 1.4rem;
        font-weight: 600;
        color: var(--texto-header);
        text-decoration: none;
    }

    .link-header_small:hover {
        color: var(--fondo-verde);
        border-bottom: 5px solid var(--fondo-verde);
    }

    .btn-social {
        color: var(--negro);
        text-decoration: none;
    }

    .btn-social > .bi {
        font-size: 1.4rem;
    }

    .btn-social:hover {
        color: var(--fondo-verde);
    }


    .div-header {
        background-color: transparent
    }

    .div-header p {
        font-size: 20px;
        font-family: "Quicksand", sans-serif;
        font-weight: <weight>;
    }

    .div-header p b {
        margin-left: 17px;
        font-size: 20px;
        font-family: "Quicksand", sans-serif;
        font-weight: <weight>;
    }

    .div-header i {
        margin-left: 17px;
        font-size: 25px;    
        color:black
    }

    .flex-row {
        flex-direction: row !important;
        display: flex;
    }
    
    .dropdown-img {
        cursor: pointer;
        position: relative;
        z-index: 4;
    }

    .dropdown-menu.show {
        background-color: rgba(26, 24, 24, 0.904);
        backdrop-filter: blur(10px);
        width: 60vw;
        padding-top: 3rem;
        transform: translate(-3rem, -4rem);
        position: absolute;
        z-index: 3;
    }

    .dropdown-menu.show  a{
        font-size: 80px;
        font-style: italic;
        color: white;
        margin-left: 3rem;
        margin-top: 1rem;

    }

    .dropdown-item:hover {
        background-color: transparent ;
    }
    
    .color1{
        
        transition:ease all 0.3s;
    }


    .color1:hover{
        transform: translateX(3rem);
        color: rgb(236, 112, 133) !important;
    }


    .color1:hover ~ .barra1 {
        width: 80% !important;
        transform: translateX(3rem);
        background-color: rgb(236, 112, 133) !important;
    }


    .color2{
        color: white;
        transition:ease all 0.3s;
    }

    .color2:hover{
        transform: translateX(3rem);
        color:rgb(52, 52, 253) !important;
    }

    .color2:hover ~ .barra2 {
        width: 80% !important;
        transform: translateX(3rem);
        background-color:rgb(52, 52, 253) !important;
    }


    .barra1{
        width: 30%; 
        height:3px; 
        margin-left: 3rem;
        background-color: white;
        transition:ease all 0.3s;
    }

    .barra1:hover{
        width: 80% !important;
        background-color: rgb(236, 112, 133) !important;
    }

    .barra2{
        width: 30%; 
        height:3px; 
        margin-left: 3rem;
        background-color: white;
        transition:ease all 0.3s;
    }

    .barra2:hover{
        width: 80% !important;
        background-color:rgb(52, 52, 253) !important;
    }

    
    .dropdown-menu {
        display: none; 
        position: absolute;
        background-color: #fff;
        list-style: none;
        padding: 0;
    }

    .dropdown-menu.show {
        display: block; 
    }


    #dropdownImageActive {
        display: none; 
    }

    .dropdown.show #dropdownImageDefault {
        display: none; 
    }

    .dropdown.show #dropdownImageActive {
        display: inline; 
    }


    .header-title {
        color: black;
        transition: color 0.3s ease;
    }

    .menu-active .header-title {
        color: white !important;
        z-index: 5;
    }

    .header-bg-blanco{
        background-color: white;
    }

    .header-bg-gris{
        background-color: #F9F8F7;
    }

    header {
        border: none;
    }

    .tamano{
        text-decoration: none;
        color: black;
    }


    @media (min-width: 576px) and (max-width: 768px) {
        
        .div-header p {
            font-size: 18px;
            text-align: center;
        }

        .dropdown-img {
            width: 30px;
            height: 30px;
        }

        .dropdown-menu.show a {
            font-size: 3rem;
        }

        .flex-row {
            flex-direction: column;
            align-items: center;
        }

        .barra1, .barra2 {
            margin-left: 0;
        }

        .dropdown-menu.show {
            width: 60vw;
            padding-top: 3rem;
            transform: 0 !important;
            position: absolute;
        }
        
    }

    @media (max-width: 576px) {
        /* Ajustes para pantallas pequeñas como teléfonos móviles */
        .div-header p {
            font-size: 16px; 
            text-align: center;
        }

        .tamano p{
            font-size: 5px;
        }
        
        .div-header i {
            font-size: 20px; /* Reduce el tamano de los íconos */
        }

        .dropdown-img {
            width: 28px; 
            height: 28px;
        }

        
        .flex-row {
            flex-direction: column;
            align-items: center;
        }

        .flex-row p {
            margin: 10px 0; 
        }

        .dropdown-menu.show a {
            font-size: 2rem; 
        }

        .dropdown-menu.show {
            width: 100vw;
            transform: 0;
        }

    
        .barra1, .barra2 {
            margin-left: 0;
        }

        
        .fa-whatsapp, .fa-facebook-f, .fa-instagram {
            margin-left: 10px;
        }

        .ocultar-en-movil {
            display: none;
        }

    }


</style>
<header class="
@if (Request::is('/')) header-bg-gris
    @else header-bg-blanco @endif" style="padding: 2.8rem 3rem 2rem 3rem;F9F8F7;">
                
        <div class="div-header">
            <div class="flex-row">
                <div class="dropdown">
                    
                    <img src="{{asset('img/design/recursos/home/icono-menu.png')}}" width="32" height="32" alt="Imagen Menú" class="dropdown-img" id="dropdownImageDefault">
                    <img src="{{asset('img/design/recursos/home/icono-menu2.png')}}" width="32" height="32" alt="Imagen Menú Activo" class="dropdown-img" id="dropdownImageActive" style="display: none;">
                    
                    
                    <ul class="dropdown-menu" aria-labelledby="dropdownImageDefault" id="dropdownMenu">
                        <li class=""><a class="dropdown-item color1" href="{{route('front.home')}}">.inicio </a>
                            <div class="barra1"></div>
                        </li>
                        <li class=""><a class="dropdown-item color2" href="">.página web</a>
                            <div class="barra2"></div>
                        </li>
                        <li class=""><a class="dropdown-item color2" href="{{route('front.webadmin')}}">.página <br>administrable</a>
                            <div class="barra2"></div>
                        </li>
                        <li class=""><a class="dropdown-item color2" href="{{route('front.tiendaenlinea')}}">.tienda en línea</a>
                            <div class="barra2"></div>
                        </li>
                        <li class=""><a class="dropdown-item color1" href="{{route('front.sobrewozial')}}">.sobre wozial</a>
                            <div class="barra1"></div>
                        </li>
                        <li class=""><a class="dropdown-item color1" href="{{route('front.marketing')}}">.marketing <br>digital</a>
                            <div class="barra1"></div>
                        </li>
                        <li class=""><a class="dropdown-item color1" href="{{route('front.evento')}}">.evento</a>
                            <div class="barra1"></div>
                        </li>
                        <li class=""><a class="dropdown-item color1" href="{{route('front.portafolio')}}">.portafolio</a>
                            <div class="barra1"></div>
                        </li>
                        <li class=""><a class="dropdown-item color1" href="{{route('front.contacto')}}">.contacto</a>
                            <div class="barra1"></div>
                        </li>
                    </ul>
                </div>

                
                <a class="header-title tamano" style=" " href="{{route('front.home')}}">
                    <p><b>WOZIAL MARKETING LOVERS</b></p>
                </a>

                <p class="ocultar-en-movil" style="margin-left: auto;">3338096501</p>
                <a class="ocultar-en-movil" href="https://api.whatsapp.com/send/?phone=5213338096501&text=Me+gustar%C3%ADa+saber+...&type=phone_number&app_absent=0">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>
                <a class="ocultar-en-movil" href="https://www.facebook.com/wozialmarketinglovers/">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a class="ocultar-en-movil" href="https://www.instagram.com/wozial_marketing/">
                    <i class="fa-brands fa-instagram"></i>
</a>

                </a>
            </div>
        </div>




        <!-- Bootstrap JS (incluye Popper.js necesario para los dropdowns) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            // Obtenemos los elementos
        const dropdownImageDefault = document.getElementById('dropdownImageDefault');
        const dropdownImageActive = document.getElementById('dropdownImageActive');
        const dropdownMenu = document.getElementById('dropdownMenu');
        const headerTitle = document.querySelector('.header-title');
        const headerContainer = document.querySelector('.div-header');

        // Función para alternar el estado del menú
        dropdownImageDefault.addEventListener('click', function() {
            dropdownMenu.classList.toggle('show'); // Alterna la visibilidad del menú

            if (dropdownMenu.classList.contains('show')) {
                dropdownImageDefault.style.display = 'none';
                dropdownImageActive.style.display = 'inline'; // Muestra la imagen activa
                headerContainer.classList.add('menu-active'); // Añade la clase para cambiar el color del texto
            } else {
                dropdownImageDefault.style.display = 'inline';
                dropdownImageActive.style.display = 'none'; // Vuelve a la imagen por defecto
                headerContainer.classList.remove('menu-active'); // Quita la clase para revertir el color del texto
            }
        });

        // Para cerrar el menú haciendo clic en la imagen activa
            dropdownImageActive.addEventListener('click', function() {
            dropdownMenu.classList.remove('show');
            dropdownImageActive.style.display = 'none';
            dropdownImageDefault.style.display = 'inline';
            headerContainer.classList.remove('menu-active'); // Quita la clase para revertir el color del texto
        });

        </script>


</header>
