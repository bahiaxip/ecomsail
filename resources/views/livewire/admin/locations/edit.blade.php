<!-- Modal crear usuario -->
<div wire:ignore.self class="modal fade " id="editLocation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <div class="modal-title h5">
          Editar Ubicación
        </div>
      </div>

      @if(!$location_id)
      <div class="div_loading loading_edit">
        <img src="{{url('ics/loading/dualball.svg')}}" alt="dualball.svg">
      </div>
      @endif
      <!-- loading cuando actualizamos edición -->
      <div id="loading" class="div_loading loading_update">
        <img src="{{url('ics/loading/dualball.svg')}}" alt="dualball.svg">
      </div>      
      <div class="modal-body">
        <form enctype="multipart/form-data">
        	<!--<div class="form-group">-->
          <div class="row">
              <div class="col-md-6">
                  <label for="name">País</label>
                  <div class="input-group">
                      <span class="input-group-text">
                        <i class="fa-solid fa-keyboard"></i>
                      </span>
              		    <input type="text" name="name" class="form-control" wire:model="country_name"/>
                  </div>
                  @error('country_name')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
              </div>
              @if($zones)
              <div class="col-md-6">
                  <label for="type">Zona</label>
                  <div class="input-group">                    
                    <!--
                    <select name="type" class="form-select" wire:model="type">
                      <option value="0">Categoría</option>
                      <option value="1">Subcategoría</option>
                    </select>
                    -->
                    {{ Form::select('zone',$zones,null,['class' => 'form-select', 'wire:model' => 'zone'])}}
                  </div>
              </div>
              @endif
        	</div>
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
                    <img src="{{url('ics/loading/dualball.svg')}}" alt="dualball.svg" style="margin:auto" width="32">
                </div>
                  
              </div>      
              <div class="col-md-3">
                  <label for="status">Estado</label>
                  <div class="input-group">                    
                    {{ Form::select('status',[0 => 'Borrador',1 => 'Público'],null,['class' => 'form-select', 'wire:model' => 'status'])}}
                  </div>  
              </div>
              <div class="col-md-3">
                  <label for="vat">IVA</label>
                  <div class="input-group">                    
                    {{ Form::number('vat',null,['class' => 'form-select', 'wire:model' => 'vat','min'=>1,'step' => 1])}}
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
            <div class="col-md-3">
                {{Form::label('price_default','Prefijo')}}
                {{ Form::number('price_default',null,['class' => 'form-control','wire:model' => 'price_default'])}}
            </div>
            <div class="col-md-3">
                {{Form::label('default_delivery','Plazo de entrega')}}
                {{ Form::number('default_delivery',null,['class' => 'form-control','wire:model' => 'default_delivery'])}}
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