<div style="position:relative">
    {{--
    <div class="message_opacity" style="position:absolute;opacity:0;display:flex;justify-content:center;width:100%">
        <div class="alert alert-{{$typealert}}" style="width:60%">
    --}}
    <div class="message_opacity" style="opacity:0;position:absolute;top:120px;left:50%;transform:translate(-50%,-50%);z-index:1">
        <div class="alert alert-{{$typealert}}" style="min-width:700px">
            <h5 style="font-size:1em;text-align:center" >{{session('message') }}</h5>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <script>
                {{--
                $('.alert').slideDown();
                setTimeout(()=>{ $('.alert').slideUp(); }, 10000);
                document.querySelector('.message_opacity').style.opacity = 0;
                --}}
            </script>
        </div>
    </div>
    @include('livewire.cart.modal_confirm')
    @include('layouts.nav_user')
    @include('livewire.cart.edit_user')
    <div class="container">
        <div class="row mtop32 cart justify-content-between">
            <div class="col-xl-8 shadow">
                <div class="cart_header">
                    <h5><i class="fas fa-cart-arrow-down"></i> CARRITO</h5>
                </div>
                
                
                
                @php $sum=0;$total=0; @endphp
                @if($orders_items->count()==0)
                
                <div class="empty_cart">
                    <p>El carrito está vacío. Agregue productos al carrito</p>
                </div>
                
                @else
                <div class="cart_orders_items">
                    <table class="table_orders_items">
                        <thead>
                            <tr>                                
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            


                            @foreach($orders_items as $oi)
                            <tr>                                
                                <td class="image">
                                    <img style="max-width:128px;max-height:128px" src="{{url($oi->product->path_tag.$oi->product->image)}}" alt="">
                                </td>
                                <td>{{$oi->product->name}}</td>
                                <td class="quantity">
                                    <div class="div_quantity">
                                        <a href="#" class="amount_action" wire:click.prevent="change_quantity('minus')">
                                            <i class="fas fa-minus"></i>
                                        </a>
                                        {{Form::number('quantity',$oi->quantity,['class' => 'form-control','wire:model' => $quantity])}}
                                        <a href="#" class="amount_action" wire:click.prevent="change_quantity('plus')">
                                          <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </td>
                                <td class="subtotal">
                                    {{$oi->total}}
                                </td>
                                <td>
                                    <div class="admin_items">
                                        <button class="btn btn-sm delete" title="Eliminar producto" wire:click="save_product_id({{$oi->id}})" data-bs-toggle="modal" data-bs-target="#modalConfirm">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @php
                            $sum = $sum + $oi->quantity;
                            $total = $total + $oi->total;
                            $this->total = $total;
                            @endphp

                            @endforeach
                            @php
                            $this->sum = $sum
                            @endphp
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
            <div class="col-xl-3 shadow">
                <div class="resum">
                    <span class="left">{{$sum}} Productos</span>
                    <span class="right">{{$total}} €</span>
                </div>
                <div class="resum">
                    <span class="left">Transporte</span>
                    <span class="right">Gratis</span>
                </div>
                
                <div class="address">
                    <a class="btn btn_grey btn_collapse" href="#collapse_address" type="button"  data-bs-toggle="collapse">
                        <i class="fa-solid fa-location-arrow"></i>
                        Direcciones
                        <i class="fa-solid fa-chevron-down"></i>
                    </a>
                    <div class="collapse " id="collapse_address">
                        @if($addresses->count() > 0)
                            @foreach($addresses as $adr)
                            <div class="card card-body @if($adr->default==1) active @endif" onclick="set_direction(this)">
                                <div class="row">
                                    
                                    <div class="col-md-2 input">
                                        <input type="radio" name="address_selected" value="{{$adr->id}}" wire:model.defer="address_selected">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-title">
                                            <h5>{{$adr->title}}</h5>
                                        </div>
                                        <div class="card-subtitle">
                                            {{$adr->name}} {{$adr->lastname}}
                                        </div>
                                        <div class="card-text">
                                            <div>{{$adr->address_home}}</div>
                                            <span>
                                                {{$adr->cp}} 
                                                @if($adr->city_id){{$adr->get_city->name}}@endif
                                            </span>
                                            <div>{{$adr->get_location->name}}</div>
                                            <div>{{$adr->nif}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                        <div class="card card-body text-center nueva">
                            <p>No existen direcciones</p>
                            <a href="/address/{{$user_id}}" class="btn btn-sm btn_pry">Crear dirección</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="payment mtop10">
                    <a class="btn btn_grey btn_collapse" href="#collapse_payment" type="button"  data-bs-toggle="collapse">
                        <i class="fa-solid fa-credit-card"></i>
                        Pagos
                        <i class="fa-solid fa-chevron-down"></i>
                    </a>
                    <div class="collapse " id="collapse_payment">
                        
                            
                        <div class="card card-body" >
                            <div class="row">
                                <div class="div_btn_payment input">
                                    <button class="btn btn_payment" onclick="set_payment(this)">
                                        <input type="radio" name="payment_method" wire:model.defer="payment_selected" value="1">
                                            Tarjeta
                                        </input>
                                    </button>
                                </div>
                                <div class="div_btn_payment input">
                                    <button class="btn btn_payment" onclick="set_payment(this)">
                                        <input type="radio" name="payment_method" wire:model.defer="payment_selected" value="2">
                                            Transferencia
                                        </input>
                                    </button>
                                </div>
                                <div class="div_btn_payment input">
                                    <button class="btn btn_payment" onclick="set_payment(this)">
                                        <input type="radio" name="payment_method" class=" " wire:model.defer="payment_selected" value="3">
                                            Paypal
                                        </input>
                                    </button>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    @error('payment_selected')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="comment mtop16">
                    {{Form::label('comment','Mensaje ')}}
                    {{Form::textarea('comment',null,['class' => 'form-control','rows' => 3,'wire:model'=> 'comment'])}}
                    
                </div>
                <div class="finish_order mtop32">
                    <button class="btn btn_pry" @if($orders_items->count() > 0 && $addresses->count() > 0 && $address_selected ) wire:click="finish_order" @else disabled @endif>
                        FINALIZAR COMPRA
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
