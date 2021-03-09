@extends('index')
@section('css')
    <link rel="stylesheet" href="{{asset('css/css/image.css')}}">
@endsection

@section('contenido')
@include('sweetalert::alert')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div>
                <a class="btn btn-success" type="button" href="{{route('expedientes.create')}}"><i class="fa fa-user" aria-hidden="true"> AGREGAR </i></a> 
                
            </div>
            <br>
            <div class="card strpied-tabled-with-hover">
               
                <div class="card-header  bg-secondary text-center" style="color: black">
                <h2>Expedientes </h2>
                </div>

                <div class="card-body table-full-width table-responsive ">
                    <table class="table table-hover  " id="ingenieriles">
                        <thead>
                            <th>Código Del Estudiante</th>
                            <th>Programa</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>Dia</th>
                            <th>Hora de Inicio</th>
                            <th>Hora final</th>
                            <th>Reportes</th>
                            <th>Acciones</th>
                            
                        </thead>
                        <tbody>
                            
                            @forelse ($expedientes as $expe)
                            <tr>
                                <td>{{ $expe->estudiantes_codigo}}</td>
                                <td>{{ $expe->programa}}</td>
                                <td>{{ $expe->inicio}}</td>
                                <td>{{ $expe->fin}}</td>
                                <td>{{ $expe->dia}}</td>
                                <td>{{ $expe->h_inicio}}</td>
                                <td>{{ $expe->h_fin}}</td>
                                <td> <a href="{{route('expe.download',$expe->id)}}">{{ $expe->reportes}}</a></td>
                                <td class="btn-group " role="group">
                                    <a href="{{route('expedientes.edit',$expe->id)}}"><button class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> </button></a>
                                    <form action="{{route('expedientes.destroy',$expe->id)}}" class="formulario-eliminar-Expedientes" method="post">
                                        @method('DELETE')
                                        {{ @csrf_field() }}
                                        <button type="submit" class="btn btn-danger"  ><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                   
                                </td>
                                
                                    
                               
                            </tr>
                            @empty
                                <div class="alert alert-warning text-center" role="alert">
                                <h5>NO HAY REGISTROS EN LA BASE DE DATOS</h5>
                               </div>

                        @endforelse


                        </tbody>
                        
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- ******************************************************************************************************* -->
    
</div>
    
@endsection

@section('js')

@if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
            'Eliminado!',
            'Eliminado',
            'success'
            )
        </script>
    
@endif
<script>
    $('.formulario-eliminar-Expedientes').submit(function(e){
        e.preventDefault();
        Swal.fire({
        title: 'Estás seguro?',
        text: "Ya no podras modificar esto",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
           
            
        }
        })
        
    })

</script>

@endsection