@extends('layouts.app')
@section('sidebar')
    @include('layouts.navbars.sidebar')
    
@endsection
@section('content')


<div class="header bg-gradient-pantone py-5 py-lg-3">
       
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <div class="container">
            <div class="header-body text-center mb-2">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                         <h3 class="text-dark">{{ __('Datos del Estudiante') }}</h3>
                    </div>
                </div>
            </div>
        </div>


    <div>
            <label for="nombre">{{ __('Nombre: ') }}</label>
            {{ $datos_alumno[0]->nombres }} {{ $datos_alumno[0]->ap_paterno }} {{ $datos_alumno[0]->ap_materno }}
        
    </div>
@endsection