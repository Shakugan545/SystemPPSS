<div class="modal fade" id="edit{{$estu->codigo}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">EDITAR ESTUDIANTE</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form  method="post"  action="{{route('estudiantes.update',$estu->codigo)}}">
                @method('PUT')
                {{ @csrf_field() }}
                <div class="col">
                       <div class="card card-body text-center">
                        <div class="card-title text-center bg-success" >
                          
                        </div>
                           <div class="form-row">
                             <div class="col">
                                 <label for="codigo">Codigo</label>
                             <input type="text" name="codigo" id="codigo" value="{{$estu->codigo}}" class="form-control @error('codigo') is-invalid @enderror " placeholder="Codigo">
                                 @error('codigo')
                                 <div class="alert-danger">{!!$errors->first('codigo')!!}</div>
                                 @enderror
                             </div>
                               <div class="col">
                                 <label for="nombres">nombres</label>
                               <input type="text" name="nombre" id="nombre" value="{{$estu->nombre}}" class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre">
                               @error('nombre')
                               <div class="alert-danger"></div>
                               @enderror
                               </div>
                             </div>
                             <br>
                             <br>
                             <div class="form-row">
                               <div class="col">
                                 <label for="telefono">Telefono</label>
                                   <input type="text" name="telefono" id="telefono" value="{{ $estu->telefono}}" class="form-control @error('telefono') is-invalid @enderror" placeholder="telefono">
                                   @error('telefono')
                                   <div class="alert-danger">Telefono</div>
                                   @enderror
                               </div>
                               <div class="col">
                                 <label for="correo">Correo</label>
                                   <input type="text"  name="correo" id="correo" value="{{ $estu->correo}}" class="form-control @error('am') is-invalid @enderror" placeholder="correo">
                                   @error('correo')
                               <div class="alert-danger">Correo</div>
                               @enderror
                               </div>
                             </div>
                           <br>
                           <br>
                           <div class="form-row">
                               <div class="col">
                                 <Label for="carrera">carrera</Label>
                                   <input type="text" name="carrera" id="carrera" value="{{ $estu->carrera}}" class="form-control @error('carrera') is-invalid @enderror" placeholder="carrera">
                                   @error('carrera')
                                  <div class="alert-danger">Carrera</div>
                                  @enderror
                               </div>
                               <div class="col">
                                 <Label for="foto">foto</Label>
                                   <input type="text"  name="foto" id="foto" value="{{ $estu->foto}}" class="form-control @error('foto') is-invalid @enderror" placeholder="foto">
                                   @error('foto')
                                   <div class="alert-danger">Ingresa una foto</div>
                                   @enderror
                               </div>
                           </div>
                           
        
                       </div>
              
              
                       <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Editar</button>
                      </div>
              
              </div>
              </form>
              
        </div>
       
      </div>
    </div>
  </div>
