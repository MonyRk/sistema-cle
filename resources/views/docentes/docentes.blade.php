@extends('layouts.app')
@section('sidebar')
    @include('layouts.navbars.sidebar')
@endsection

@section('content')

     {{-- -contenido --}}
     <div class="container-fluid">
        <div class="row">
            <!-- espacio de busqueda-->
            <div class="col-md">
                @include('flash-message')
            </div>
            <div class="col-md">
                <div class="">
                    <form action="{{ route('buscarDocente') }}" method="GET" class="navbar-search navbar-search-dark form-inline mr-5 d-none d-md-flex ml-lg-9"  style="margin-top: 15px" >
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input name ="buscar"class="form-control" placeholder="Buscar" type="text">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
          
            <div class="col-xl">
                <!-- header de la tabla-->
                <div class="col-xl">
                    <div class="card shadow ">
                        <div class="card-header border-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="mb-0">Datos de los Docentes</h4>
                                </div>
                                <div class="col text-right">
                                    <a href="{{ url("/agregarDocente") }}" class="btn btn-sm btn-gray">Agregar
                                        <i class="fas fa-user-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush th">
                                <thead class="thead-light">
                                    <tr> 
                                        <th scope="col">Matricula</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Grado de <br> Estudios</th>
                                        <th scope="col">Estatus</th>
                                        <th scope="col">Editar</th>
                                        <th scope="col">Eliminar</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datos_docentes as $docente)
                                    <tr>
                                        <th scope="row">
                                            {{ $docente->id_docente }}
                                        </th>
                                        <th>
                                            <a href="{{ route('verInfoDocente',$docente->id_docente) }}">{{ $docente->nombres }} {{ $docente->ap_paterno }} {{ $docente->ap_materno }}</a>
                                        </th>                                      
                                        <td name="">{{ $docente->grado_estudios }}</td>
                                        <td>
                                            {{ $docente->estatus }}
                                        </td>
                                        <td> <a href="docentes/{{ $docente->id_docente }}/editar"><i class="fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <a href="" id="docenteid" data-docenteid="{{ $docente->id_docente }}" data-toggle="modal" data-target="#modal-notification" ><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                        
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $datos_docentes->links() }}
                    </div>
                </div>
            </div>

        </div>
    
        <div class="col-md-4">
            <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-" role="document">
                    <div class="modal-content bg-gradient-white">
                        
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-notification">¡Espera!</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            
                        </div>
                        <form action="{{ route('eliminarDocente','test') }}" method="POST" class="delete" id="deleteForm">
                        @csrf
                        @method('delete')
                        <div class="modal-body">
                            
                            <div class="py-3 text-center">
                                    <i class="fas fa-times fa-3x" style="color:#CD5C5C;"></i>
                                <h4 class="heading mt-4">¡Da tu confirmaci&oacute;n para Eliminar!</h4>
                                <p>¿Realmente deseas eliminar los datos del estudiante?</p>
                                <input type="hidden" name="docente_id" id="docente_id" value="">
                            </div>
                            
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-white">S&iacute;, Eliminar</button>
                            <button type="button" class="btn btn-link text-gray ml-auto" data-dismiss="modal">No, Cambi&eacute; de opinion</button> 
                        </div>
                        </form>
                    </div>
                </div>
            </div>
                </div>
    
    
               @section('script')
               <script>
                $('#modal-notification').on('show.bs.modal', function(event){
                    var button = $(event.relatedTarget) //
                    var docent_id = button.attr('data-docenteid')
                    var modal = $(this)
                    modal.find('.modal-body #docente_id').val(docent_id);
                } )
                </script>
               @endsection



@endsection
 
</div>
            
