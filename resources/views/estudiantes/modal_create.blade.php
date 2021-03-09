  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">AGREGAR NUEVO ESTUDIANTE</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form  method="post" id="formCreate" action="{{route('estudiantes.store')}}">
               
                {{ @csrf_field() }}
                <div class="col">
                       <div class="card card-body text-center ">
                        <div class="card-title text-center bg-success" >
                          <h2>Crear</h2>
                        </div>
                           <div class="form-row">
                             <div class="col">
                                 <label for="codigo">Codigo</label>
                             <input type="text" name="codigo" id="codigo"  class="form-control" placeholder="Codigo">
                                 <label for="label" id="lbcodigo"></label>
                                 
                             </div>
                               <div class="col">
                                 <label for="nombres">nombres</label>
                               <input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Nombre">
                               <label for="" id="lbnombre"></label>
                               </div>
                             </div>
                             <br>
                             <div class="form-row">
                               <div class="col">
                                 <label for="telefono">Telefono</label>
                                   <input type="text" name="telefono" id="telefono" class="form-control" placeholder="telefono">
                                   <label for="" id="lbtelefono"></label>
                               </div>
                               <div class="col">
                                 <label for="correo">Correo</label>
                                   <input type="text"  name="correo" id="correo" class="form-control" placeholder="correo">
                                   <label for="" id="lbcorreo"></label>
                               </div>
                             </div>
                           <br>
                           <div class="form-row">
                               <div class="col">
                                 <Label for="carrera">carrera</Label>
                                   <input type="text" name="carrera" id="carrera" class="form-control" placeholder="carrera">
                                   <label for="" id="lbcarrera"></label>
                               </div>
                               <div class="col">
                                 <Label for="foto">foto</Label>
                                   <input type="text"  name="foto" id="foto" class="form-control" placeholder="foto">
                                   <label for="" id="lbfoto"></label>
                               </div>
                           </div>
                       </div>
                       <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                      </div>
              </div>
              </form>  
        </div>
      </div>
    </div>
  </div>
