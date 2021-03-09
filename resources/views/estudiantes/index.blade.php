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
                <a class="btn btn-success" type="button" href="{{route('estudiantes.create')}}"><i class="fa fa-user" aria-hidden="true"> AGREGAR </i></a> 
                <!-- Button trigger modal 
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                     <i class="fa fa-user" aria-hidden="true"> AGREGAR </i>
                </button>-->
  
              {{--@include('estudiantes.modal_create') --}}
                
            </div>
            <br>
            <div class="card strpied-tabled-with-hover">
               
                <div class="card-header  bg-secondary text-center" style="color: black">
                <h2>Estudiantes </h2>
                </div>

                <div class="card-body table-full-width table-responsive ">
                    <table class="table table-hover table-sm " id="">
                        <thead>
                            <th>Código</th>
                            <th>Nombre Completo</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Carrera</th>
                            <th>Foto</th>
                            
                            <th>Acciones</th>
                            
                        </thead>
                        <tbody>
                            
                            @forelse ($estudiantes as $estu)
                            <tr>
                                <td>{{ $estu->codigo}}</td>
                                <td>{{ $estu->nombre}}</td>
                                <td>{{ $estu->telefono}}</td>
                                <td>{{ $estu->correo}}</td>
                                <td>{{ $estu->carrera}}</td>
                                <td><img  src="{{Storage::url("imagenes/$estu->foto")}}" alt="ND" width="50px" height="50px" ></td>
                                <td class="btn-group " role="group">
                                   <a href="{{route('estudiantes.edit',$estu->codigo)}}"> <button type="button" class="btn btn-warning " ><i class="fa fa-pencil" aria-hidden="true"></i></button></a>  
                                    <form action="{{route('estudiantes.destroy',$estu->codigo)}}" class="formulario-eliminar-estudiantes" method="post">
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
    $('.formulario-eliminar-estudiantes').submit(function(e){
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