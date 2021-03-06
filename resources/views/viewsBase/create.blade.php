@extends('layouts.app')

@section('sidebar')
    @include('layouts.navbars.sidebar')
@endsection

@section('content')
<div class="header pb-2 pt-5 pt-lg-8 d-flex align-items-center text-center" >
    <div class="col-lg col-md">
        <h4 class="text-dark">@yield('titlecreate')</h4>
    </div>
</div>
    
    <div class="container-fluid m--t">
            <div class="text-right">
                <a href=" @yield('regresar') " class="btn btn-outline-primary btn-sm mt-4">
                    <span>
                        <i class="fas fa-reply"></i> &nbsp; Regresar
                    </span>
                </a>
            </div>
        <div class="card-body ">
            
            @if ($errors->any())
            <div class="alert alert-danger alert-block pt-2">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>No pudimos agregar los datos, <br> por favor, verifica la información</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li> {{ $error }}</li>
                        @endforeach
                    </ul>  
                </div> 
            @else 
            @if(session()->has('message'))
                <div class="alert alert-success">
                     {{ session()->get('message') }}
                </div>
            @endif                           
            @endif

        <form method="post" action="@yield('action')" autocomplete="off" enctype="multipart/form-data">
            @csrf
            @method('post')

            <h6 class="heading-small text-muted mb-4">{{ __('Información Personal') }}</h6>
            <p class="text-muted">La informaci&oacute;n proporcionada en &eacute;sta p&aacute;gina web ser&aacute; utilizada para fines 
                acad&eacute;micos y s&oacute;lo por la Coordinaci&oacute;n de Lenguas Extranjeras.</p>
                
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                   
                </div>
            @endif

            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-md">
                        <label class="form-control-label" for="input-name"><b style="color:red;">*</b>{{ __('Nombre(s)') }}</label>
                        <input type="text" name="name" id="input-name" class="form-control" placeholder="" value="{{ old('name') }}" >
                    </div>
                    <div class="col-md"> 
                        <label class="form-control-label" for="input-apPaterno"><b style="color:red;">*</b>{{ __('Apellido Paterno') }}</label>
                        <input type="text" name="apPaterno" id="input-apPaterno" class="form-control" placeholder="" value="{{ old('apPaterno') }}" >
                    </div>
                    <div class="col-md">
                        <label class="form-control-label" for="input-apMaterno">{{ __('Apellido Materno') }}</label>
                        <input type="text" name="apMaterno" id="input-apMaterno" class="form-control" placeholder="" value="{{ old('apMaterno') }}">
                    </div>
                </div>
                <br>

                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label class="form-control-label" for="input-curp"><b style="color:red;">*</b>{{ __('CURP') }}</label>
                        <input type="text" class="form-control" name="curp" id="input-curp" onkeyup="this.value = this.value.toUpperCase();" value="{{ old('curp') }}" data-toggle="tooltip" data-placement="bottom" title="Aseg&uacute;rate de escribir la CURP correctamente">
                    </div>
                    <div class="form-group col-md-2">
                        <label class="form-control-label" for="input-edad"><b style="color:red;">*</b>{{ __('Edad') }}</label>
                        <input type="text" class="form-control" name="edad" id="input-edad" value="{{ old('edad') }}">
                    </div>
                    <div class="form-group col-md">
                        <label class="form-control-label" for="input-sexo"><b style="color:red;">*</b>{{ __('Sexo') }}</label>
                        <div class="row">            
                            <div class="custom-control custom-radio">
                                <input type="radio" id="sexof" name="sexo" value="F" class="custom-control-input">
                                <label class="custom-control-label" for="sexof">&nbsp&nbsp&nbsp&nbsp&nbspFemenino</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="sexom" name="sexo" value="M" class="custom-control-input">
                                <label class="custom-control-label" for="sexom">&nbsp&nbsp&nbsp&nbsp&nbspMasculino</label>
                            </div>
                        </div>
                    </div>
                </div>
                
<br>
                <div class="form-row">
                    <div class="form-group col-md">
                        <label class="form-control-label" for="input-telefono">{{ __('Teléfono') }}</label>
                        <input type="text" name="telefono" id="input-telefono" class="form-control" placeholder="" value="{{ old('telefono') }}">
                    </div>
                    <div class="form-group col-md">
                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                        <input type="text" name="email" id="input-email" class="form-control form-control-alternative" placeholder="" value="{{ old('email') }}">
                    </div>
                </div>
                </div>
        
        

        @yield('nombreTipodeInformacion')

        <div class="pl-lg-4">
            @yield('informacionporTipo')
            <br><br>
            <b style="color:red;">*</b><span class="text-muted">Campos Obligatorios</span>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4">{{ __('Guardar') }}</button>
            </div>
            </div>
        </form>
    </div>
</div>

    <br><br>
    @include('layouts.footers.nav')
@endsection