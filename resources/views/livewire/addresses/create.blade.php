<!-- Modal crear usuario -->
<div wire:ignore.self class="modal fade " id="addAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <div class="modal-title h5">
          Crear Dirección
        </div>
      </div>
      <!-- loading cuando actualizamos edición -->
      <div id="loading" style="display: none;width:100%;height:100%;position:absolute;background-color: rgba(0,0,0,.5);z-index:999" >
        <img src="{{url('icons/spinner2.svg')}}" alt="" style="margin:auto" width="80">
      </div>      
      <div class="modal-body">
        <form enctype="multipart/form-data">
        	<!--<div class="form-group">-->
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
                  <label for="lastname">Apellidos</label>
                  <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-keyboard"></i>
                      </span>
                      <input type="text" name="lastname" class="form-control" wire:model="lastname"/>
                  </div>
                  @error('lastname')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
            
          </div>
          @isset($locations)          
          <div class="row mtop16">
            @isset($zones)
              @if($zones)
              <div class="col-md-6">
                  <label for="type">Zona</label>
                    <!--
                    <select name="type" class="form-select" wire:model="type">
                      <option value="0">Categoría</option>
                      <option value="1">Subcategoría</option>
                    </select>
                    -->
                    {{ Form::select('zone',$zones,null,['class' => 'form-select', 'wire:model' => 'zone','wire:change' => 'set_location'])}}
                  @error('zone')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
              </div>
              @endif
            @endisset
              <div class="col-md-6">
                  <label for="location">País</label>
                  
                    <!--
                    <select name="type" class="form-select" wire:model="type">
                      <option value="0">Categoría</option>
                      <option value="1">Subcategoría</option>
                    </select>
                    -->
                    {{ Form::select('location',$locations,null,['class' => 'form-select', 'wire:model' => 'location','wire:change' => 'set_province'])}}
                  @error('location')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  
              </div>
        	</div>
          @endisset
          @isset($provinces)
          <div class="row mtop16">              
              
                <div class="col-md-6">
                    {{Form::label('province','Provincia')}}
                    {{Form::select('province',$provinces,null,['class'=> 'form-select','wire:model' => 'province','wire:change' => 'set_city'])}}
                    @error('province')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div wire:loading wire:target="province">
                      <img src="{{url('icons/spinner2.svg')}}" alt="" style="margin:auto" width="32">
                    </div>
                </div>
              
              @isset($cities)
                  <div class="col-md-6">
                      {{Form::label('city','Ciudad')}}
                      {{Form::select('city',$cities,null,['class'=> 'form-select','wire:model' => 'city'])}}
                      @error('city')
                      <p class="text-danger">{{$message}}</p>
                      @enderror
                      <div wire:loading wire:target="city">
                        <img src="{{url('icons/spinner2.svg')}}" alt="" style="margin:auto" width="32">
                      </div>
                  </div>
              @endisset
          </div>
          @endisset
          
          
          <div class="row mtop16">
              <div class="col-md-6">
                  {{Form::label('address_home','Dirección')}}
                  <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa-solid fa-keyboard"></i>
                    </span>
                    {{Form::text('address_home',null,['class' => 'form-control','wire:model' => 'address_home'])}}
                  </div>
                  
                  @error('address_home')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  <div wire:loading wire:target="icon">
                    <img src="{{url('icons/spinner2.svg')}}" alt="" style="margin:auto" width="32">
                </div>
                  
              </div>      
              <div class="col-md-6">
                  {{Form::label('apartment','Apartamento/Habitación')}}

                  <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa-solid fa-keyboard"></i>
                    </span>
                    {{Form::text('apartment',null,['class' => 'form-control','wire:model' => 'apartment'])}}
                  </div>
                  @error('apartment')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
              </div>
          </div>
          <div class="row mtop16">
              <div class="col-md-6">
                  {{Form::label('cp','Código postal')}}
                  <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa-solid fa-keyboard"></i>
                    </span>                  
                    {{Form::text('cp',null,['class' => 'form-control','wire:model' => 'cp'])}}
                  </div>
                  @error('cp')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  
              </div>
              
              <div class="col-md-6">
                  {{Form::label('town','Población/Municipìo')}}

                  <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-keyboard"></i>
                      </span>
                    {{Form::text('town',null,['class' => 'form-control','wire:model' => 'town'])}}
                  </div>
                  @error('apartment')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
              </div>
          </div>
          <div class="row mtop16">
              <div class="col-md-6">
                  {{Form::label('phone','Teléfono')}}
                  <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-phone"></i>
                      </span>
                  
                      {{Form::text('phone',null,['class' => 'form-control','wire:model' => 'phone'])}}
                  </div>
                  @error('phone')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  <div wire:loading wire:target="icon">
                      <img src="{{url('icons/spinner2.svg')}}" alt="" style="margin:auto" width="32">
                  </div>
                  
              </div>      
              <div class="col-md-6">
                  {{Form::label('email','E-Mail')}}
                  <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-at"></i>
                      </span>
                      {{Form::text('email',null,['class' => 'form-control','wire:model' => 'email'])}}
                  </div>
                  @error('email')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
              </div>
          </div>
          <div class="row mtop16">
              <div class="col-md-6">
                  {{Form::label('business','Corporación/Empresa')}}
                  <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-keyboard"></i>
                      </span>
                      {{Form::text('business',null,['class' => 'form-control','wire:model' => 'business'])}}
                  </div>
                  @error('business')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
              </div>
              <div class="col-md-6">
                  {{Form::label('nif','N.I.F.')}}
                  <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-keyboard"></i>
                      </span>                  
                      {{Form::text('nif',null,['class' => 'form-control','wire:model' => 'nif'])}}
                  </div>
                  @error('nif')
                  <p class="text-danger">{{$message}}</p>
                  @enderror                  
              </div>
          </div>
          <div class="row mtop16">
              <div class="col-md-6">
                  {{Form::label('title','Título')}}
                  <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-keyboard"></i>
                      </span>                  
                      {{Form::text('title',null,['class' => 'form-control','wire:model' => 'title'])}}
                  </div>
                  @error('title')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  <div wire:loading wire:target="icon">
                      <img src="{{url('icons/spinner2.svg')}}" alt="" style="margin:auto" width="32">
                  </div>
                  
              </div>      
              <div class="col-md-6">
                  {{Form::label('ref','Cód. Ref.')}}
                  <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-keyboard"></i>
                      </span>
                      {{Form::text('ref',null,['class' => 'form-control','wire:model' => 'ref'])}}
                  </div>
                  @error('ref')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
              </div>
          </div>
          {{--<div class="row mtop16">
            <div class="col-md-12" wire:ignore>
              <label for="description">Descripción</label>
              {{ Form::textarea('description',null,['class' => 'form-control description','id' =>'friendly_edit1'])}}
              
              <script>
                //ckeditor genera conflicto con wire:model, para ello 
                //creamos el siguiente script para establecer la propiedad
                //description desde JavaScript
                //CKEDITOR.replace('friendly_edit1');
                editor_init('friendly_edit1');
                CKEDITOR.instances.friendly_edit1.on('change',function(e){
                    @this.description=this.getData();
                });                
                
              </script>
              
            </div>
            --}}
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-sm btn_sail btn_sry" data-bs-dismiss="modal" wire:click.prevent="clear()">Cancelar</button>
        <button type="button" class="btn btn-sm btn-sm btn_sail btn_pry" wire:click.prevent="store()">Crear</button>
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