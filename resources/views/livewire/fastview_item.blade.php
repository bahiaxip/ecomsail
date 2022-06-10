<!-- Modal confirmación eliminar usuario -->
<div wire:ignore.self class="modal fade" id="fastview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg modal_item">
    <div class="modal-content">
      @if(!$item || $combinations_list === null )
          <div style="display: flex;width:100%;height:100%;position:absolute;background-color: rgba(0,0,0,.5);z-index:1" >
              <img src="{{url('icons/spinner2.svg')}}" alt="" style="margin:auto" width="100">
          </div>
      @endif
      @if($item)
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
                            <span>{{$item->price}} €</span> 
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
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-5">
                          <div class="quantity">
                            <a href="#" class="amount_action" wire:click.prevent="change_quantity('minus')">
                              <i class="fas fa-minus"></i>
                            </a>
                            {{ Form::number('quantity',1,['class' => 'form-control','min' => 1,'id' => 'add_to_cart_quantity','wire:model'=> 'quantity']) }}
                            <a href="#" class="amount_action" wire:click.prevent="change_quantity('plus')">
                              <i class="fas fa-plus"></i>
                            </a>
                          </div>
                        </div>
                        <div class="col-md-7 quantity_btn">
                          <button type="button" class="btn btn-sm" wire:click="add_cart">
                            <i class="fas fa-cart-plus"></i> Agregar al carrito</button>
                          {{--{{ Form::submit('Agregar al carrito',['class' => 'btn btn-success'])}}
                          --}}
                            <div class="icon">
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
      
      
      <div class="modal-footer justify-content-end">
        
        
        
        
        <button  class="btn btn-sm  btn-secondary" onclick="clearModal()" >Cancelar</button>
        
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