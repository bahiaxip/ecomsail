<!-- Modal crear usuario -->
<div wire:ignore.self class="modal fade " id="editCity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <div class="modal-title h5">
          Editar ciudad
        </div>
      </div>

      
      @if(!$locations)
      <div class="div_loading loading_edit">
        <img src="{{url('icons/loading/dualball.svg')}}" alt="dualball.svg">
      </div>
      
      @endif
      <!-- loading cuando actualizamos edición -->
      <div id="loading" class="div_loading loading_update">
        <img src="{{url('icons/loading/dualball.svg')}}" alt="dualball.svg">
      </div>      
      <div class="modal-body">
        {{ Form::hidden('city_id',$city_id,['wire:model' => 'city_id']) }}
        <form enctype="multipart/form-data">
        	<!--<div class="form-group">-->
          <div class="row">
              <div class="col-md-6">
                  <label for="name">Ciudad</label>
                  <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-keyboard"></i>
                      </span>
              		    <input type="text" name="name" class="form-control" wire:model="city_name"/>
                  </div>
                  @error('city_name')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
              </div>
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
                  
              </div>
              @endif
              @endisset
        	</div>
          @isset($locations)
          <div class="row mtop16">

              <div class="col-md-6">
                
                  {{ Form::label('location','País')}}
                  {{Form::select('location',$locations,null,['class' =>'form-select','wire:model' =>'location','wire:change' => 'set_province'])}}
                  <div wire:loading wire:target="location">
                      <img src="{{url('icons/loading/dualball.svg')}}" alt="dualball.svg" style="margin:auto" width="32">
                  </div>
              </div>
              @isset($provinces)
              <div class="col-md-6">
                  {{Form::label('province','Provincia')}}
                  {{Form::select('province',$provinces,null,['class'=> 'form-select','wire:model' => 'province'])}}
              </div>
              @endisset
          </div>
          @endisset
          <div class="row mtop16">
              <div class="col-md-6">
                  <label for="customFile" >Default file input example</label>
                    <!--<label for="icon" class="mtop16">Icono:</label>-->
                    <!--<div class="form-file">                      
                      <input class="form-control" type="file" id="formFile" wire:model="icon">
                    </div>-->
                  
                  {!! Form::file('icon',['class' =>'form-control','accept' =>'image/*','wire:model'=>"icon"])!!}
                  @error('icon')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  <div wire:loading wire:target="icon">
                    <img src="{{url('icons/loading/dualball.svg')}}" alt="dualball.svg" style="margin:auto" width="32">
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
            <div class="col-md-3" >              
                {{Form::label('isocode_alpha2','Código ISO')}}
                {{ Form::text('isocode_alpha2',null,['class' => 'form-control','wire:model' => 'isocode_alpha2']) }}
            </div>
            <div class="col-md-3">
                {{Form::label('isocode_num','Código ISO (númerico)')}}
                {{ Form::number('isocode_num',null,['class' => 'form-control','wire:model' => 'isocode_num'])}}
            </div>            
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn_sail btn_sry" data-bs-dismiss="modal" wire:click.prevent="clear2()">Cancelar</button>
        <button type="button" class="btn btn-sm btn_sail btn_pry" wire:click.prevent="update()">Actualizar</button>
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