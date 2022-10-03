<div style="position:relative;height:100vh"  >
    @section('title','Carrito')
    {{--
    <div class="message_opacity" style="position:absolute;opacity:0;display:flex;justify-content:center;width:100%">
        <div class="alert alert-{{$typealert}}" style="width:60%">
    --}}
    <div class="message_modal" >
        <div class="message" >
            <div>
                <span class="success @if($typealert != 'success') {{'dnone'}} @endif">
                    <i class="fa-solid fa-circle-check"></i>
                </span>
                <span class="danger @if($typealert != 'danger') {{'dnone'}} @endif">
                    <i class="fa-solid fa-circle-xmark"></i>
                </span>
                <span class="info @if($typealert != 'info') {{'dnone'}} @endif">
                    <i class="fa-solid fa-circle-info"></i>
                </span>
                <span class="warning @if($typealert != 'warning') {{'dnone'}} @endif">
                    <i class="fa-solid fa-circle-exclamation"></i>
                </span>
                <span class="question @if($typealert != 'question') {{'dnone'}} @endif">
                    <i class="fa-solid fa-circle-question"></i>
                </span>
            </div>
            <div>
                <h2 class="title" style="display:flex;align-items:center">
                    @if(session('message.title'))
                        {{session('message.title')}}
                    @endif
                </h2>
            </div>
            <div>
                <h3 class="text_message">
                    @if(session('message.message'))
                        {{ session('message.message') }}
                    @endif
                </h3>
            </div>
            
            
            <div class="buttons"></div>
            
        </div>
    </div>
    <!-- loading cuando actualizamos edición -->
    <div id="loading" style="display: none;width:100%;height:100%;position:absolute;left: 0;background-color: rgba(0,0,0,.3);z-index:999" >
        <img src="{{url('ics/loading/dualball.svg')}}" alt="" style="margin:auto" width="100">
    </div>
    @include('livewire.cart.modal_confirm')
    @include('layouts.nav_user')
    @include('livewire.cart.edit_user')

    <div class="container" x-data="cart()" x-init="start()" x-cloak >
        <div class="row mtop32 cart justify-content-between" 
            x-show="show2"
            x-transition:enter.duration.1000ms
            x-transition:leave.duration.1000ms

            
            
        >
            <div class="col-xl-8 shadow" style="position:relative">
                
                <div style="width:100%">
                <div class="header">
                    <h5><i class="fas fa-cart-arrow-down"></i> CARRITO</h5>
                </div>
                </div>
                @php $sum=0;$total=0; @endphp
                @if($orders_items->count()==0)
                
                <div class="empty">
                    <p>El carrito está vacío. Agregue productos al carrito</p>
                </div>
                
                @else
                <div class="div_list">                    
                    @foreach($orders_items as $oi)
                    {{--
                    <div class="row " style="padding:10px">
                        <div class="col-12" >
                            <div class="order_header" style="border-bottom:#696969 1px solid;display:flex;justify-content:space-between">
                                <div style="font-size:12px">
                                    Nº Pedido: <span>{{$oi->id}}</span>
                                </div>
                                <div style="font-size:12px">
                                    Realizado el <span>{{$oi->id}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    --}}
                    <div class="row list @if(!$oi->checked_stock) {{'disabled'}} @endif" >
                        @if(!$oi->checked_stock)
                        <div style="position:absolute;width:100%;height:100%;background-color:rgba(255,255,255,.7);left:0;top:0;display:flex;justify-content:center;align-items: center;">
                            <p style="color:rgb(0,178,146);font-size:25px;font-weight: bold;">Stock no disponible</p>
                        </div>
                        @endif
                        <div class="col-3 image">                            
                            <div title="{{$oi->id}}&#013;{{$oi->id}}€ X {{$oi->id}}">
                                <img src="{{url($oi->product->path_tag.$oi->product->image)}}" alt="" width="100">
                            </div>
                        </div>
                        <div class="col-9 content_cart">
                            <div class="row">
                                <div class="col-10 title">
                                    {{$oi->title}}
                                </div>
                                <div  class="col-2 admin_items end">
                                    <button class="btn btn-sm delete_round" title="Eliminar producto" onclick="message_confirm({'status':'question','id':{{$oi->id}},'type':'product' })">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            @if($oi->combinations != "null")
                            <div class="row">
                                @foreach(json_decode($oi->combinations) as $comb)
                                @php 
                                $attribute = App\Models\Attribute::findOrFail($comb->value);
                                @endphp
                                <div class="col-12">
                                    <strong>{{$attribute->parentattr->name}} :</strong> {{$attribute->name}}
                                </div>
                                @endforeach
                            </div>
                            @endif
                            <div class="row div_price" >
                                <div class="price" >
                                    <div class="main {{$oi->total}}">
                                    @if($oi->product->infoprice->discount_type == 1
                                    && date('Y-m-d') >= $oi->product->infoprice->init_discount && date('Y-m-d') <= $oi->product->infoprice->end_discount)
                                        <div>
                                        <span>
                                            {{ floatval(number_format((floatval($oi->total)*((100-$oi->discount)/100)),2,'.','')) }}€
                                        </span>
                                        &nbsp;&nbsp;
                                        <span class="through" >{{ floatval(number_format($oi->total,2,'.','')) }}€
                                        </span>
                                        </div>
                                        <div class="discount">
                                            <span>
                                                -{{$oi->product->infoprice->discount}}%            
                                            </span>
                                        </div>
                                    
                                    @else
                                    
                                    <span style="font-size:12px"> 
                                        {{--
                                        number_format(floatval(number_format($oi->total,2,'.','')),0,",",".")
                                        --}} {{--€--}}
                                        {{floatval(number_format($oi->total,2,'.',''))}}€
                                    </span>
                                    @endif
                                        
                                    </div>
                                    <div class="div_quantity">
                                        <div class="quantity">
                                            <a href="javascript:void(0)" class="amount_action" wire:click.prevent="change_quantity('minus',{{$oi->id}})" onclick="set_loading()">
                                                <i class="fas fa-minus"></i>
                                            </a>
                                            <input type="text" name="quantity" wire:model="quantity.{{$oi->id}}.quantity" onkeydown="return false">
                                            {{--
                                            {{Form::text('quantity',null,['class' => 'form-control','wire:model' => $quantity[$oi['id']]])}}
                                            --}}
                                            <a href="javascript:void(0)" class="amount_action" wire:click.prevent="change_quantity('plus',{{$oi->id}})" onclick="set_loading()">
                                              <i class="fas fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                        @if($oi->checked_stock == 1)
                        @php
                        $sum = $sum + $oi->quantity;
//si existe descuento aplicarlo
                        if($oi->state_discount == 1 && date('Y-m-d')<= $oi->end_discount){
                            $discount = $oi->discount;
                            $tax = (100-$discount)/100;
                            $total = $total + ($oi->total*$tax);

                        }else{
                            $total = $total + $oi->total;    
                        }
                        
                        $this->total = $total;
                        @endphp
                        @endif
                    @endforeach
                        @php
                        $this->sum = $sum
                        @endphp
                </div>
                @endif
            </div>
            <div class="col-md-6 col-xl-3 shadow section_finish">
                <div class="resum">
                    <span class="left">{{$sum}} @if($sum==1)Producto @else Productos @endif</span>
                    <span class="right">{{floatval(number_format($total,2,'.',''))}} €</span>
                    
                </div>
                <div class="resum">
                    <span class="left">Transporte</span>
                    <span class="right">Gratis</span>
                </div>
                
                <div class="address">
                    <a class="btn btn_sry btn_collapse" href="#collapse_address" type="button"  data-bs-toggle="collapse">
                        <i class="fa-solid fa-location-arrow"></i>
                        Dirección
                        <i class="fa-solid fa-chevron-down"></i>
                    </a>
                    <div class="collapse addresses" id="collapse_address">
                        @if($addresses->count() > 0)
                            @foreach($addresses as $adr)
                            <div class="row">
                                <div class="box_address_card @if($adr->default==1) active @endif" onclick="set_direction(this)">
                                    <div class="address_card">
                                        
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
                    <a class="btn btn_sry btn_collapse" href="#collapse_payment" type="button"  data-bs-toggle="collapse">
                        <i class="fa-solid fa-credit-card"></i>
                        Pago
                        <i class="fa-solid fa-chevron-down"></i>
                    </a>
                    <div class="collapse " id="collapse_payment">
                        
                            
                        <div class="card card-body box_payment" >

                            <div class="row">
                                
                                <div class="div_btn_payment input">
                                    <i class="fa-solid fa-check @if($payment_selected == 1) active @endif"></i>
                                    <button class="btn btn_payment @if($payment_selected == 1) active @endif" onclick="set_payment(this)">
                                        <input type="radio" name="payment_method" wire:model.defer="payment_selected" value="1">
                                            Tarjeta
                                        </input>
                                    </button>
                                </div>
                                
                                @if(config('ecomsail.payment_transfer') == 'on')
                                <div class="div_btn_payment input">
                                    <i class="fa-solid fa-check @if($payment_selected == 2) active @endif"></i>
                                    <button class="btn btn_payment @if($payment_selected == 2) active @endif" onclick="set_payment(this)">
                                        <input type="radio" name="payment_method" wire:model.defer="payment_selected" value="2">
                                            Transferencia
                                        </input>
                                    </button>
                                </div>
                                @endif
                                @if(config('ecomsail.payment_paypal') == 'on')
                                <div class="div_btn_payment input">
                                    <i class="fa-solid fa-check @if($payment_selected == 3) active @endif"></i>
                                    <button class="btn btn_payment @if($payment_selected == 3) active @endif" onclick="set_payment(this)">
                                        <input type="radio" name="payment_method" class=" " wire:model.defer="payment_selected" value="3">
                                            Paypal
                                        </input>
                                    </button>
                                </div>
                                @endif
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
                    <button id="btn_update" class="btn btn_pry" @if($orders_items->count() > 0 && $addresses->count() > 0 && $address_selected ) wire:click="finish_order" @else disabled @endif >
                        FINALIZAR COMPRA
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //eliminar producto del carrito
    function deleteId(data){
        cancelModal(data);
        //mostrar loading
        set_loading();
        @this.delete(data.id);
    }
</script>

