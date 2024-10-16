@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-11 card mx-auto">
                <div class="row">
                    <div class="col fs-5 py-3 d-flex align-items-center justify-content-center">
                        Dashboard
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-12 border">
                        <div class="row">
                            <div class="col fs-5 py-3">
                                Bienvenido:
                            </div>
                        </div>
                        <div class="row">
                            <div class="col py-5 text-center fs-5">
                                {{ $usuario->name }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 border px-0">
                                <a href="#/" class="btn btn-dark w-100 rounded-0">OPCIÓN</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 border px-0">
                                <a href="#/" class="btn btn-dark w-100 rounded-0">OPCIÓN</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 border px-0">
                                <a href="#/" class="btn btn-dark w-100 rounded-0">OPCIÓN</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 border px-0">
                                <a href="{{ route('logout') }}" class="btn btn-danger w-100 rounded-0">Cerrar sesión</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-12 border mt-md-0 mt-5">
                        <div class="row">
                            <div class="col-11 mx-auto">
                                <div class="row">
                                    <div class="col py-1 fs-4 text-center">
                                        Datos de usuario
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="nombre_u" class="form-control-label">Modificar nombre de usuario</label>
                                        <input type="text" name="nombre_u" class="form-control" value="{{ $usuario->name }}">
                                    </div>
                                    <div class="col-12">
                                        <label for="correo_u" class="form-control-label">Modificar dirección de correo electrónico</label>
                                        <input type="text" name="correo_u" class="form-control" value="{{ $usuario->email }}">
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="row">
                                            <div class="col fs-4 text-center">
                                                Cambiar contraseña
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <label for="pass_u" class="form-control-label">Nueva contraseña</label>
                                                <input type="text" name="pass_u" class="form-control">
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label for="passc_u" class="form-control-label">Confirmar contraseña</label>
                                                <input type="text" name="passc_u" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-12 mx-auto py-md-2 py-4">
                                                <input type="submit" class="btn btn-dark w-100 rounded-0" value="Actualizar contraseña">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
