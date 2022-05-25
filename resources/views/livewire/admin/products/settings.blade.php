<!-- Modal crear producto -->
<div wire:ignore.self class="modal fade " id="settings" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <div class="modal-title h5">
          Configuración de producto
        </div>
      </div>
      
      <!-- loading cuando actualizamos edición -->
      <div id="loading" style="display: none;width:100%;height:100%;position:absolute;background-color: rgba(0,0,0,.5);z-index:999" >
        <img src="{{url('icons/spinner2.svg')}}" alt="" style="margin:auto" width="80">
      </div>
      <div class="modal-body">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-settings-tab" data-bs-toggle="tab" data-bs-target="#nav-settings" type="button" role="tab" aria-controls="nav-settings" aria-selected="true">General</button>              
              <button class="nav-link" id="nav-price-tab" data-bs-toggle="tab" data-bs-target="#nav-price" type="button" role="tab" aria-controls="nav-price" aria-selected="false">Precio</button>
              <button class="nav-link" id="nav-combinations-tab" data-bs-toggle="tab" data-bs-target="#nav-combinations" type="button" role="tab" aria-controls="nav-combinations" aria-selected="false">Combinaciones</button>
              <button class="nav-link" id="nav-gallery-tab" data-bs-toggle="tab" data-bs-target="#nav-gallery" type="button" role="tab" aria-controls="nav-gallery" aria-selected="false">Galería</button>
          </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">

          <div class="tab-pane fade show active" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab" wire:ignore.self>
            <div class="row mtop16">                
                <div class="col-md-6">
                  {{ Form::label('availability','Disponibilidad')}}
                  {{ Form::select('availability',[0=>'Online y tienda',1=>'Sólo Online',2=>'Sólo tienda'],null,['class' => 'form-select','wire:model' => 'availability'])}}
                  @error('availability')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-md-6">
                    {{ Form::label('product_state','Estado de producto')}}
                    {{ Form::select('product_state',[0=>'Nuevo',1=>'Usado',2=>'Reacondicionado'],null,['class' => 'form-select','wire:model.defer' => 'product_state'])}}
                  @error('product_state')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

            </div>

            <form enctype="multipart/form-data">
             <div class="row mtop16">
                
                <div class="col-md-4" >                  
                   <div class="form-check" >
                    {{ Form::checkbox('active_stock_not','true',null,['class' => 'form-check-input','type' => 'checkbox','id' => 'active_stock_not','wire:model' => 'active_stock_not'])}}
                    {{ Form::label('active_stock_not','Activar notificación de stock mínimo',['class' => 'form-check-label'])}}                    
                  </div>
                  <div class="form-check">
                      {{ Form::checkbox('active_stock_email','true',null,['class' => 'form-check-input','type' => 'checkbox','id' => 'active_stock_email'])}}
                      {{ Form::label('active_stock_email','Activar correo de stock mínimo',['class' => 'form-check-label'])}}
                  </div>
                  
                </div>
                <div class="col-md-4">
                    {{ Form::label('min_stock','Stock mínimo')}}
                    {{ Form::number('min_stock',null,['class' => 'form-control','wire:model'=>'min_stock'])}}
                </div>
                <!-- imagenes de ficha técnica -->
                <div class="col-md-4">
                  {{ Form::label('attachment','Archivo adjunto(pdf)') }}
                  {{ Form::file('attachment',['class' => 'form-control','accept'=> '.pdf','wire:model' => 'attachment']) }}
                  @error('attachment')
                  <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                
              </div>
            </form>
            <div class="row mtop16">
                  <div class="col-md-4">
                      <label for="delivery_term">Plazo de entrega</label>
                      <div class="form-check">
                        <label for="delivery_term1">
                          <input type="radio" value="0" name="delivery_term" class="form-check-input" id="delivery_term1" checked wire:model="delivery_term">
                          Plazo predeterminado
                        </label>
                      </div>
                      <div class="form-check">
                          <label for="delivery_term2">
                          <input type="radio" value="1" name="delivery_term" class="form-check-input" id="delivery_term2" wire:model="delivery_term">
                          Plazo personalizado
                          </label>
                      </div>
                  </div>
                  <div class="col-md-4">
                      {{ Form::label('custom_delivery','Entrega personalizada')}}
                      {{ Form::number('custom_delivery',null,['class' => 'form-control','disabled'])}}
                  </div>
                  <div class="col-md-4">
                      {{ Form::label('additional_shipping','Gasto adicional de envío')}}
                      {{ Form::number('additional_shipping',null,['class' => 'form-control'])}}
                  </div>
              </div>
            <div class="row mtop16">
                  <div class="col-md-3">
                      {{ Form::label('long','Longitud')}}
                      {{ Form::number('long',1,['class' => 'form-control','wire:model' => 'long','step' =>'0.01','min' => 0])}}
                      @error('long')
                        <p class="text-danger">{{$message}}</p>
                      @enderror
                  </div>
                  <div class="col-md-3">
                      {{ Form::label('width','Anchura')}}
                      {{ Form::text('width',null,['class' => 'form-control','wire:model' => 'width','step' =>'0.01','min' => 0])}}
                      @error('width')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                  </div>
                  <div class="col-md-3">
                      {{ Form::label('height','Altura')}}
                      {{ Form::number('height',1,['class' => 'form-control','wire:model' => 'height','step' =>'0.01','min' => 0])}}
                      @error('height')
                        <p class="text-danger">{{$message}}</p>
                      @enderror
                  </div>
                  <div class="col-md-3">
                    
                      {{ Form::label('weight','Peso(kg)')}}
                      {{ Form::text('weight',null,['class' => 'form-control','wire:model' => 'weight','step' =>'0.01','min' => 0])}}
                      @error('weight')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                  </div>
              </div>
          </div>

          <div class="tab-pane fade" id="nav-price" role="tabpanel" aria-labelledby="nav-price-tab" wire:ignore.self>
            <div class="row mtop16">
                <div class="col-md-6">
                  {{ Form::label('type_tax','Tipo de impuesto')}}
                  {{ Form::select('type_tax',[0=>'Estándar',1=>'Tasa reducida',2=>'Tasa cero'],null,['class' => 'form-select','wire:model.defer' => 'type_tax'])}}
                  @error('type_tax')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                  {{ Form::label('tax','Impuesto')}}
                  {{ Form::number('tax',null,['class' => 'form-control','wire:model.defer' => 'tax'])}}
                  @error('tax')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>                
            </div>

            <div class="row mtop16">
                <div class="col-md-6">
                  {{ Form::label('partial_price','Precio(Imp.exc.)') }}
                  {{ Form::number('partial_price',0,['class' => 'form-control','wire:model.defer' =>'partial_price','step' =>'any','min' => 0]) }}
                  @error('partial_price')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-md-6">
                  {{ Form::label('price','Precio(Imp.inc.)') }}
                  {{ Form::number('price',0,['class' => 'form-control','wire:model.defer' =>'price','step' =>'any','min' => 0]) }}
                  @error('price')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
            </div>

            <div class="row mtop16">                
                <div class="col-md-6">
                  {{ Form::label('discount_type','Tipo Descuento')}}
                  {{ Form::select('discount_type',[0=>'No',1=>'Sí',2=>'Personalizado'],null,['class' => 'form-control','wire:model.defer' => 'discount_type'])}}
                  @error('discount_type')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-md-6">
                  {{ Form::label('weight','Descuento(%)')}}
                  {{ Form::number('discount',null,['class' => 'form-control','wire:model.defer' => 'discount'])}}
                  @error('discount')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

             <div class="row mtop16">              
                <div class="col-md-6">
                  {{Form::label('init_discount','Inicio descuento')}}
                  <div class="input-group">               
                    <span class="input-group-text" id="basic-addon1">
                      <i class="far fa-keyboard"></i>
                    </span>                
                    {!! Form::date('init_discount',null,['class'=> 'form-control','wire:model.defer' => 'init_discount']) !!}
                    @error('init_discount')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  {{Form::label('end_discount','Final descuento')}}
                  <div class="input-group">               
                    <span class="input-group-text" id="basic-addon1">
                      <i class="far fa-keyboard"></i>
                    </span>                
                    {!! Form::date('end_discount',null,['class'=> 'form-control','wire:model.defer' => 'end_discount']) !!}
                    @error('end_discount')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                </div>
            </div>

            <div class="row mtop16">
                <div class="col-md-12" wire:ignore>
                  {{ Form::label('detail2','Detalles adicionales')}}
                  {{ Form::textarea('detail2',null,['class' => 'form-control','id' => 'friendly_edit3','wire:model'=>'detail2'])}}
                  @error('detail')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  <script>
                  editor_init('friendly_edit3');
                    CKEDITOR.instances.friendly_edit3.on('change',function(e){
                      e.preventDefault();
                        document.querySelector('#nav-price-tab').click();
                        @this.detail2=this.getData();


                    });
                  </script>
                </div>
            </div>
          </div>

          <div class="tab-pane fade" id="nav-combinations" role="tabpanel" aria-labelledby="nav-combinations-tab" wire:ignore.self>
            <div class="row mtop16">
              @include('livewire.admin.products.confirm_combinations')
              <div class="col-md-9" style="position:relative">
                
                <div class="row">
                    {{ Form::label('generate','Generar combinaciones')}}
                    <div class="panel shadow" id="panel_combinations" style="width:98%;min-height:50px;border: #D3D3D3 1px solid;border-radius:4px;padding:10px;margin:auto">
                    </div>
                    <div class="mtop16">
                        <button class="btn btn-primary" wire:click="createCombinations(list_combinations,{{$prod_id}})">Crear combinación</button>
                    </div>
                </div>
                @if(session()->has('message2'))
                    <div class="container mtop16 ">
                        <div class="alert alert-{{$typealert}}">            
                            <h2 >{{session('message2') }}</h2>
                            @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif
                            <script>
                                $('.alert').slideDown();
                                setTimeout(()=>{ $('.alert').slideUp(); }, 10000);
                            </script>
                        </div>
                    </div>
                @endif
                
                <div class="row">
                    @if($combinations && $combinations->count() > 0)
                    <div class="table">
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <td>ID</td>
                                <td>Nombre</td>
                                <td width="80">Precio adicional</td>
                                <td width="80">Precio final</td>
                                <td width="80">Acciones</td>
                              </tr>
                            </thead>
                            <tbody>
                              @isset($combinations)
                                @foreach($combinations as $comb)
                                
                                  <tr class="tr_{{$comb->id}}">
                                    <td>{{$comb->id}}</td>
                                    <td style="font-size:14px">
                                      {{$comb->name}}
                                    </td>
                                    <td class="added_price">
                                        {{ Form::number('added_price',$comb->added_price,['class' => 'form-control form-control-sm','disabled','onchange' => 'update_added_price(this)']) }}
                                    </td>
                                    <td class="final_price">
                                        {{ Form::number('final_price',$comb->final_price,['class' => 'form-control form-control-sm','disabled','onchange' => 'update_final_price(this)']) }}
                                    </td>
                                    <td>
                                        <div class="admin_items" style="display:flex">
                                          <div class="edit_comb"  style="display:flex">
                                            <button class="btn btn-sm edit" onclick="editComb({{$comb->id}})" >
                                              <i class="fa-solid fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm delete" title="Eliminar producto" onclick="confirmComb({{$comb->id}},event)">
                                              <i class="fa-solid fa-trash"></i>
                                            </button>
                                          </div>
                                          <div class="edit_comb_update" style="display:none">
                                              <button class="btn btn-sm edit" onclick="editComb({{$comb->id}},true)" >
                                              <i class="fa-solid fa-xmark"></i>
                                              <button class="btn btn-sm edit" wire:click="save({{$comb->id}},added_price,final_price)" >
                                              <i class="fa-solid fa-check"></i>
                                            </button>
                                          </div>
                                            
                                            
                                        </div>
                                    </td>
                                  </tr>
                                
                                @endforeach
                              @endisset
                            </tbody>
                        </table>
                    </div>
                    @endif                    
                </div>
                
              </div>
              <div class="col-md-3">
                <label for="" style="text-align: center;">Atributos</label>
                @foreach($attributes as $key=>$at)
                <div class="row mtop16 boxes">
                    
                      <div class="panel shadow"  style="display:flex;justify-content:space-between;padding:0">
                          <button class="btn w-100" data-bs-toggle="collapse" data-bs-target="#collapse_{{$at->id}}" aria-expanded="false" aria-controls="collapseExample" type="button" style="text-align:left;">
                            <i class="fas fa-tags"></i>
                            {{$at->name}}
                            <i class="fa-solid fa-chevron-down" style="float:right"></i>  
                          
                          </button>
                          
                          
                          
                      </div>
                      <div class="collapse" id="collapse_{{$at->id}}">
                              <!--
                              <div class="header">
                                <h2 class="title"> Categorías</h2>
                              </div>
                              -->
                              <div class="box mtop16 boxes_values" >
                                  @foreach($at->values() as $a)
                                    <div class="form-check values">
                                      {{ Form::radio('list_'.$a->parentattr->id,true,null,['class' => 'form-check-input','id' => 'list_'.$a->id,'onclick' =>"addValue('$a->id','$a->name',".$a->parentattr->id.",this,)" ]) }}
                                      {{ Form::label('list_'.$a->id,$a->name) }}
                                    </div>
                                  @endforeach
                              </div>
                          </div>
                    
                
                </div>
                @endforeach
                
              </div>

            </div>

            {{-- si queremos cada 3 --}}
            {{--@php($counter = 0)
            @php($last = $attributes->count())
            @foreach($attributes as $key=>$at)
              @if($key %3 == 0)
                @php($counter = 0)
              <div class="row mtop16">
              @endif
                
                <div class="col-md-4">
                    <div class="panel shadow">
                        <button class="btn w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{$at->id}}" aria-expanded="false" aria-controls="collapseExample">
                          <i class="fas fa-tags"></i> {{$at->name}} <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <div class="collapse" id="collapse_{{$at->id}}">
                            <!--
                            <div class="header">
                              <h2 class="title"> Categorías</h2>
                            </div>
                            -->
                            <div class="box mtop16">
                                @foreach($at->values() as $a)
                                  <div class="form-check ">
                                    {{ Form::checkbox('list_'.$a->id,"true",null,['class' => 'form-check-input','id' => 'list_'.$a->id]) }}
                                    {{ Form::label('list_'.$a->id,$a->name) }}
                                  </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @php($counter++)
                  
              @if($counter == 3 || $key==$last-1)
              </div>
              @endif

            
            @endforeach
            --}}
            

          </div>
          <div class="tab-pane fade" id="nav-gallery" role="tabpanel" aria-labelledby="nav-gallery-tab" wire:ignore.self>

              @if($images_products)
              <div class="gallery">
                @include('livewire.admin.products.confirm_gallery')
                @foreach($images_products as $ima)
                    <div class="gallery_images">
                        <!--<span class="" style="width:100%">-->
                            <div class="div_images">
                              <div class="box_image">
                                <img src="{{url($ima->path_tag.$ima->image)}}" class="images" />                                
                              </div>
                              <div class="back_slide">
                                  <div class="delete_images" onclick="confirmGallery({{$ima->id}})">
                                      <i class="fa-solid fa-circle-xmark"></i>
                                  </div>
                              </div>
                            </div>
                        <!--</span> -->
                    </div>
                @endforeach
              </div>
              @endif
              <div class="back_upload" style="" ondrop="dropHandler(event,{{$prod_id}})" ondragover="dragOverHandler(event)">
                  <div class="box" id="box_transfer" style="/*box-shadow:1px 1px 1px black, -1px 1px 1px black,1px 1px 15px black inset;*/">
                    <span class="left" style="display: none" onclick="scrollGalleryLeft()">
                        <i class="fa-solid fa-circle-arrow-left"></i>
                    </span>
                    <span class="right" style="display: none" onclick="scrollGalleryRight()">
                        <i class="fa-solid fa-circle-arrow-right"></i>
                    </span>
                  </div>
                  <div class="info_upload" >
                    <p class="text" >Max. 2 MB</p>
                    <button class="btn" type="button">Soltar imagen aquí</button>
                  </div>
                  <div class="back_images" >
                  <!-- añadir display:flex si es más alta que ancha, necesario 
                    para que se vea el icono close en ese tipo de imágenes-->
                  </div>
                </div>
                <div class="div_btn_gallery">
                    <button class="btn btn-sm btn-primary" onclick="uploadImage({{$prod_id}})">
                      Subir todo
                    </button>
                </div>
          </div>
          
        </div>
         
      </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" wire:click.prevent="clear2()" onclick="clearActiveTabs()">Cancelar</button>
          <button type="button" class="btn btn-sm back_livewire2 btn-primary" wire:click.prevent="update()">Actualizar</button>          
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>

  function mimetodo(product_id){
    @this.reload_image_products(product_id);
  }
/*
function uploadImage(id){
  console.log(id);
  console.log(listFiles);
  
  let dato = JSON.stringify(listFiles);
  let xhr = new XMLHttpRequest();
  xhr.open("POST","http://localhost:3000/images?data"+listFiles+"&_token="+token);
  xhr.send("http://localhost:3000/images?data"+listFiles+"&_token="+token);
  xhr.onreadystatechange =  function(){
    if(xhr.readyState == 4){
      xhr.response;
      console.log()
    }
  };
  xhr.onerror = function (){
    console.log("error");
  }


}

*/
//document.onreadystatechange = () => {
/*
document.addEventListener('DOMContentLoaded',() => {
  if(document.readyState == "complete")
    if(document.querySelector('#friendly_edit'))
      editor_init('friendly_edit');
})
*/
</script>
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
@endpush