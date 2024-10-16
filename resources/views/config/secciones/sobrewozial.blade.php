@extends('layouts.admin')

@section('extraCSS')
    
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
        font-size: 23px;
    }

    .par-est b{
        font-size: 23px;
    }

    .estilop{
        margin-top: 5rem;
        margin-left: 10rem;
        margin-right: 10rem; 
    }
    .estilop p{
        font-size: 60px;
        font-weight: 100;

    }
    .container {
        display: flex;
        justify-content: space-between; 
        width: 80%; 
        max-width: 1200px; 
    }

    .item {
        text-align: center; 
        width: 40%; 
        font-size: 50px; 
        margin-top: 3rem;
        margin-bottom: 3rem;
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

    .div-p{
        padding: 3rem 3rem;
    }



</style>

@endsection

@section('content')

    <div class="row mt-5 mb-4 px-2">
        <a href="{{ route('front.admin') }}" class="mt-5 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
    </div>
    <div style="background-color: #fff">
        <section>
            <div class="alin-center">
                <form class="img-contact" id="form_slider_image" action="{{ route('seccion.cambiar_imagen_seccion') }}"
                     method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="archivo" id="hidden_file_input" style="display: none;">
                    <input type="hidden" name="id_imagen" value="{{ $elements[0]->id }}" id="">
                    <div class="carru-modal" style="width: 30rem; height:11rem; margin-left: 25rem;" id="clickable_area">
                        <p>CAMBIAR IMAGEN</p>
                    </div>
                    <img src="{{ asset('img/photos/imagenes_estaticas/' . $elements[0]->imagen) }}" width="350" height="130" alt="">
                </form>
                <div class="div-p">
                    <textarea class="editarajax" data-model="Elemento" data-field="texto" data-id="{{$elements[1]->id}}" name="" style="font-size: 50px;" id="" cols="20" rows="3">{{$elements[1]->texto}}</textarea>
                    
                </div>
                <div class="par-est">
                    <textarea class="editarajax" data-model="Elemento" data-field="texto" data-id="{{$elements[2]->id}}" name="" style="font-size:25px;" id="" cols="50" rows="12">{{$elements[2]->texto}}</textarea>
                    
                </div>
            </div>
        </section>
        <section>
            <div class="alin-center">
                <div class="estilop">
                    <textarea class="editarajax" data-model="Elemento" data-field="texto" data-id="{{$elements[3]->id}}" name="" style="font-size: 45px;" id="" cols="25" rows="4">{{$elements[3]->texto}}</textarea>
                    
                </div>
                <div class="container">
                    <div class="item">
                        <img class="cuadrado" src="{{ asset("img/design/recursos/wozial/logo_01.png")}}" alt="Ícono 1"> 
                    </div>
                    <div class="item">
                        <img class="cuadrado" src="{{ asset("img/design/recursos/wozial/logo_02.png")}}" alt="Ícono 2"> 
                    </div>
                    <div class="item">
                        <img class="cuadrado" src="{{ asset("img/design/recursos/wozial/logo_03.png")}}" alt="Ícono 3"> 
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <script>
         $('#hidden_file_input').change(function(e) {
            $('#form_slider_image').submit();
        });

        document.getElementById('clickable_area').addEventListener('click', function() {
            document.getElementById('hidden_file_input').click();
        });
    </script>

@endsection

@section('extraJS')

    

@endsection