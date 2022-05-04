<!-- Modal crear usuario -->
<div wire:ignore.self class="modal fade " id="editCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <div class="modal-title h5">
          Editar Categoría
        </div>
      </div>
      @if(!$cat_id)
      <div style="display: flex;width:100%;height:100%;position:absolute;background-color: rgba(0,0,0,.5);z-index:999" >
        <img src="{{url('icons/spinner2.svg')}}" alt="" style="margin:auto" width="100">
      </div>
      @endif
      <!-- loading cuando actualizamos edición -->
      <div id="loading" style="display: none;width:100%;height:100%;position:absolute;background-color: rgba(0,0,0,.5);z-index:999" >
        <img src="{{url('icons/spinner2.svg')}}" alt="" style="margin:auto" width="100">
      </div>
      <div class="modal-body">              
          {{ Form::hidden('cat_id',$cat_id,['wire:model' => 'cat_id']) }}

          <div class="row">
            	<div class="col-md-6">
            		<label for="name">Nombre</label>
            		<input type="text" name="name" class="form-control" wire:model="name"/>
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            	</div>        	
              <div class="col-md-6">
            		<label for="type">Categoría padre</label>
            		
                <!--
                <select name="type" class="form-select" wire:model="type">
                  <option value="0">Categoría</option>
                  <option value="1">Subcategoría</option>
                </select>
              -->
              {{ Form::select('type',$cats,null,['class' => 'form-select', 'wire:model' => 'type'])}}
            	</div>
          <!--<div class="form-group">
            <label for="status">Estado</label>
            {{ Form::select('status',[0 => 'Borrador',1 => 'Público'],null,['class' => 'form-select', 'wire:model' => 'status'])}}
          </div>-->
          </div>
          <div class="row mtop16">
              <div class="col-md-6">
                  <label for="icon" >Default file input example</label>
                    <!--<label for="icon" class="mtop16">Icono:</label>-->
                    <!--<div class="form-file">                      
                      <input class="form-control" type="file" id="formFile" wire:model="icon">
                    </div>-->
                  
                  {!! Form::file('icon',['class' =>'form-control','id' => '$iteration','accept' =>'image/*','wire:model' => 'icon'])!!}
                  @error('icon')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  <div wire:loading wire:target="icon">
                    <img src="{{url('icons/spinner2.svg')}}" alt="" style="margin:auto" width="32">
                </div>
              </div>      
              <div class="col-md-6">
                  <label for="status">Estado</label>
                  <div class="input-group">                    
                    {{ Form::select('status',[0 => 'Borrador',1 => 'Público'],null,['class' => 'form-select', 'wire:model' => 'status'])}}
                  </div>  
              </div>
          </div>
          <div class="row mtop16">
              <div class="col-md-12" wire:ignore>
                  <label for="description">Descripción</label>
                  {{ Form::textarea('description',null,['class' => 'form-control','id' =>'friendly_edit2','wire:model.lazy' => "datos"])}}
                  @error('description')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
              </div>
              <script>
                //ckeditor genera conflicto con wire:model, para ello 
                //creamos el siguiente script para establecer la propiedad
                //description desde JavaScript
                document.addEventListener('DOMContentLoaded',() => {
                    //en el modal create llamamos a una función externa
                    //en edit lo metemos directamente, eliminamos del segundo
                    //objeto el string 'Image','Link'y 'Unlink'  temporalmente
                    CKEDITOR.replace('friendly_edit2',{
                      toolbar:[
                      { name:'clipboard', items:['Cut','Copy','Paste','PasteText','-','Undo','Redo']},
                      { name: 'basicstyles',items:['Bold','Italic','BulletedList','Strike','Blockquote']},
                      { name: 'document', items:['CodeSnippet','EmojiPanel','Preview','Source']}
                      ]
                    });
                    CKEDITOR.instances.friendly_edit2.on('change',function(e){
                        @this.description=this.getData();
                    });
                })
                
              </script>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" wire:click.prevent="clear2()">Cancelar</button>
        <button type="button" class="btn btn-sm back_livewire2 btn-primary" wire:click.prevent="update()">Actualizar</button>
      </div>
    </div>
  </div>
</div>
@push('scripts')
<script>
  //mostramos el loading duplicado al actualizar y ocultamos al comenzar el método update()
  let btn_update=document.querySelector('#btn_update');
  if(btn_update){
    btn_update.addEventListener('click',()=>{
      let loading = document.querySelector('#loading');
      loading.style.display='flex';
    })
  }
</script>
@endpush