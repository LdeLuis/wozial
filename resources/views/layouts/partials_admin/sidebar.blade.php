<style>
    .link-sider-admin {
        text-decoration: none;
        color: #FFFFFF;
    }

    .link-sider-admin:hover {
        text-decoration: underline;
        color: #FAC706;
        font-weight: 800;
        font-size: 1rem;
    }

</style>

<div class="row sidebar">
    <div class="col-10 mx-auto" style="background: black; border-radius: 16px; margin-top: 5rem;">
        <div class="row">
            <div class="col py-3 text-center">
                <a href="{{ url('admin') }}">
                    <img src="{{ asset('img/design/logo_woz.png') }}" class="img-fluid">
                </a>
            </div>
        </div>
        <div class="row pt-3 pb-5">
            <div class="col-9 py-2 mx-auto">
                <a href="{{ route('seccion.show', ['slug' => 'configuracion'])}}" class="link-sider-admin" style="border-radius: 16px; text-decoration: none; " ><i class="bi bi-gear-fill"></i> Configuración</a>
            </div>
            <div class="col-9 py-2 mx-auto">
                <a href="{{ route('seccion.show', ['slug' => 'politicas'])}}" class="link-sider-admin" style="border-radius: 16px; text-decoration: none; " ><i class="bi bi-shield-fill-exclamation"></i> Políticas</a>
            </div>
            <div class="col-9 py-2 mx-auto">
                <a href="{{ route('seccion.show', ['slug' => 'faqs'])}}" class="link-sider-admin" style="border-radius: 16px; text-decoration: none; " ><i class="bi bi-question-circle-fill"></i> FAQS</a>
            </div>
            <div class="col-9 py-2 mx-auto">
                <a href="{{ route('seccion.show', ['slug' => 'home'])}}" class="link-sider-admin" style="border-radius: 16px; text-decoration: none; " ><i class="bi bi-house-door-fill"></i> Home</a>
            </div>
            <div class="col-9 py-2 mx-auto">
                <a href="{{ route('seccion.show', ['slug' => 'nosotros'])}}" class="link-sider-admin" style="border-radius: 16px; text-decoration: none; " ><i class="bi bi-postcard-fill"></i> Nosotros</a>
            </div>
            <div class="col-9 py-2 mx-auto">
                <a href="{{ route('seccion.show', ['slug' => 'catalogo'])}}" class="link-sider-admin" style="border-radius: 16px; text-decoration: none; " ><i class="bi bi-stack"></i> Catálogo</a>
            </div>
            <div class="col-9 py-2 mx-auto">
                <a href="{{ route('seccion.show', ['slug' => 'sliders'])}}" class="link-sider-admin" style="border-radius: 16px; text-decoration: none; " ><i class="bi bi-card-image"></i> Sliders</a>
            </div>
            <div class="col-9 py-2 mx-auto">
                <a href="{{ route('seccion.show', ['slug' => 'blogs'])}}" class="link-sider-admin" style="border-radius: 16px; text-decoration: none; " ><i class="bi bi-camera-fill"></i> Blogs</a>
            </div>
        </div>
    </div>
</div>


