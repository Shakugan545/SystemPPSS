@extends('index')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.0/dropzone.min.css">
    <link rel="stylesheet" href="{{asset('css/css/image.css')}}">
@endsection

@section('contenido')
<form  method="post" id="formCreate" class="formulario-guardar-estudiantes" action="{{route('estudiantes.store')}}" enctype="multipart/form-data"> <!--Para subir imagen se utiliza enctype="multipart/form-data -->
               
    {{ @csrf_field() }}
    <div class="col">
           <div class="card card-body text-center ">
            <div class="card-title text-center " >
              <h2>Agregar Estudiante</h2>
            </div>
               <div class="form-row">
                 <div class="col">
                     <label for="codigo">Código</label>
                 <input type="text" name="codigo" id="codigo" value="{{old('codigo')}}"  class="form-control @error('codigo') is-invalid @enderror" placeholder="Código">
                 @error('codigo')
                            <div class="alert-danger">{!!$errors->first('codigo')!!}</div>
                 @enderror
                     
                     
                 </div>
                   <div class="col">
                     <label for="nombres">Nombres</label>
                   <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}"  class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre">
                   @error('nombre')
                            <div class="alert-danger">{!!$errors->first('nombre')!!}</div>
                  @enderror
                   </div>

                   <div class="col">
                    <label for="telefono">Teléfono</label>
                      <input type="text" name="telefono" id="telefono" value="{{old('telefono')}}" class="form-control @error('telefono') is-invalid @enderror" placeholder="Teléfono">
                      @error('telefono')
                      <div class="alert-danger">{!!$errors->first('telefono')!!}</div>
                      @enderror
                  </div>
                 </div>
                 <br>
                 <div class="form-row">
                   
                   <div class="col">
                     <label for="correo">Correo</label>
                       <input type="text"  name="correo" id="correo" value="{{old('correo')}}" class="form-control @error('correo') is-invalid @enderror" placeholder="Correo">
                       @error('correo')
                            <div class="alert-danger">{!!$errors->first('correo')!!}</div>
                       @enderror
                   </div>
                   <div class="col">
                    <Label for="carrera">Carrera</Label>
                      <input type="text" name="carrera" id="carrera" value="{{old('carrera')}}" class="form-control @error('carrera') is-invalid @enderror" placeholder="Carrera">
                      @error('carrera')
                           <div class="alert-danger">{!!$errors->first('carrera')!!}</div>
                      @enderror
                  </div>
                </div>
                 <div class="row" id="divFoto" >
                    <Label for="foto"><img src="{{asset('imagenes/user1.png')}}" alt="error" id="img" > <br> Ingresa Una Fotografia</Label>
                    <input type="file"   name="foto" value="{{old('foto')}}" accept="image/*" id="foto" class="form-control @error('foto') is-invalid @enderror" placeholder="Foto">
                    @error('foto')
                    <div class="alert-danger">{!!$errors->first('foto')!!}</div>
                    @enderror
                </div>
                
           </div>
           <div class="modal-footer">
            <a href="{{route('estudiantes.index')}}"><button type="button" class="btn btn-secondary" >Regresar</button></a>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
  </div>
  </form>  
  


@endsection

@section('js')




@endsection