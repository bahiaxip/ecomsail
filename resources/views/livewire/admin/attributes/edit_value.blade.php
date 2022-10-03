<!-- Modal crear usuario -->
<div wire:ignore.self class="modal fade " id="editAttribute" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header justify-content-center">
          <div class="modal-title h5">
            Editar Atributo
          </div>
        </div>
      <!-- loading cuando actualizamos edición -->
        <div id="loading" class="div_loading loading_update">
          <img src="{{url('ics/loading/dualball.svg')}}" alt="dualball.svg">
        </div>      
      <div class="modal-body">
          <form enctype="multipart/form-data">
        	<!--<div class="form-group">-->
            <div class="row">
                <div class="col-md-12">
                    <label for="name">Nombre</label>
                    <div class="input-group">
                        <span class="input-group-text">
                          <i class="fa-solid fa-keyboard"></i>
                        </span>
                		    <input type="text" name="name" class="form-control" wire:model="name"/>
                    </div>
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
          	</div>
            <div class="row">
                <div class="col-md-12">
                    <label for="type">Categoría padre</label>
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-keyboard"></i>
                      </span>
                      
                      <select name="type" class="form-select" wire:model="parent_attr">
                        <option value="0">Atributo 1</option>
                        <option value="1">Atributo 2</option>
                      </select>
                      
                      {{--{{ Form::select('type',$cats,'null',['class' => 'form-select', 'wire:model' => 'type'])}}--}}
                    </div>
                  </div>
            </div>
            <div class="row mtop16">
                <div class="col-md-12">
                    <label for="status">Estado</label>
                    <div class="input-group">                    
                      {{ Form::select('status',[0 => 'Borrador',1 => 'Público'],null,['class' => 'form-select', 'wire:model' => 'status'])}}
                    </div>  
                </div>
            </div>
            <div class="row mtop16">
              <div class="col-md-12" wire:ignore>
                <label for="description">Descripción</label>
                {{ Form::textarea('description',null,['class' => 'form-control description','id' =>'friendly_edit2'])}}
                
                <script>
                  //ckeditor genera conflicto con wire:model, para ello 
                  //creamos el siguiente script para establecer la propiedad
                  //description desde JavaScript
                  //CKEDITOR.replace('friendly_edit1');
                  editor_init('friendly_edit2');
                  CKEDITOR.instances.friendly_edit2.on('change',function(e){
                      @this.description=this.getData();
                  });                
                  
                </script>
                
              </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn_sail btn_sry" data-bs-dismiss="modal" wire:click.prevent="clear2()">Cancelar</button>
        <button type="button" class="btn btn-sm btn_sail btn_pry" wire:click.prevent="update(1)">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<script>
  //mostramos el loading duplicado al actualizar y ocultamos al comenzar el método update()
  /*
  let btn_update=document.querySelector('#btn_update');
  if(btn_update){
    btn_update.addEventListener('click',()=>{
      let loading = document.querySelector('#loading');
      loading.style.display='flex';
    })
  }
  */
</script>