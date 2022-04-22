<!-- Modal crear usuario -->
<div wire:ignore.self class="modal fade " id="editCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <div class="modal-title h5">
          Editar Categoría
        </div>
      </div>
      <div class="modal-body">
          {{ Form::hidden('cat_id',$cat_id,['wire:model' => 'cat_id']) }}

        	<div class="form-group">
        		<label for="name">Nombre</label>
        		<input type="text" name="name" class="form-control" wire:model="name"/>
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
        	</div>
        	<div class="form-group">
        		<label for="type">Tipo</label>
        		
            <!--
            <select name="type" class="form-select" wire:model="type">
              <option value="0">Categoría</option>
              <option value="1">Subcategoría</option>
            </select>
          -->
          {{ Form::select('type',["0"=> 'Categoría',"1" => 'Subcategoría'],null,['class' => 'form-select', 'wire:model' => 'type'])}}
          
            
        	</div>

          <div class="form-group">
            <label for="status">Estado</label>
            {{ Form::select('status',[0 => 'Borrador',1 => 'Público'],null,['class' => 'form-select', 'wire:model' => 'status'])}}
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" wire:click.prevent="clear2()">Cancelar</button>
        <button type="button" class="btn btn-sm back_livewire2 btn-primary" wire:click.prevent="update()">Actualizar</button>
      </div>
    </div>
  </div>
</div>