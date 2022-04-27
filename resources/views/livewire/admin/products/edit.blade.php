<!-- Modal crear usuario -->
<div wire:ignore.self class="modal fade " id="editProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <div class="modal-title h5">
          Editar Producto
        </div>
      </div>
      <div class="modal-body">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Producto</button>
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Ajustes</button>              
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel">
            {{ Form::hidden('prod_id',null,['wire:model' => 'prod_id']) }}

            <div class="row">
              <div class="col-md-6">
                {{ Form::label('name','Nombre') }}
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="fa-solid fa-keyboard"></i>
                  </span>
                  <!--<input type="text" name="name" class="form-control" wire:model="name"/>-->
                  {{ Form::text('name',null,['class' => 'form-control','wire:model' =>'name'])}}
                </div>
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
              </div>
              <div class="col-md-6">
                {{ Form::label('category','Categoría') }}

                {{ Form::select('category',$cats,null,['class' => 'form-select', 'wire:model' => 'category'])}}
                @error('category')
                <p class="text-danger">{{$message}}</p>
                @enderror
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
                {{--
                <div class="col-md-6">
                  {{ Form::label('stock','Stock') }}
                                 
                  {{ Form::number('stock',0,['class' => 'form-control','wire:model'=>'stock'])}}
                  @error('stock')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>--}}
                <div class="col-md-6">
                  <label for="status">Estado</label>
                {{ Form::select('status',[0 => 'Borrador',1 => 'Público'],null,['class' => 'form-select', 'wire:model' => 'status'])}}
                </div>
            </div>

            <div class="row mtop16">
                <div class="col-md-6">
                  {{ Form::label('image','Imagen') }}
                  {{ Form::file('image',['class' => 'form-control','accept'=> 'image/*','wire:model' => 'image']) }}
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
                <div class="col-md-6">
                  {{ Form::label('short_detail','Descripción corta')}}
                  {{ Form::text('short_detail',null,['class' => 'form-control','wire:model' => 'short_detail','maxlength' => 40])}}
                  @error('short_detail')
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
                <div class="col-md-12" wire:ignore>
                  {{ Form::label('detail','Detalle')}}
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
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row mtop16">                
                <div class="col-md-6">
                  {{ Form::label('availability','Disponibilidad')}}
                  {{ Form::select('availability',[0=>'Online y tienda',1=>'Sólo Online',2=>'Sólo tienda'],null,['class' => 'form-control','wire:model' => 'availability'])}}
                  @error('availability')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-md-6">
                  {{ Form::label('weight','Peso(kg)')}}
                  {{ Form::text('weight',null,['class' => 'form-control','wire:model' => 'weight'])}}
                  @error('weight')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
             <div class="row mtop16">
              <div class="col-md-4">
                  {{ Form::label('long','Longitud')}}
                  {{ Form::number('long',1,['class' => 'form-control','wire:model' => 'long'])}}
                  @error('long')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="col-md-4">
                  {{ Form::label('width','Anchura')}}
                  {{ Form::text('width',null,['class' => 'form-control','wire:model' => 'width'])}}
                  @error('width')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-md-4">
                  {{ Form::label('height','Altura')}}
                  {{ Form::number('height',1,['class' => 'form-control','wire:model' => 'height'])}}
                  @error('height')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

            </div>
             <div class="row mtop16">
                <div class="col-md-6">
                  {{ Form::label('tax','Impuesto')}}
                  {{ Form::number('short_detail',null,['class' => 'form-control','wire:model' => 'tax'])}}
                  @error('tax')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <!-- imagenes de ficha técnica -->
                <div class="col-md-6">
                  {{ Form::label('attachment','Archivo adjunto(pdf)') }}
                  {{ Form::file('attachment',['class' => 'form-control','accept'=> '.pdf','wire:model' => 'attachment']) }}
                </div>
                @error('attachment')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
            </div>
            <div class="row mtop16">
                <div class="col-md-6">
                  {{ Form::label('short_detail','Descripción corta')}}
                  {{ Form::text('short_detail',null,['class' => 'form-control','wire:model' => 'short_detail'])}}
                  @error('short_detail')
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
          </div>
        </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" wire:click.prevent="clear2()">Cancelar</button>
        <button type="button" class="btn btn-sm back_livewire2 btn-primary" wire:click.prevent="update()">Actualizar</button>
      </div>
    </div>
  </div>
</div>