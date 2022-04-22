<div wire:ignore.self class="modal fade " id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <div class="modal-title h5">
          Editar Usuario
        </div>
      </div>
      <div class="modal-body">
        
          <!-- campo oculto: id -->
          <input type="hidden" name="id" wire:model="user_id">
          
          <div class="form-group">
            <label for="nick">Nick</label>
            <input type="text" name="nick" id="nick" class="form-control" wire:model="nick"/>
            @error('nick')
            <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
          
        	<div class="form-group">
        		<label for="name">Nombre</label>
        		<input type="text" name="name" id="name" class="form-control" wire:model="name"/>
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
        	</div>
        	<div class="form-group">
        		<label for="surname">Apellidos</label>
        		<input type="text" name="surname" id="surname" class="form-control" wire:model="surname"/>
        	</div>
  <!-- ignoramos pass e email en la edición por seguridad -->
        	<!--
          <div class="form-group">
        		<label for="email">Email</label>
        		<input type="text" name="email" id="email" class="form-control" wire:model="email"/>
            @error('email')
            <p class="text-danger">{{$message}}</p>
            @enderror
        	</div>
          -->
          <!--
          <div class="form-group" x-data="toggle2()">
            <label>Imagen</label>
            <div class="custom-file">              
              <input type="file" class="custom-file-input" name="file" id="customFile" x-on:change="testFile($event)" wire:model="file">
              <label class="custom-file-label" for="customFile" data-browse="Seleccionar">Subir Archivo</label>          
            </div>

            <p class="text-danger text-center" x-text="errorFile"></p>
          </div>-->
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" wire:click.prevent="clear()">Cerrar</button>
        <button type="button" class="btn btn-sm btn-primary back_livewire2 " wire:click.prevent="update()">Actualizar</button>
      </div>
    </div>
  </div>
</div>