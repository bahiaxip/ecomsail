<!-- Modal crear usuario -->
<div wire:ignore.self class="modal fade " id="editRole" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <div class="modal-title h5">
          Editar Rol
        </div>
      </div>
      <!-- loading cuando actualizamos edición -->
      <div id="loading" style="display: none;width:100%;height:100%;position:absolute;background-color: rgba(0,0,0,.5);z-index:999" >
        <img src="{{url('ics/loading/dualball.svg')}}" alt="" style="margin:auto" width="80">
      </div>
      <form wire:submit.prevent="update(Object.fromEntries(new FormData($event.target)))">
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
          
          	<!--<div class="form-group">-->
            <div class="row mtop16">
                <div class="col-md-6">
                    {{Form::label('status','Estado')}}
                    {{Form::select('status',get_current_status_select(),null,['class' => 'form-select','wire:model' => 'status'])}}                    
                    @error('status')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
                
            <div class="row mtop16">
                <div class="col-md-12">
                    {{Form::label('description','Descripción')}}
                    
                        </span>
                    
                    {{Form::textarea('description',null,['class' => 'form-control','wire:model' => 'description','style' => 'height:100px'])}}
                    
                    @error('description')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            @php
            $counter = 0;
            $count_box_permissions = $box_permissions->count();
            @endphp
            @foreach($box_permissions as $key => $box_permission)
                @php
                if($counter > 2)
                    $counter = 0;
                
                @endphp
                @if($counter == 0)
                <div class="row mtop16">
                @endif

                <div class="col-lg-4 ">
                    <div class="panel shadow {{$role_id}}">
                        <button class="btn w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{$box_permission->name}}" aria-expanded="false" aria-controls="collapseExample">
                          <i class="fas fa-box-open"></i> {{$box_permission->name}} <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <div class="collapse" id="collapse_{{$box_permission->name}}">
                          <!--
                          <div class="header">
                            <h2 class="title"><i class="fas fa-box-open"></i> Productos</h2>
                          </div>
                          -->
                            <div class="box">            
                                {{--
                                <div class="form-check">
                                  {{ Form::checkbox('list_products',true,null,['class' => 'form-check-input','id' => 'list_products']) }}
                                  {{ Form::label('list_products','Listar productos') }}
                                </div>

                                <div class="form-check">
                                    {{ Form::checkbox('add_products',true,null,['class' => 'form-check-input','id' => 'add_products']) }}
                                    {{ Form::label('add_products','Crear productos') }}
                                </div>

                                <div class="form-check">
                                    {{ Form::checkbox('edit_products',true,null,['class' => 'form-check-input','id' => 'edit_products']) }}
                                    {{ Form::label('edit_products','Editar productos') }}
                                </div>

                                <div class="form-check">
                                    {{ Form::checkbox('delete_products',true,null,['class' => 'form-check-input','id' => 'delete_products']) }}
                                    {{ Form::label('delete_products','Eliminar productos') }}
                                </div>

                                <div class="form-check">
                                    {{ Form::checkbox('restore_products',true,null,['class' => 'form-check-input','id' => 'restore_products']) }}
                                    {{ Form::label('restore_products','Restaurar productos') }}
                                </div>
                                --}}
                                @foreach($permissions[$box_permission->id] as $p)
                                <div class="form-check">
                                  {{ Form::checkbox($p->id,true,(helper()->testRole($role_id,$p->slug) || $role_special == 'all') ? 'checked' : '' ,['class' => 'form-check-input','id' => $p->slug]) }}
                                  {{ Form::label($p->slug,$p->name) }}
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                
                @if($counter == 2 || $key == $count_box_permissions-1)
                </div>
                @endif
                @php $counter++ @endphp
            @endforeach
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-sm btn_sail btn_sry" data-bs-dismiss="modal" wire:click.prevent="clear2">Cancelar</button>
          <button type="submit" class="btn btn-sm btn-sm btn_sail btn_pry">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>