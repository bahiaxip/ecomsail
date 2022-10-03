<!-- Modal confirmación eliminar usuario -->
<div wire:ignore.self class="modal fade" id="fastview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg modal_item">
    <div class="modal-content">
      @if(session()->has('message'))
          <div class="container ">
              <div class="alert alert-{{$typealert}}">            
                  <h2 >{{session('message') }}</h2>
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
      @if(!$item || $combinations_list === null )
          <div style="display: flex;width:100%;height:100%;position:absolute;background-color: rgba(0,0,0,.5);z-index:1" >
              <img src="{{url('ics/loading/dualball.svg')}}" alt="" style="margin:auto" width="100">
          </div>
      @endif
      @if($item)
      {{ Form::hidden('product_id',$item->id)}}
      <div  class="row">
        <div class="col-md-4 carousel_item">          
            <div class="productmodal_slick">
              <div>
                  <img src="{{$imagen}}" alt="" width="128" >
                </div>
              @if($images_products->count() > 0)
                @foreach($images_products as $ip)
                  <div>
                    <img src="{{$ip->path_tag.$ip->image}}" alt="" width="128">
                  </div>
                @endforeach
              @endif
            </div>
        </div>
        <div class="col-md-8 " >
            <div class="modal-header justify-content-center title_item">
                <h5>{{$item->name}}</h5>
            </div>
            <div class=" modal-body ">

                <div class="quantity_item">
                    <div class="row">
                        <div class="price">
                            <span>{{ $price_tmp }} €</span> 
                            <p>(Impuestos incluidos)</p>
                        </div>
                        <div class="combinations" >
                            @if($combinations_list && count($combinations_list) > 0)
                              @foreach($combinations_list as $key=>$comb)
                                <div class="combinations_name">
                                    {{Form::label($comb['name'],$comb['name'])}}
                                </div>
                                <div class="combinations_items">
                                  
                                  @foreach($comb as $k => $c)
                                    @if($k != 'name')
                                        <div class="item">
                                          
                                            <input class="mylabel"  type="radio" name="{{$comb['name']}}" value="{{$c['id']}}" wire:model="option.{{$key}}"  />
                                            <label for="" >
                                              {{$c['name']}}
                                          </label>
                                          {{--{{$c['name']}}--}}
                                          
                                        </div>
                                        
                                    @endif
                                  @endforeach
                                  </div>
                                  <script>

                                    //livewire no permite establecer checked, ya que
                                    //el input radio se establece mediante wire:model
                                    //esto genera conflictos al pasar un array, así que
                                    //checkeamos desde JS al acceder al modal
                                    
                                    
                                  </script>
                                <!--
                                  <select name="{{$comb['name']}}" id="" class="form-select form-select-sm">          
                                        @foreach($comb as $k => $c)
                                          @if($k != 'name' && $k !== 'id')
                                          <option value="{{$c['id']}}">{{$c['name']}}</option>
                                          @endif
                                        @endforeach
                                  </select>
                                  -->
                              @endforeach
                            @endif
                            @error('option')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-5">
                          <div class="quantity">
                            <a href="#" class="amount_action" wire:click.prevent="change_quantity('minus')">
                              <i class="fas fa-minus"></i>
                            </a>
                            {{ Form::number('quantity',1,['class' => 'form-control','min' => 1,'id' => 'add_to_cart_quantity','wire:model'=> 'quantity','readonly' => 'true']) }}
                            <a href="#" class="amount_action" wire:click.prevent="change_quantity('plus')" >
                              <i class="fas fa-plus"></i>
                            </a>
                          </div>

                        </div>
                        <div class="col-md-7 quantity_btn">
                          <button type="button" class="btn btn-sm" wire:click.prevent="add_cart" @guest disabled @endguest @guest title="Inicie sesión para añadir productos al carrito" @endguest>
                            <i class="fas fa-cart-plus"></i> Agregar al carrito</button>
                          {{--{{ Form::submit('Agregar al carrito',['class' => 'btn btn-success'])}}
                          --}}
                            <div class="icon @guest disabled @endguest" @auth wire:click.prevent="add_favorite" @endauth @guest title="Inicie sesión para añadir productos a la lista de favoritos" @endguest>
                                <i class="fas fa-star"></i> 
                            </div>
                        </div>
                    </div>
                    <div class="row mtop32">
                        <h5>Descripción</h5>
                         <p>{{$item->detail}}</p>
                    </div>
                </div>
            </div>
        </div>
      </div>
      @endif
      
      
      <div class="modal-footer fastview_footer">
        @if(session()->has('message2'))
            <div class="container ">
                <div class="fastview_message alert alert-{{$typealert}}">            
                    <p >{{session('message2')}}</p>
                    <a class="btn btn-sm btn_pry" href="{{url('/cart')}}">Ver el carrito</a>
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
        
        
        
        <button  class="btn btn-sm  btn-secondary" onclick="clearModal()" wire:click="clear_product">Cancelar</button>
        
      </div>
    </div>
  </div>
</div>
@push('scripts')
<script>
$(document).ready(()=>{
           
    
  
})
</script>
@endpush