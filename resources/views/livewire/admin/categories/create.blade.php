<!-- Modal crear usuario -->
<div wire:ignore.self class="modal fade " id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg add_category">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <div class="modal-title h5">
          Crear Categoría
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
                  <label for="type">Categoría padre</label>
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="fa-solid fa-keyboard"></i>
                    </span>
                    <!--
                    <select name="type" class="form-select" wire:model="type">
                      <option value="0">Categoría</option>
                      <option value="1">Subcategoría</option>
                    </select>
                    -->
                    {{ Form::select('type',$cats,'null',['class' => 'form-select', 'wire:model' => 'type'])}}
                  </div>
              </div>
        	</div>
          <div class="row mtop16">
              <div class="col-md-6">
                  <label for="customFile" >Icono</label>
                    <!--<label for="icon" class="mtop16">Icono:</label>-->
                    <!--<div class="form-file">                      
                      <input class="form-control" type="file" id="formFile" wire:model="icon">
                    </div>-->
                  
                  {!! Form::file('icon',['class' =>'form-control','id' => $iteration,'accept' =>'image/*','wire:model'=>"icon"])!!}
                  @error('icon')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  <div wire:loading wire:target="icon">
                      <img src="{{url('ics/loading/dualball.svg')}}" alt="" style="margin:auto" width="32">
                  </div>
                  
              </div>      
              <div class="col-md-6">
                  <label for="status">Estado</label>
                  <div class="input-group">                    
                    {{ Form::select('status',[0 => 'Borrador',1 => 'Público'],null,['class' => 'form-select', 'wire:model' => 'status'])}}
                  </div>  
              </div>
          </div>

          
          
          <div class="row mtop16 offer">
              <div class="col-md-6">
                  <div class="dflex">
                      {{Form::label('offer','Ofertas')}}
                      <span class="info" title="Incluir enlace en la barra de la sección Ofertas. Solo categorías padre">
                          <i class="fa-solid fa-circle-info"></i>  
                      </span>
                  </div>

                  <div class="form-check form-switch">
                      <input name="offer" class="form-check-input mtop10" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width:2.4em;padding:7px" wire:model="offer" {{ $type == 0 ? '':'disabled'}}>
                  </div>
              </div>
          </div>

          <div class="row mtop16">
            <div class="col-md-6">              
                  <label for="customFile">Título de oferta</label>
                  {!! Form::text('title_offer',null,['class' =>'form-control','wire:model'=>"title_offer", "disabled" => ($offer) ? false:true])!!}
                  @error('title_offer')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  
              </div> 
              <div class="col-md-6">
                  <label for="customFile">Icono de oferta (FontAwesome)</label>
                    <!--<label for="icon" class="mtop16">Icono:</label>-->
                    <!--<div class="form-file">                      
                      <input class="form-control" type="file" id="formFile" wire:model="icon">
                    </div>-->
                  
                  {!! Form::text('icon_awesome_offer',null,['class' =>'form-control','wire:model'=>"icon_awesome_offer",'placeholder' => '<i class="fa-solid fa-shirt"></i>', "disabled" => ($offer) ? false:true])!!}
                  @error('icon_awesome_offer')
                  <p class="text-danger">{{$message}}</p>
                  @enderror                  
              </div>
          </div>

          
          {{--
          <div class="row mtop16">
              <div class="col-md-6">
                  <label for="customFile">Icono de ofertas (imagen)</label>
                    <!--<label for="icon" class="mtop16">Icono:</label>-->
                    <!--<div class="form-file">                      
                      <input class="form-control" type="file" id="formFile" wire:model="icon">
                    </div>-->
                  
                  {!! Form::file('icon_image_offer',['class' =>'form-control','wire:model'=>"icon_image_offer",'placeholder' => '<i class="fa-solid fa-shirt"></i>'])!!}
                  @error('icon_image_offer')
                  <p class="text-danger">{{$message}}</p>
                  @enderror                  
              </div>
              
              <div class="col-md-6">              
                  <label for="customFile">Icono de ofertas (efecto hover)</label>
                  {!! Form::file('icon_image_offer_hover',['class' =>'form-control','id' => $iteration,'accept' =>'image/*','wire:model'=>"icon_image_offer_hover"])!!}
                  @error('icon_image_offer_hover')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  <div wire:loading wire:target="icon_image_offer">
                    <img src="{{url('icons/loading/dualball.svg')}}" alt="" style="margin:auto" width="32">
                  </div>
              </div>      
              
          </div>
          --}}
          <div class="row mtop16">
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
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-sm btn_sail btn_sry" data-bs-dismiss="modal" wire:click.prevent="clear2()">Cancelar</button>
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