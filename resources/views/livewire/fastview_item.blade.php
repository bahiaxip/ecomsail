<!-- Modal confirmación eliminar usuario -->
<div wire:ignore.self class="modal fade" id="fastview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-xl modal_item">
    <div class="modal-content">
      @if(!$item)
          <div style="display: flex;width:100%;height:100%;position:absolute;background-color: rgba(0,0,0,.5);z-index:1" >
              <img src="{{url('icons/spinner2.svg')}}" alt="" style="margin:auto" width="100">
          </div>
      @endif
      @if($item)
      <div class="row">
        <div class="col-md-4 carousel_item">
            <img src="{{$item->path_tag.$item->image}}" alt="" width="128">
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
                    </div>
                    <div class="row ">
                        <div class="col-md-4">
                          <div class="quantity">
                            <a href="#" class="amount_action" data-action="minus">
                              <i class="fas fa-minus"></i>
                            </a>
                            {{ Form::number('quantity',1,['class' => 'form-control','min' => 1,'id' => 'add_to_cart_quantity']) }}
                            <a href="#" class="amount_action" data-action="plus">
                              <i class="fas fa-plus"></i>
                            </a>
                          </div>
                        </div>
                        <div class="col-md-4 quantity_btn">
                          <button type="submit" class="btn btn-sm">
                            <i class="fas fa-cart-plus"></i> Agregar al carrito</button>
                          {{--{{ Form::submit('Agregar al carrito',['class' => 'btn btn-success'])}}
                          --}}
                            <div class="icon">
                                <i class="fas fa-star"></i> 
                            </div>
                        </div>
                            
                        <div class="col-md-4 cart_icon">

                              
                              
                              
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
        
        
        
        
        <button type="button" class="btn btn-sm  btn-secondary" onclick="clearModal()" wire:click="clear_fastview">Cancelar</button>
        
      </div>
    </div>
  </div>
</div>