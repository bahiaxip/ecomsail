<!-- Modal crear usuario -->
<div wire:ignore.self class="modal fade " id="addRol" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <div class="modal-title h5">
          Crear Role
        </div>
      </div>
      <!-- loading cuando actualizamos edición -->
      <div id="loading" style="display: none;width:100%;height:100%;position:absolute;background-color: rgba(0,0,0,.5);z-index:999" >
        <img src="{{url('ics/loading/dualball.svg')}}" alt="" style="margin:auto" width="80">
      </div>
      <form wire:submit.prevent="store(Object.fromEntries(new FormData($event.target)))">
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
                <div class="col-md-12">
                    {{Form::label('description','Descripción')}}
                    
                        </span>
                    
                    {{Form::textarea('description',null,['class' => 'form-control','wire:model' => 'description','style' => 'height:100px'])}}
                    
                    @error('description')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="row mtop16">
                <div class="col-lg-4 ">
                    <div class="panel shadow">
                        <button class="btn w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_analysis" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa-sharp fa-solid fa-chart-simple"></i></i> Análisis <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <div class="collapse" id="collapse_analysis">
                            <!--
                            <div class="header">
                              <h2 class="title"><i class="fas fa-box-open"></i> Productos</h2>
                            </div>
                            -->
                            <div class="box">            
                                <div class="form-check">
                                  {{ Form::checkbox('list_home',null,null,['class' => 'form-check-input','id' => 'list_home']) }}
                                  {{ Form::label('list_home','Visualizar análisis') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 ">
                    <div class="panel shadow">
                        <button class="btn w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_products" aria-expanded="false" aria-controls="collapseExample">
                          <i class="fas fa-box-open"></i> Productos <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <div class="collapse" id="collapse_products">
                          <!--
                          <div class="header">
                            <h2 class="title"><i class="fas fa-box-open"></i> Productos</h2>
                          </div>
                          -->
                            <div class="box">            
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
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 ">
                    <div class="panel shadow">
                        <button class="btn w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_orders" aria-expanded="false" aria-controls="collapseExample">
                          <i class="fas fa-bag-shopping"></i> Pedidos <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <div class="collapse" id="collapse_orders">
                            <!--
                            <div class="header">
                              <h2 class="title"> Categorías</h2>
                            </div>
                            -->
                            <div class="box">            
                                <div class="form-check">
                                  {{ Form::checkbox('list_orders',true,null,['class' => 'form-check-input','id' => 'list_orders']) }}
                                  {{ Form::label('list_orders','Listar pedidos') }}
                                </div>

                                <div class="form-check">
                                    {{ Form::checkbox('delete_orders',true,null,['class' => 'form-check-input','id' => 'delete_orders']) }}
                                    {{ Form::label('delete_orders','Eliminar pedidos') }}
                                </div>

                                <div class="form-check">
                                    {{ Form::checkbox('restore_orders',true,null,['class' => 'form-check-input','id' => 'restore_orders']) }}
                                    {{ Form::label('restore_orders','Restaurar pedidos') }}
                                </div>
                            </div>
                        </div>                      
                    </div>
                </div>
            </div>
            <div class="row mtop16">
                <div class="col-lg-4 ">
                    <div class="panel shadow">
                        <button class="btn w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_invoices" aria-expanded="false" aria-controls="collapseExample">
                          <i class="fas fa-file-invoice"></i> Facturas <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <div class="collapse" id="collapse_invoices">
                            <!--
                            <div class="header">
                              <h2 class="title"><i class="fas fa-box-open"></i> Productos</h2>
                            </div>
                            -->
                            <div class="box">            
                              <div class="form-check">
                                {{ Form::checkbox('list_invoices',true,null,['class' => 'form-check-input','id' => 'list_invoices']) }}
                                {{ Form::label('list_invoices','Listar facturas') }}
                              </div>

                              <div class="form-check">
                                  {{ Form::checkbox('delete_invoices',true,null,['class' => 'form-check-input','id' => 'delete_invoices']) }}
                                  {{ Form::label('delete_invoices','Eliminar facturas') }}
                              </div>

                              <div class="form-check">
                                  {{ Form::checkbox('restore_invoices',true,null,['class' => 'form-check-input','id' => 'restore_invoices']) }}
                                  {{ Form::label('restore_invoices','Restaurar facturas') }}
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
                    
                <div class="col-lg-4">
                    <div class="panel shadow">
                        <button class="btn w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_categories" aria-expanded="false" aria-controls="collapseExample">
                          <i class="fas fa-tags"></i> Categorías <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <div class="collapse" id="collapse_categories">
                            <!--
                            <div class="header">
                              <h2 class="title"> Categorías</h2>
                            </div>
                            -->
                            <div class="box">            
                                <div class="form-check">
                                  {{ Form::checkbox('list_categories',true,null,['class' => 'form-check-input','id' => 'list_categories']) }}
                                  {{ Form::label('list_categories','Listar categorías') }}
                                </div>

                                <div class="form-check">
                                    {{ Form::checkbox('add_categories',true,null,['class' => 'form-check-input','id' => 'add_categories']) }}
                                    {{ Form::label('add_categories','Crear categorías') }}
                                </div>

                                <div class="form-check">
                                    {{ Form::checkbox('edit_categories',true,null,['class' => 'form-check-input','id' => 'edit_categories']) }}
                                    {{ Form::label('edit_categories','Editar categorías') }}
                                </div>

                                <div class="form-check">
                                    {{ Form::checkbox('delete_categories',true,null,['class' => 'form-check-input','id' => 'delete_categories']) }}
                                    {{ Form::label('delete_categories','Eliminar categorías') }}
                                </div>

                                <div class="form-check">
                                    {{ Form::checkbox('restore_categories',true,null,['class' => 'form-check-input','id' => 'restore_categories']) }}
                                    {{ Form::label('restore_categories','Eliminar categorías') }}
                                </div>
                            </div>
                        </div>                      
                    </div>
                </div>

                <div class="col-lg-4 ">
                    <div class="panel shadow">
                        <button class="btn w-100 collapse_attributes" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_attributes" aria-expanded="false" aria-controls="collapseExample">
                            <div class="div_icon_attributes">
                                <div class="icon icon_value"></div> 
                                <span>Atributos</span>
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                        </button>
                        <div class="collapse" id="collapse_attributes">
                            <!--
                            <div class="header">
                              <h2 class="title"><i class="fas fa-box-open"></i> Productos</h2>
                            </div>
                            -->
                            <div class="box">            
                                <div class="form-check">
                                  {{ Form::checkbox('list_attributes',true,null,['class' => 'form-check-input','id' => 'list_attributes']) }}
                                  {{ Form::label('list_attributes','Listar atributos') }}
                                </div>

                                <div class="form-check">
                                    {{ Form::checkbox('add_attributes',true,null,['class' => 'form-check-input','id' => 'add_attributes']) }}
                                    {{ Form::label('add_attributes','Crear atributos') }}
                                </div>

                                <div class="form-check">
                                    {{ Form::checkbox('edit_attributes',true,null,['class' => 'form-check-input','id' => 'edit_attributes']) }}
                                    {{ Form::label('edit_attributes','Editar atributos') }}
                                </div>

                                <div class="form-check">
                                    {{ Form::checkbox('delete_attributes',true,null,['class' => 'form-check-input','id' => 'delete_attributes']) }}
                                    {{ Form::label('delete_attributes','Eliminar atributos') }}
                                </div>

                                <div class="form-check">
                                    {{ Form::checkbox('restore_attributes',true,null,['class' => 'form-check-input','id' => 'restore_attributes']) }}
                                    {{ Form::label('restore_attributes','Restaurar atributos') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mtop16">
                <div class="col-lg-4 ">
                    <div class="panel shadow">
                        <button class="btn w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_users" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fas fa-user-friends"></i> Usuarios <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <div class="collapse" id="collapse_users">
                            <!--
                            <div class="header">
                              <h2 class="title"><i class="fas fa-user-friends"></i> Usuarios</h2>
                            </div>
                            -->
                            <div class="box">            
                                <div class="form-check">
                                  {{ Form::checkbox('list_users',"true",null,['class' => 'form-check-input','id' => 'list_users']) }}
                                  {{ Form::label('list_users','Listar usuarios') }}
                                </div>

                                <div class="form-check">
                                    {{ Form::checkbox('edit_users',"true",null,['class' => 'form-check-input','id' => 'edit_users']) }}
                                    {{ Form::label('edit_users','Editar usuarios') }}
                                </div>

                                <div class="form-check">
                                    {{ Form::checkbox('admin_permissions',"true",null,['class' => 'form-check-input','id' => 'admin_permissions']) }}
                                    {{ Form::label('admin_permissions','Administrar permisos') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="col-lg-4 ">
                    <div class="panel shadow">
                        <button class="btn w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_locations" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fas fa-location-dot"></i> Ubicaciones <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <div class="collapse" id="collapse_locations">
                            <!--
                            <div class="header">
                              <h2 class="title"><i class="fas fa-box-open"></i> Productos</h2>
                            </div>
                            -->
                            <div class="box">            
                                <div class="form-check">
                                  {{ Form::checkbox('list_locations',true,null,['class' => 'form-check-input','id' => 'list_locations']) }}
                                  {{ Form::label('list_locations','Listar ubicaciones') }}
                                  {{-- para no tener conflictos con el middleware, ya que requiere la 
                                  coincidencia del routename con el nombre del permiso, lo añadimos 
                                  con input hidden y permitimos que el permiso list_locations 
                                  funcione tb con list_cities, no es necesario los demás, pk en 
                                  livewire solo existe una única ruta (list_users, list_locations,etc..--}}
                                  {{Form::hidden('list_cities',true)}}
                                </div>

                                <div class="form-check">
                                    {{ Form::checkbox('add_locations',true,null,['class' => 'form-check-input','id' => 'add_locations']) }}
                                    {{ Form::label('add_locations','Crear ubicaciones') }}
                                    {{Form::hidden('list_cities',true)}}
                                </div>

                                <div class="form-check">
                                    {{ Form::checkbox('edit_locations',true,null,['class' => 'form-check-input','id' => 'edit_locations']) }}
                                    {{ Form::label('edit_locations','Editar ubicaciones') }}
                                </div>

                                <div class="form-check">
                                    {{ Form::checkbox('delete_locations',true,null,['class' => 'form-check-input','id' => 'delete_locations']) }}
                                    {{ Form::label('delete_locations','Eliminar ubicaciones') }}
                                </div>

                                <div class="form-check">
                                    {{ Form::checkbox('restore_locations',true,null,['class' => 'form-check-input','id' => 'restore_locations']) }}
                                    {{ Form::label('restore_locations','Restaurar ubicaciones') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="panel shadow" >
                        <button class="btn w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_adminpanel" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa-solid fa-lock"></i> Admin <i class="fa-solid fa-chevron-down"></i>
                        </button>  
                        <div class="collapse" id="collapse_adminpanel">
                          <!--
                          <div class="header">
                            <h2 class="title"><i class="fa-solid fa-lock"></i> Admin</h2>
                          </div>
                          -->
                            <div class="box">
                                <div class="form-check">
                                {{ Form::checkbox('admin_panel',"true",null,['class' => 'form-check-input','id' => 'admin_panel']) }}
                                {{ Form::label('admin_panel','Inicio') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-sm btn_sail btn_sry" data-bs-dismiss="modal" wire:click.prevent="clear()">Cancelar</button>
          <button type="submit" class="btn btn-sm btn-sm btn_sail btn_pry">Crear</button>
        </div>
      </form>
    </div>
  </div>
</div>