@extends('index')
@section('css')
    <link rel="stylesheet" href="{{asset('css/css/image.css')}}">
@endsection
@section('contenido')
<form  method="post" id="formCreate" action="{{route('expedientes.store')}}" enctype="multipart/form-data">
               
    {{ @csrf_field() }}
    <div class="col">
           <div class="card card-body text-center ">
            <div class="card-title text-center " >
              <h2>Agregar Expediente</h2>
            </div>
               <div class="form-row">
                 <div class="col">
                     <label for="estudiantes_codigo">Código del Estudiante</label>
                 <input type="text" name="estudiantes_codigo" id="estudiantes_codigo" value="{{old('estudiantes_codigo')}}"  class="form-control @error('estudiantes_codigo') is-invalid @enderror" placeholder="Código del estudiante">
                 @error('estudiantes_codigo')
                            <div class="alert-danger">{!!$errors->first('estudiantes_codigo')!!}</div>
                 @enderror
                     
                     
                 </div>
                   <div class="col">
                     <label for="programa">Programa</label>
                   <input type="text" name="programa" id="programa" value="{{old('programa')}}"  class="form-control @error('programa') is-invalid @enderror" placeholder="Programa">
                   @error('programa')
                            <div class="alert-danger">{!!$errors->first('programa')!!}</div>
                  @enderror
                   </div>
                 </div>
                 <br>
                 <div class="form-row">
                   <div class="col">
                     <label for="inicio">Inicio</label>
                       <input type="date" name="inicio" id="inicio" value="{{old('inicio')}}" class="form-control @error('inicio') is-invalid @enderror" placeholder="Inicio">
                       @error('inicio')
                       <div class="alert-danger">{!!$errors->first('inicio')!!}</div>
                       @enderror
                   </div>
                   <div class="col">
                     <label for="fin">Fin</label>
                       <input type="date"  name="fin" id="fin" value="{{old('fin')}}" class="form-control @error('fin') is-invalid @enderror" placeholder="Fin">
                       @error('fin')
                            <div class="alert-danger">{!!$errors->first('fin')!!}</div>
                       @enderror
                   </div>
                 </div>
               <br>
               <hr>
               <h2>Horarios</h2>
               <hr>
               <div class="form-row">
                   <div class="col">
                     <Label for="dia">Dia</Label>
                       <input type="text" name="dia" id="dia" value="{{old('dia')}}" class="form-control @error('dia') is-invalid @enderror" placeholder="Dia">
                       @error('dia')
                            <div class="alert-danger">{!!$errors->first('dia')!!}</div>
                       @enderror
                   </div>
                   <div class="col">
                     <Label for="h_inicio">Hora De Inicio</Label>
                       <input type="time"  name="h_inicio" id="h_inicio" value="{{old('h_inicio')}}" class="form-control @error('h_inicio') is-invalid @enderror" placeholder="Hora de Inicio">
                       @error('h_inicio')
                            <div class="alert-danger">{!!$errors->first('h_inicio')!!}</div>
                       @enderror
                   </div>
                   
               
                <div class="col">
                  <Label for="h_fin">Hora Final</Label>
                    <input type="time" name="h_fin" id="h_fin"  value="{{old('h_fin')}}" class="form-control @error('h_fin') is-invalid @enderror" placeholder="Hora Final">
                    @error('h_fin')
                         <div class="alert-danger">{!!$errors->first('h_fin')!!}</div>
                    @enderror
                </div>
               </div>
               
               
           
            <div class="row" id="divReportes">

              <Label for="foto"><img src="{{asset('imagenes/pdf.png')}}" alt="error" id="img" ><br>Reportes @error('reportes')
                <div class="alert-danger">{!!$errors->first('reportes')!!}</div>
           @enderror</Label>
                <input type="file"  name="reportes" id="reportes" accept="application/pdf" class="form-control @error('reportes') is-invalid @enderror" placeholder="Reportes">
               
            </div>
           </div>
           <div class="modal-footer">
            <a href="{{route('expedientes.index')}}"><button type="button" class="btn btn-secondary" >Regresar</button></a>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
  </div>
  </form>  
    
@endsection