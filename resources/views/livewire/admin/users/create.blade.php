<!-- Modal crear usuario -->
<div wire:ignore.self class="modal fade " id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <div class="modal-title h5">
          Crear Usuario
        </div>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data">
        	<div class="form-group">
        		<label for="name">Nombre</label>
        		<input type="text" name="name" class="form-control" wire:model="name"/>
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
        	</div>
        	<div class="form-group">
        		<label for="surnames">Apellidos</label>
        		<input type="text" name="surnames" class="form-control" wire:model="surnames"/>
        	</div>
        	<!--
          <div class="form-group">
        		<label for="pass">Contraseña</label>
        		<input type="password" name="pass" id="pass" class="form-control" wire:model="pass"/>
            @error('pass')
            <p class="text-danger">{{$message}}</p>
            @enderror
        	</div>
        -->
        	<div class="form-group">
        		<label for="email">Email</label>
        		<input type="text" name="email" class="form-control" wire:model="email"/>
            @error('email')
            <p class="text-danger">{{$message}}</p>
            @enderror
        	</div>
          <!--<div class="form-group " x-data="toggle2()">
            <label>Imagen</label>
            <div class="custom-file">              
              <input type="file" class="custom-file-input" name="file"  x-on:change="testFile($event)" wire:model="file">
              <label class="custom-file-label" for="customFile" data-browse="Seleccionar">Subir Archivo</label>
            </div>
              <p class="text-danger text-center" x-text="errorFile"></p>

          </div>   	-->
        	<div class="form-group">
        		<label for="country">País</label>
        		<select name="country" class="form-control" wire:model="country">
        			<option value="0">Seleccione...</option>
              @foreach($countries as $key=>$countri)
        			<option value="{{$countri}}">{{$countri}}</option>
              @endforeach
        		</select>        		
        	</div>
        		<!-- aparece si el país es España -->
          @if($country=="España")
        	<div class="form-group">
        		<label for="province">Provincia</label>
        		<select name="province" class="form-control" wire:model="province">
        			<option value="0">Seleccione...</option>
              @foreach($provincias as $provincia)
        			<option value="{{$provincia}}">{{$provincia}}</option>
              @endforeach
        		</select>
        	</div>
          @endif
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn_sail btn_sry" data-bs-dismiss="modal" wire:click.prevent="clear2()">Cancelar</button>
        <button type="button" class="btn btn-sm btn_sail btn_pry" wire:click.prevent="store()">Crear</button>
      </div>
    </div>
  </div>
</div>