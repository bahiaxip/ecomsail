<div wire:ignore.self class="modal fade " id="editPermissions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-xl ">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <div class="modal-title h5">
          Editar Permisos
        </div>
      </div>
      <!-- loading cuando comienza la edición -->
      @if(!$this->permissions3)
      <div class="div_loading loading_edit"  >
        <img src="{{url('ics/loading/dualball.svg')}}" alt="dualball.svg" >
      </div>
      @endif
      <!-- loading cuando actualizamos edición -->
      <div id="loading_permissions" class="div_loading loading_update" >
        <img src="{{url('ics/loading/dualball.svg')}}" alt="dualball.svg">
      </div>
      
      <div class="modal-body permissions">
          <form wire:submit.prevent="update_permissions(Object.fromEntries(new FormData($event.target)))">
            @csrf
                <!-- campo oculto: id -->
                <input type="hidden" name="id" wire:model="user_id">
                <div class="row">

                  <div class="col-lg-4">                    
                    
                    <div class="panel shadow">
                      <button class="btn w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_home" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa-solid fa-lock"></i> Home <i class="fa-solid fa-chevron-down"></i>
                      </button>  
                      <div class="collapse" id="collapse_home">
                        <!--
                        <div class="header">
                          <h2 class="title"><i class="fa-solid fa-lock"></i> Admin</h2>
                        </div>
                        -->
                        <div class="box">
                          <div class="form-check">
                          {{ Form::checkbox('list_home',"true",($this->role_permissions->testPermission($this->permissions3,'list_home')) ? 'checked':'',['class' => 'form-check-input','id' => 'list_home']) }}
                          {{ Form::label('list_home','Inicio') }}
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
                              {{ Form::checkbox('list_products',true,($this->role_permissions->testPermission($this->permissions3,'list_products')) ? 'checked':'',['class' => 'form-check-input','id' => 'list_products']) }}
                              {{ Form::label('list_products','Listar productos') }}
                            </div>

                            <div class="form-check">
                                {{ Form::checkbox('add_products',true,($this->role_permissions->testPermission($this->permissions3,'add_products')) ? 'checked':'',['class' => 'form-check-input','id' => 'add_products']) }}
                                {{ Form::label('add_products','Crear productos') }}
                            </div>

                            <div class="form-check">
                                {{ Form::checkbox('edit_products',true,($this->role_permissions->testPermission($this->permissions3,'edit_products')) ? 'checked':'',['class' => 'form-check-input','id' => 'edit_products']) }}
                                {{ Form::label('edit_products','Editar productos') }}
                            </div>

                            <div class="form-check">
                                {{ Form::checkbox('delete_products',true,($this->role_permissions->testPermission($this->permissions3,'delete_products')) ? 'checked':'',['class' => 'form-check-input','id' => 'delete_products']) }}
                                {{ Form::label('delete_products','Eliminar productos') }}
                            </div>

                            <div class="form-check">
                                {{ Form::checkbox('restore_products',true,($this->role_permissions->testPermission($this->permissions3,'restore_products')) ? 'checked':'',['class' => 'form-check-input','id' => 'restore_products']) }}
                                {{ Form::label('restore_products','Restaurar productos') }}
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-4">
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
                                {{ Form::checkbox('list_orders',true,($this->role_permissions->testPermission($this->permissions3,'list_orders')) ? 'checked':'',['class' => 'form-check-input','id' => 'list_orders']) }}
                                {{ Form::label('list_orders','Listar pedidos') }}
                              </div>

                              <div class="form-check">
                                  {{ Form::checkbox('delete_orders',true,($this->role_permissions->testPermission($this->permissions3,'delete_orders')) ? 'checked':'',['class' => 'form-check-input','id' => 'delete_orders']) }}
                                  {{ Form::label('delete_orders','Eliminar pedidos') }}
                              </div>

                              <div class="form-check">
                                  {{ Form::checkbox('restore_orders',true,($this->role_permissions->testPermission($this->permissions3,'restore_orders')) ? 'checked':'',['class' => 'form-check-input','id' => 'restore_orders']) }}
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
                              {{ Form::checkbox('list_invoices',true,($this->role_permissions->testPermission($this->permissions3,'list_invoices')) ? 'checked':'',['class' => 'form-check-input','id' => 'list_invoices']) }}
                              {{ Form::label('list_invoices','Listar facturas') }}
                            </div>

                            <div class="form-check">
                                {{ Form::checkbox('delete_invoices',true,($this->role_permissions->testPermission($this->permissions3,'delete_invoices')) ? 'checked':'',['class' => 'form-check-input','id' => 'delete_invoices']) }}
                                {{ Form::label('delete_invoices','Eliminar facturas') }}
                            </div>

                            <div class="form-check">
                                {{ Form::checkbox('restore_invoices',true,($this->role_permissions->testPermission($this->permissions3,'restore_invoices')) ? 'checked':'',['class' => 'form-check-input','id' => 'restore_invoices']) }}
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
                                {{ Form::checkbox('list_categories',true,($this->role_permissions->testPermission($this->permissions3,'list_categories')) ? 'checked':'',['class' => 'form-check-input','id' => 'list_categories']) }}
                                {{ Form::label('list_categories','Listar categorías') }}
                              </div>

                              <div class="form-check">
                                  {{ Form::checkbox('add_categories',true,($this->role_permissions->testPermission($this->permissions3,'add_categories')) ? 'checked':'',['class' => 'form-check-input','id' => 'add_categories']) }}
                                  {{ Form::label('add_categories','Crear categorías') }}
                              </div>

                              <div class="form-check">
                                  {{ Form::checkbox('edit_categories',true,($this->role_permissions->testPermission($this->permissions3,'edit_categories')) ? 'checked':'',['class' => 'form-check-input','id' => 'edit_categories']) }}
                                  {{ Form::label('edit_categories','Editar categorías') }}
                              </div>

                              <div class="form-check">
                                  {{ Form::checkbox('delete_categories',true,($this->role_permissions->testPermission($this->permissions3,'delete_categories')) ? 'checked':'',['class' => 'form-check-input','id' => 'delete_categories']) }}
                                  {{ Form::label('delete_categories','Eliminar categorías') }}
                              </div>

                              <div class="form-check">
                                  {{ Form::checkbox('restore_categories',true,($this->role_permissions->testPermission($this->permissions3,'restore_categories')) ? 'checked':'',['class' => 'form-check-input','id' => 'restore_categories']) }}
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
                              {{ Form::checkbox('list_attributes',true,($this->role_permissions->testPermission($this->permissions3,'list_attributes')) ? 'checked':'',['class' => 'form-check-input','id' => 'list_attributes']) }}
                              {{ Form::label('list_attributes','Listar atributos') }}
                            </div>

                            <div class="form-check">
                                {{ Form::checkbox('add_attributes',true,($this->role_permissions->testPermission($this->permissions3,'add_attributes')) ? 'checked':'',['class' => 'form-check-input','id' => 'add_attributes']) }}
                                {{ Form::label('add_attributes','Crear atributos') }}
                            </div>

                            <div class="form-check">
                                {{ Form::checkbox('edit_attributes',true,($this->role_permissions->testPermission($this->permissions3,'edit_attributes')) ? 'checked':'',['class' => 'form-check-input','id' => 'edit_attributes']) }}
                                {{ Form::label('edit_attributes','Editar atributos') }}
                            </div>

                            <div class="form-check">
                                {{ Form::checkbox('delete_attributes',true,($this->role_permissions->testPermission($this->permissions3,'delete_attributes')) ? 'checked':'',['class' => 'form-check-input','id' => 'delete_attributes']) }}
                                {{ Form::label('delete_attributes','Eliminar atributos') }}
                            </div>

                            <div class="form-check">
                                {{ Form::checkbox('restore_attributes',true,($this->role_permissions->testPermission($this->permissions3,'restore_attributes')) ? 'checked':'',['class' => 'form-check-input','id' => 'restore_attributes']) }}
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
                              {{ Form::checkbox('list_users',"true",($this->role_permissions->testPermission($this->permissions3,'list_users')) ? 'checked':'',['class' => 'form-check-input','id' => 'list_users','wire:model'=>$this->permissions['users']['list_users']]) }}
                              {{ Form::label('list_users','Listar usuarios') }}
                            </div>

                            <div class="form-check">
                                {{ Form::checkbox('edit_users',"true",($this->role_permissions->testPermission($this->permissions3,'edit_users')) ? 'checked':'',['class' => 'form-check-input','id' => 'edit_users','wire:model'=>$this->permissions['users']['edit_users']]) }}
                                {{ Form::label('edit_users','Editar usuarios') }}
                            </div>

                            <div class="form-check">
                                {{ Form::checkbox('admin_permissions',"true",($this->role_permissions->testPermission($this->permissions3,'admin_permissions')) ? 'checked':'',['class' => 'form-check-input','id' => 'admin_permissions','wire:model'=>$this->permissions['users']['list_users']]) }}
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
                              {{ Form::checkbox('list_locations',true,($this->role_permissions->testPermission($this->permissions3,'list_locations')) ? 'checked':'',['class' => 'form-check-input','id' => 'list_locations']) }}
                              {{ Form::label('list_locations','Listar ubicaciones') }}
                              {{-- para no tener conflictos con el middleware, ya que requiere la 
                              coincidencia del routename con el nombre del permiso, lo añadimos 
                              con input hidden y permitimos que el permiso list_locations 
                              funcione tb con list_cities, no es necesario los demás, pk en 
                              livewire solo existe una única ruta (list_users, list_locations,etc..--}}
                              {{Form::hidden('list_cities',true)}}
                            </div>

                            <div class="form-check">
                                {{ Form::checkbox('add_locations',true,($this->role_permissions->testPermission($this->permissions3,'add_locations')) ? 'checked':'',['class' => 'form-check-input','id' => 'add_locations']) }}
                                {{ Form::label('add_locations','Crear ubicaciones') }}
                                {{Form::hidden('list_cities',true)}}
                            </div>

                            <div class="form-check">
                                {{ Form::checkbox('edit_locations',true,($this->role_permissions->testPermission($this->permissions3,'edit_locations')) ? 'checked':'',['class' => 'form-check-input','id' => 'edit_locations']) }}
                                {{ Form::label('edit_locations','Editar ubicaciones') }}
                            </div>

                            <div class="form-check">
                                {{ Form::checkbox('delete_locations',true,($this->role_permissions->testPermission($this->permissions3,'delete_locations')) ? 'checked':'',['class' => 'form-check-input','id' => 'delete_locations']) }}
                                {{ Form::label('delete_locations','Eliminar ubicaciones') }}
                            </div>

                            <div class="form-check">
                                {{ Form::checkbox('restore_locations',true,($this->role_permissions->testPermission($this->permissions3,'restore_locations')) ? 'checked':'',['class' => 'form-check-input','id' => 'restore_locations']) }}
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
                          {{ Form::checkbox('admin_panel',"true",($this->role_permissions->testPermission($this->permissions3,'admin_panel')) ? 'checked':'',['class' => 'form-check-input','id' => 'admin_panel']) }}
                          {{ Form::label('admin_panel','Inicio') }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="mtop26 buttons">
                  <button type="button" class="btn btn-sm btn_sail btn_sry" data-bs-dismiss="modal" wire:click.prevent="clear()">Cerrar</button>
                  <button type="submit" class="btn btn-sm btn_sail btn_pry" id="btn_update_permissions">Actualizar</button>
                </div>
          </form>
          </div>
          
        	
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<script>
  //mostramos el loading duplicado al actualizar y ocultamos al comenzar el método update()
  let btn_update_permissions=document.querySelector('#btn_update_permissions');
  if(btn_update_permissions){

    console.log("permissions: ",btn_update_permissions)
    btn_update_permissions.addEventListener('click',()=>{
      console.log("nuevo cambio")
      let loading_permissions = document.querySelector('#loading_permissions');
      loading_permissions.style.display='flex';
    })
  }
</script>