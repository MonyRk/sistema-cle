@extends('layouts.app')

@section('sidebar')
@include('layouts.navbars.sidebar')
@endsection

@section('content')
<div class="container-fluid m--t">
    <div class="header pb-1 pt-4 pt-lg-7 d-flex align-items-center text-center">
        <div class="col-lg col-md">
            <h4 class="text-dark">Pagos</h4>
        </div>
    </div>
    <div class="card-body">
        @include('flash-message')
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <div class="text-right">
        <a href="{{ route('indexpagos') }}" class="btn btn-outline-primary btn-sm mt-2">
            <span>
                <i class="fas fa-reply"></i> &nbsp; Regresar
            </span>
        </a>
    </div>
    <form action="{{ route('buscarPago') }}" method="GET">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 text-center">
                <div class="row">
                    <div class="form-group col-md">
                        <label class="form-control-label" for="numControl">{{ __('Número de Control') }}</label>
                        <input id="numControl" class="form-control" name="numControl">

                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg mt-4"><span><i class="fas fa-arrow-right"></i></span></button>
                </div>


            </div>
            <div class="col-lg-4"></div>
        </div>
    </form>
    <br><br><br><br>
    @include('layouts.footers.nav')
</div>


@endsection