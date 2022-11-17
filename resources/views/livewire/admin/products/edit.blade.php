<!-- Modal crear usuario -->
<div wire:ignore.self class="modal fade " id="editProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <div class="modal-title h5">
          Editar Producto
        </div>
      </div>
      @if(!$prod_id)
      <div class="div_loading loading_edit">
        <img src="{{url('ics/loading/dualball.svg')}}" alt="dualball.svg">
      </div>
      @endif
      <!-- loading cuando actualizamos edición -->
      <div id="loading" class="div_loading loading_update">
        <img src="{{url('ics/loading/dualball.svg')}}" alt="dualball.svg" >
      </div>
      <div class="modal-body">
        {{ Form::hidden('prod_id',null,['wire:model' => 'prod_id']) }}
        <div class="row">
              <div class="col-md-6">
                {{ Form::label('name','Nombre') }}
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="fa-solid fa-keyboard"></i>
                  </span>
                  {{ Form::text('name',null,['class' => 'form-control','wire:model' =>'name'])}}
                </div>
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
              </div>
              <div class="col-md-6">
                  {{ Form::label('Tipo')}}
                  {{ Form::select('type_product',[0 => 'Producto simple',1 => 'Producto variable'],null,['class' => 'form-select','id' => 'type_product'])}}
              </div>
            </div>

            <div class="row mtop16">
                <div class="col-md-6">
                  {{ Form::label('category','Categoría') }}

                  {{ Form::select('category',$cats,null,['class' => 'form-select', 'wire:model' => 'category'])}}
                  @error('category')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>                
                <div class="col-md-6">
                  {{ Form::label('subcategory','Subcategoría') }}

                  <select name="subcategory" id="subcategory" wire:model="subcategory" class="form-select" @isset($subcats)  @else disabled @endisset >
                      @if($subcats)
                        <option value="0">Seleccione subcategoría</option>
                        @foreach($subcats as $key=>$value)
                          <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                      @endif
                  </select>
                  @error('subcategory')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                {{--
                <div class="col-md-6">
                  {{ Form::label('stock','Stock') }}
                                 
                  {{ Form::number('stock',0,['class' => 'form-control','wire:model'=>'stock'])}}
                  @error('stock')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>--}}
                
            </div>

            <div class="row mtop16">
                <div class="col-md-6">
                  {{ Form::label('image','Imagen') }}
                  {{ Form::file('image',['class' => 'form-control','id'=>$iteration,'accept'=> 'image/*','wire:model' => 'image']) }}
                  @error('image')
                      <p class="text-danger">{{$message}}</p>
                  @enderror
                  <div wire:loading wire:target="image">
                      <img src="{{url('ics/loading/dualball.svg')}}" alt="" style="margin:auto" width="32">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="status">Estado</label>
                {{ Form::select('status',[0 => 'Borrador',1 => 'Público'],null,['class' => 'form-select', 'wire:model' => 'status'])}}
                </div>
            </div>

            <div class="row mtop16">
                <div class="col-md-6">
                  {{ Form::label('price','Precio') }}
                  {{ Form::number('price',0,['class' => 'form-control','wire:model' =>'price','step' =>'0.01','min' => 0]) }}
                  @error('price')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-md-6">
                  {{ Form::label('stock','Stock')}}
                  {{ Form::number('stock',1,['class' => 'form-control','wire:model' => 'stock','min' => 0])}}
                  @error('stock')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
            </div>
            <div class="row mtop16">
                <div class="col-md-6">
                  {{ Form::label('short_detail','Descripción corta')}}
                  {{ Form::text('short_detail',null,['class' => 'form-control','wire:model' => 'short_detail','maxlength' => 300])}}
                  @error('short_detail')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                  {{ Form::label('refcode','Cod.Ref') }}
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="fa-solid fa-keyboard"></i>
                    </span>
                    {{ Form::text('code',null,['class' => 'form-control','wire:model'=>'code'])}}
                    @error('code')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                </div>
            </div>
            <div class="row mtop16">
                <div class="col-md-12" wire:ignore>
                  {{ Form::label('detail','Descripción')}}
                  {{ Form::textarea('detail',null,['class' => 'form-control','id' => 'friendly_edit2','wire:model'=>'detail'])}}
                  @error('detail')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  <script>
                  
                  editor_init('friendly_edit2');
                    CKEDITOR.instances.friendly_edit2.on('change',function(e){
                        @this.detail=this.getData();
                    });
                  
                  </script>
                </div>
            </div>
        <!--<nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">General</button>              
              <button class="nav-link" id="nav-settings-tab" data-bs-toggle="tab" data-bs-target="#nav-settings" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Ajustes</button>
              <button class="nav-link" id="nav-price-tab" data-bs-toggle="tab" data-bs-target="#nav-price" type="button" role="tab" aria-controls="nav-price" aria-selected="false">Precio</button>
              <button class="nav-link" id="nav-price-tab" data-bs-toggle="tab" data-bs-target="#nav-price" type="button" role="tab" aria-controls="nav-price" aria-selected="false">Combinaciones</button>
          </div>
        </nav>-->
        <div class="tab-content" id="nav-tabContent">

        <!--  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" wire:ignore.self>
            

            <div class="row">
              <div class="col-md-6">
                {{ Form::label('name','Nombre') }}
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="fa-solid fa-keyboard"></i>
                  </span>
                  {{ Form::text('name',null,['class' => 'form-control','wire:model' =>'name'])}}
                </div>
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
              </div>
              <div class="col-md-6">
                  {{ Form::label('Tipo')}}
                  {{ Form::select('type_product',[0 => 'Producto simple',1 => 'Producto variable'],null,['class' => 'form-select','id' => 'type_product'])}}
              </div>
            </div>

            <div class="row mtop16">
                <div class="col-md-6">
                  {{ Form::label('category','Categoría') }}

                  {{ Form::select('category',$cats,null,['class' => 'form-select', 'wire:model' => 'category'])}}
                  @error('category')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>                
                <div class="col-md-6">
                  {{ Form::label('subcategory','Subcategoría') }}

                  {{ Form::select('subcategory',$cats,null,['class' => 'form-select', 'wire:model' => 'subcategory','disabled'])}}
                  @error('subcategory')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                {{--
                <div class="col-md-6">
                  {{ Form::label('stock','Stock') }}
                                 
                  {{ Form::number('stock',0,['class' => 'form-control','wire:model'=>'stock'])}}
                  @error('stock')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>--}}
                
            </div>

            <div class="row mtop16">
                <div class="col-md-6">
                  {{ Form::label('image','Imagen') }}
                  {{ Form::file('image',['class' => 'form-control','id'=>$iteration,'accept'=> 'image/*','wire:model' => 'image']) }}
                  @error('image')
                      <p class="text-danger">{{$message}}</p>
                  @enderror
                  <div wire:loading wire:target="image">
                      <img src="{{url('ics/spinner2.svg')}}" alt="" style="margin:auto" width="32">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="status">Estado</label>
                {{ Form::select('status',[0 => 'Borrador',1 => 'Público'],null,['class' => 'form-select', 'wire:model' => 'status'])}}
                </div>
            </div>

            <div class="row mtop16">
                <div class="col-md-6">
                  {{ Form::label('price','Precio') }}
                  {{ Form::number('price',0,['class' => 'form-control','wire:model' =>'price','step' =>'0.01','min' => 0]) }}
                  @error('price')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-md-6">
                  {{ Form::label('stock','Stock')}}
                  {{ Form::number('stock',1,['class' => 'form-control','wire:model' => 'stock'])}}
                  @error('stock')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
            </div>
            <div class="row mtop16">
                <div class="col-md-6">
                  {{ Form::label('short_detail','Descripción corta')}}
                  {{ Form::text('short_detail',null,['class' => 'form-control','wire:model' => 'short_detail','maxlength' => 40])}}
                  @error('short_detail')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                  {{ Form::label('refcode','Cod.Ref') }}
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="fa-solid fa-keyboard"></i>
                    </span>
                    {{ Form::text('code',null,['class' => 'form-control','wire:model'=>'code'])}}
                    @error('code')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                </div>
            </div>
          </div>-->

          <!--<div class="tab-pane fade" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab" wire:ignore.self>
            <div class="row mtop16">                
                <div class="col-md-6">
                  {{ Form::label('availability','Disponibilidad')}}
                  {{ Form::select('availability',[0=>'Online y tienda',1=>'Sólo Online',2=>'Sólo tienda'],null,['class' => 'form-control','wire:model' => 'availability'])}}
                  @error('availability')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-md-6">
                  {{ Form::label('product_state','Estado de producto')}}
                  {{ Form::select('product_state',[0=>'Nuevo',1=>'Usado',2=>'Reacondicionado'],null,['class' => 'form-select','wire:model' => 'product_state'])}}
                  @error('product_state')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

            </div>
             <div class="row mtop16">
              <div class="col-md-4">
                  {{ Form::label('long','Longitud')}}
                  {{ Form::number('long',1,['class' => 'form-control','wire:model' => 'long','step' =>'0.01','min' => 0])}}
                  @error('long')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-md-4">
                  {{ Form::label('width','Anchura')}}
                  {{ Form::text('width',null,['class' => 'form-control','wire:model' => 'width','step' =>'0.01','min' => 0])}}
                  @error('width')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-md-4">
                  {{ Form::label('height','Altura')}}
                  {{ Form::number('height',1,['class' => 'form-control','wire:model' => 'height','step' =>'0.01','min' => 0])}}
                  @error('height')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

            </div>
            <form enctype="multipart/form-data">
             <div class="row mtop16">
                <div class="col-md-6">
                  {{ Form::label('weight','Peso(kg)')}}
                  {{ Form::text('weight',null,['class' => 'form-control','wire:model' => 'weight','step' =>'0.01','min' => 0])}}
                  @error('weight')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                
                
                <div class="col-md-6">
                  {{ Form::label('attachment','Archivo adjunto(pdf)') }}
                  {{ Form::file('attachment',['class' => 'form-control','accept'=> '.pdf','wire:model' => 'attachment']) }}
                  @error('attachment')
                  <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                
              </div>
            </form>
            <div class="row mtop16">
                <div class="col-md-12" wire:ignore>
                  {{ Form::label('detail','Descripción')}}
                  {{ Form::textarea('detail',null,['class' => 'form-control','id' => 'friendly_edit2','wire:model'=>'detail'])}}
                  @error('detail')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  <script>
                  editor_init('friendly_edit2');
                    CKEDITOR.instances.friendly_edit2.on('change',function(e){
                        @this.detail=this.getData();
                    });
                  </script>
                </div>
            </div>
          </div>-->

          <!--<div class="tab-pane fade" id="nav-price" role="tabpanel" aria-labelledby="nav-price-tab" wire:ignore.self>
            <div class="row mtop16">
                <div class="col-md-6">
                  {{ Form::label('type_tax','Tipo de impuesto')}}
                  {{ Form::select('type_tax',[0=>'Estándar',1=>'Tasa reducida',2=>'Tasa cero'],null,['class' => 'form-select','wire:model' => 'type_tax'])}}
                  @error('type_tax')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                  {{ Form::label('tax','Impuesto')}}
                  {{ Form::number('tax',null,['class' => 'form-control','wire:model' => 'tax'])}}
                  @error('tax')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>                
            </div>

            <div class="row mtop16">
                <div class="col-md-6">
                  {{ Form::label('partial_price','Precio(Imp.exc.)') }}
                  {{ Form::number('partial_price',0,['class' => 'form-control','wire:model' =>'partial_price','step' =>'any','min' => 0]) }}
                  @error('partial_price')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-md-6">
                  {{ Form::label('price','Precio(Imp.inc.)') }}
                  {{ Form::number('price',0,['class' => 'form-control','wire:model' =>'price','step' =>'any','min' => 0]) }}
                  @error('price')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
            </div>

            <div class="row mtop16">                
                <div class="col-md-6">
                  {{ Form::label('discount_type','Tipo Descuento')}}
                  {{ Form::select('discount_type',[0=>'No',1=>'Sí',2=>'Personalizado'],null,['class' => 'form-control','wire:model' => 'discount_type'])}}
                  @error('discount_type')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-md-6">
                  {{ Form::label('weight','Descuento(%)')}}
                  {{ Form::number('discount',null,['class' => 'form-control','wire:model' => 'discount'])}}
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
                    {!! Form::date('init_discount',null,['class'=> 'form-control','wire:model' => 'init_discount']) !!}
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
                    {!! Form::date('end_discount',null,['class'=> 'form-control','wire:model' => 'end_discount']) !!}
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
                        @this.detail2=this.getData();
                    });
                  </script>
                </div>
            </div>
          </div>-->
        </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn_sail btn_sry" data-bs-dismiss="modal" wire:click.prevent="clear2()">Cancelar</button>
        <button type="button" class="btn btn-sm btn_sail btn_pry" wire:click.prevent="update()" id="btn_update">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<script>
  //mostramos el loading duplicado al actualizar y ocultamos al comenzar el método update()
  let btn_update=document.querySelector('#btn_update');
  if(btn_update){
    btn_update.addEventListener('click',()=>{
      let loading = document.querySelector('#loading');
      loading.style.display='flex';
    })
  }

  //no necesario
  /*
  let typeProduct = document.querySelector('#type_product');
  typeProduct.addEventListener('change',()=>{
      console.log(typeProduct.value)
      if(typeProduct.value == 0){
        console.log("se ha cambiado a simple, enviar mensaje si existen combinaciones")
      }else if(typeProduct.value == 1){
        console.log("se ha cambiado a variable, mostrar combinaciones");
      }
  })
  */

</script>