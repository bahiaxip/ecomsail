<!-- Modal crear producto -->
<div wire:ignore.self class="modal fade " id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <div class="modal-title h5">
          Crear Producto
        </div>
      </div>
      <!-- loading cuando actualizamos edición -->
      <div id="loading" class="div_loading loading_update">
        <img src="{{url('ics/loading/dualball.svg')}}" alt="dualball.svg">
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              {{ Form::label('nombre','Nombre') }}
              <div class="input-group">
                <span class="input-group-text">
                  <i class="fa-solid fa-keyboard"></i>
                </span>                
                <!--<input type="text" name="name" class="form-control" wire:model="name"/>-->
                {{ Form::text('nombre',null,['class' => 'form-control','wire:model' =>'name'])}}
              </div>
              @error('name')
              <p class="text-danger">{{$message}}</p>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="status">Estado</label>
              {{ Form::select('status',[0 => 'Borrador',1 => 'Público'],null,['class' => 'form-select', 'wire:model' => 'status'])}}
            </div>
            
          </div>
          <div class="row mtop16">
            <div class="col-md-6">
              {{ Form::label('category','Categoría') }}

              {{ Form::select('category',$cats,null,['class' => 'form-select', 'wire:model' => 'category','wire:change' => "setSubcategories"])}}
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

              {{--{{ Form::select('subcategory',$cats,null,['class' => 'form-select', 'wire:model' => 'subcategory', if(0==0)'disabled' @endif])}} --}}
              @error('subcategory')
              <p class="text-danger">{{$message}}</p>
              @enderror

            </div>
            <!-- no funciona -->
            <div wire:loading wire:target="subcats">
                  <img src="{{url('ics/loading/dualball.svg')}}" alt="dualball.svg" style="margin:auto" width="32">
              </div>
          </div>
          
          <div class="row mtop16">
            <div class="col-md-6">
              {{ Form::label('image','Imagen') }}
              {{ Form::file('image',['class' => 'form-control','id'=>$iteration,'accept'=> 'image/*','wire:model' => 'image']) }}
              @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="col-md-6">
              {{ Form::label('code','Cod.Ref') }}
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
              {{ Form::label('price','Precio') }}
              {{ Form::number('price',0,['class' => 'form-control','wire:model' =>'price','step' =>'any','min' => 0]) }}
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
              {{ Form::text('short_detail',null,['class' => 'form-control','wire:model' => 'short_detail','maxlength' => 300])}}
              @error('short_detail')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            
          </div>
          <div class="row mtop16">
            <div class="col-md-12" wire:ignore id="form_description">
              {{ Form::label('detail','Descripción')}}
              {{ Form::textarea('detail',null,['class' => 'form-control','id' => 'friendly_edit1','wire:model'=>'detail'])}}              
              <script>
              editor_init('friendly_edit1');
                CKEDITOR.instances.friendly_edit1.on('change',function(e){
                    @this.detail=this.getData();
                    console.log("getData: ",this.getData)
                    if(this.getData() == ""){
                      console.log("description es null")
                    }
                });
              </script>
            </div>
            @error('detail')
              <p class="text-danger">{{$message}}</p>
            @enderror
          </div>

          
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" wire:click.prevent="clear2()">Cancelar</button>
        <button type="button" class="btn btn-sm back_livewire2 btn-primary" wire:click.prevent="store()" id="btn_create_products">Crear</button>
      </div>
    </div>
  </div>
</div>

@section('scripts')
<script>
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
  let btn_update=document.querySelector('#btn_update');
  if(btn_update){
    btn_update.addEventListener('click',()=>{
      let loading = document.querySelector('#loading');
      loading.style.display='flex';
    })
  }
</script>
@endsection