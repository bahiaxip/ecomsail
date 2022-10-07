<!-- Modal crear usuario -->
<div wire:ignore.self class="modal fade " id="addPermission" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <div class="modal-title h5">
          Crear Permiso
        </div>
      </div>
      <!-- loading cuando actualizamos edición -->
      <div id="loading" style="display: none;width:100%;height:100%;position:absolute;background-color: rgba(0,0,0,.5);z-index:999" >
        <img src="{{url('ics/loading/dualball.svg')}}" alt="" style="margin:auto" width="80">
      </div>
      
        <div class="modal-body permissions">
            <div class="row">
                <div class="col-md-6">
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
                <div class="col-md-6">
                    {{Form::label('slug','Slug')}}
                    <div class="input-group">
                      <span class="input-group-text">
                          <i class="fa-solid fa-keyboard"></i>
                      </span>                  
                      {{Form::text('slug',null,['class' => 'form-control','wire:model' => 'slug'])}}
                    </div>
                    @error('slug')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="row mtop16">
                <div class="col-md-6">
                    {{Form::label('box_permission','Contenedor padre')}}
                    {{Form::select('box_permission',$box_permissions,null,['class' => 'form-select','wire:model' => 'box_permission'])}}                    
                    @error('box_permission')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    {{Form::label('status','Estado')}}
                    {{Form::select('status',get_current_status_select(),null,['class' => 'form-select','wire:model' => 'status'])}}                    
                    @error('status')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="row mtop16">
                <div class="col-12">
                    {{Form::label('description','Descripción')}}
                    {{Form::textarea('description',null,['class' => 'form-control','wire:model' =>'description'])}}
                </div>
                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
          
            <!--<div class="form-group">-->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-sm btn_sail btn_sry" data-bs-dismiss="modal" wire:click.prevent="clear()">Cancelar</button>
          <button type="button" class="btn btn-sm btn-sm btn_sail btn_pry" wire:click="store">Crear</button>
        </div>
      
    </div>
  </div>
</div>