<div style="position:relative">
    <div class="message_modal" >
        <div class="message {{$typealert}} " >
            {{--
            <div>
                @switch($typealert)
                    @case('success')
                        <span class="success">
                            <i class="fa-solid fa-circle-check"></i>
                        </span>
                        @break
                    @case('danger')
                        <span class="danger">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </span>
                        @break
                    @case('info')
                        <span class="info">
                            <i class="fa-solid fa-circle-info"></i>
                        </span>
                        @break
                @endswitch
            </div>
            --}}
            <div>
                <span class="success">
                    <i class="fa-solid fa-circle-check"></i>
                </span>
                {{--
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
                <span class="trash @if($typealert != 'trash') {{'dnone'}} @endif">
                    <i class="fa-solid fa-trash"></i>
                </span>
                --}}
            </div>
            <div>
                <h2>
                    
                    {{session('message.title')}}                        
                    
                </h2>
            </div>
            <div>
                <h3>{{ session('message.message') }}</h3>
            </div>
            
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <script>
                
            </script>
        </div>
    </div>
    @include('layouts.nav_user')
    <div  class="container product_item" x-data="cart()" x-init="start()" x-cloak>
        <div class="btn_return">
            <button onclick="history.back()" class="btn btn-sm btn_grey">
                <i class="fa-solid fa-left-long"></i> Volver
            </button>
        </div>
        <!--
            forma abreviada
            x-transition:enter.duration.1000ms
        -->
        <div class="div_product  mtop32" 
        x-show="show2"
        x-transition:enter="transition duration-500 transform"
        x-transition:enter-start="opacity-0 -translate-x-10"
        x-transition:enter-end="opacity-100 translate-x-0"
        >
        <!--
        x-transition:enter="transition-transform transition-opacity ease-out duration-1500"
        x-transition:enter-start="opacity-0 transform translate-x-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-end="opacity-0 transform translate-x-2"
        -->
            <div class="product_gallery mtop32">
                <div class="image">
                    <div class="layer">
                        
                    </div>
                    <div wire:ignore class="product_slick">
                        <div>
                            <img src="{{$prod->path_tag.$prod->image}}" alt="" >
                        </div>
                        @if($images_products->count() > 0)
                            @foreach($images_products as $ip)
                              <div>
                                <img src="{{url($ip->path_tag.$ip->image)}}" alt="" >
                              </div>
                            @endforeach
                          @endif
                    </div>
                    
                </div>
                
            </div>
            <div class="product">
                <div class="header" style="position:relative">
                    
                    <h2>{{$prod->name}}</h2>
                    @if($prod->infoprice->discount_type == 1
                        && date('Y-m-d') >= $prod->infoprice->init_discount && date('Y-m-d') <= $prod->infoprice->end_discount)
                    <div style="position:absolute;display:flex;height:100%;width:100%;margin:auto;justify-content:end">
                        <span style="background-color:rgba(0,178,146,1);color: #FFF;display:flex;padding:20px;align-items:center">
                            -{{$prod->infoprice->discount}}%
                        </span>
                    </div>
                    @endif
                    
                </div>
                <div class="price mtop16">
                    @if($prod->infoprice->discount_type == 1
                        && date('Y-m-d') >= $prod->infoprice->init_discount && date('Y-m-d') <= $prod->infoprice->end_discount)
                    <span>
                    {{-- descuento se debe hacer al precio sin IVA --}}    
                        @php
                        $vat = 21;
                        $oper_vat = 100/($vat+100);
                        $net = $price_tmp*$oper_vat;
                        $discount = $prod->infoprice->discount;
                        $oper_discount = 100/($discount+100);
                        $discounted_net = $net * $oper_discount;
                        $final_discounted = $discounted_net *((100+$vat)/100);
                        
                        @endphp                    
                        {{-- floatval(number_format(($net*((100-$prod->infoprice->discount)/100)),2,'.','')) --}}
                        {{floatval(number_format($final_discounted,2,'.',''))}}€
                        @if($prod->stock == 0)
                        {{'Sin stock'}}
                        @endif
                    </span>
                    <span style="text-decoration:line-through;color:#696969">
                        {{$price_tmp}} €
                    </span>
                    @else
                    <span>                        
                        {{ floatval(number_format($price_tmp,2,',',''))}} €
                    </span>
                    @endif
                    <p>(Impuestos incluidos)</p>

                    @if($prod->stock == 0 || count($combinations_list) > 0 && $sum_stock == 0)
                    <p style="font-size:14px;font-weight:bold">
                        {{'Sin stock'}}
                    </p>
                    @endif
                </div>

                <div class="combinations product_combinations" >
                    @if($combinations_list && count($combinations_list) > 0)
                      @foreach($combinations_list as $key=>$comb)
                        <div class="combinations_name comb_{{$key}} ">
                            {{Form::label($comb['name'],$comb['name'])}}
                            @if($option)
        {{-- mostrar color mediante click --}}
                            <span>
                                @isset($option_name[$key])
                                    {{$option_name[$key]}}
                                @endisset
                            </span>
                            @endif
                        </div>

                        <div class="combinations_items items_{{$key}}">
                            @php
                                $type = 2;

                            @endphp
                            @if($parent_combinations->count() > 0)
                                @foreach($parent_combinations as $pc)
                                    @if($pc->parent_id == $key)
                                        @php $type=$pc->type_selection @endphp
                                    @endif
                                @endforeach
                            @endif
                            @if($type == 3)
                                @foreach($comb as $k => $c)                          
                                    @if($k != 'name')
                                    {{-- establecemos $type para después asignar el tipo de selección del producto (desplegable,botones o divs de colores) --}}
                                        
                                        {{--@if($comb[0]['color'])--}}
                                        
                                    <div class="item_color {{$type}} {{count($comb)}}">
                                    <!-- si el primer registro de la combinación 
                                    dispone de color se muestran los que tengan algún color (mediante un div con fondo del color)-->
                                        
                                        @if($c['color'])
                                            
                                            <div class="color {{$key}}"  onclick="setBorderToCombSelected(this)">
                                            
                                                <input class="mylabel_color"  type="radio" name="{{$comb['name']}}" value="{{$c['id']}}" wire:model="option.{{$key}}" wire:click="set_value({{$c['id']}})" style="background-color:{{$c['color']}};" @if($c['stock'] <= 0 || $c['disabled'] == true) {{'disabled'}} @endif/>
                                                <label for="" class="label" style="background-color:{{$c['color']}};">
                                                    <!-- mostramos icono con CSS (after)-->
                                                    <span></span>
                                                    <!--
                                                    <span class="hexa_icon" style="margin:auto;font-size:10px">&#10004; </span>
                                                    -->
                                                </label>
                                            </div>
                                        @endif
                                    
                                    </div>
                                    @endif
                                @endforeach
                            @elseif($type == 2)
                                @foreach($comb as $k => $c)
                                    @if($k != 'name')
                                        <div class="item">
                                            <div>
                                                <input class="mylabel {{$c['id']}}"  type="radio" name="{{$comb['name']}}" value="{{$c['id']}}" wire:click="set_value({{$c['id']}})" wire:model="option.{{$key}}"  @if($c['stock'] <= 0 || $c['disabled'] == true) {{'disabled'}} @endif/>
                                                <label for="" style="background-color:orange;">
                                                  {{$c['name']}}
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            
                            @else
                                <div class="col-auto">
                                <select name="" id="" class="form-select form-select-sm sel1" wire:model="option.{{$key}}" wire:click="set_value($event.target.value,{{$key}})">
                                    
                                
                                @foreach($comb as $k => $c)
                                    @if($k != 'name')
                                        <option value="{{$c['id']}}" @if($c['stock'] == 0) {{'disabled'}} @endif wire:click="set_value({{$c['id']}})" class="option_comb">{{$c['name']}} </option>
                                            
                                        
                                        
                                            
                                        
                                    @endif
                                @endforeach
                                </select>
                                </div>
                                
                            @endif
                        </div>

                        {{--
                          <select name="{{$comb['name']}}" id="" class="form-select form-select-sm">          
                                @foreach($comb as $k => $c)
                                  @if($k != 'name' && $k !== 'id')
                                  <option value="{{$c['id']}}">{{$c['name']}}</option>
                                  @endif
                                @endforeach
                          </select>
                          --}}
                      @endforeach
                    @endif
                </div>

                <div class="row ">
                    <div class="col-xl-5">
                      <div class="quantity">
                        <a href="#" class="amount_action" wire:click.prevent="change_quantity('minus')">
                          <i class="fas fa-minus"></i>
                        </a>
                        {{ Form::text('quantity',1,['class' => ' form-control-sm','min' => 1,'id' => 'add_to_cart_quantity','wire:model'=> 'quantity','disabled']) }}
                        <a href="#" class="amount_action" wire:click.prevent="change_quantity('plus')">
                          <i class="fas fa-plus"></i>
                        </a>
                      </div>
                    </div>
                    <div class="col-xl-7 quantity_btn">
                        <button type="button" class="btn" wire:click="add_cart(switchMessageSession)" @guest disabled title="Inicie sesión para añadir productos al carrito" @endguest  @if($prod->stock == 0 || $sum_stock == 0)
                        {{'disabled'}} title="Producto sin stock" @endif>
                            <i class="fas fa-cart-plus"></i> Agregar al carrito
                        </button>
                      {{--{{ Form::submit('Agregar al carrito',['class' => 'btn btn-success'])}}
                      --}}
                      {{-- se puede utilizar la clase disabled o la clase btn de bootstrap para desactivar los estilos del botón --}}
                        <button class="icon_product @guest disabled @endguest @if($favorite) active @endif" @guest title="Inicie sesión para añadir productos a la lista de favoritos" @endguest wire:click.prevent="add_favorite(switchMessageSession)" @guest disabled @endguest>
                            <i class="fas fa-star"></i> 
                        </button>
                    </div>                            
                    
                </div>
                {{--
                <div class="row mtop32" style="transition: all 1s linear">
                    @if(session()->has('message2'))
                        <div class="container " style="transition: all 1s linear">
                            <div class="product_message alert alert-{{$typealert}}" style="transition: all 1s linear">            
                                <p >{{session('message2')}}</p>
                                @if(config('ecomsail.button_adding_product') =='on')
                                <a class="btn btn-sm btn_pry" href="{{url('/cart')}}">Ver el carrito</a>
                                @endif
                                @if($errors->any())
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                @endif
                                <script>
                                    $('.alert').slideDown();
                                    setTimeout(()=>{ $('.alert').slideUp(); }, 1000);
                                </script>
                            </div>
                        </div>
                    @endif
                </div>
                --}}
                <div class="row mtop32 nav_tabs">
                    <nav>
                          <div class="nav nav-tabs" id="nav-tab" role="tablist">
                              <button class="nav-link active" id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-description" aria-selected="true">Descripción</button>              
                              <button class="nav-link" id="nav-details-tab" data-bs-toggle="tab" data-bs-target="#nav-details" type="button" role="tab" aria-controls="nav-details" aria-selected="false">Detalles</button>

                              <button class="nav-link" id="nav-dimensions-tab" data-bs-toggle="tab" data-bs-target="#nav-dimensions" type="button" role="tab" aria-controls="nav-dimensions" aria-selected="false">Dimensiones</button>

                              <button class="nav-link" id="nav-feedback-tab" data-bs-toggle="tab" data-bs-target="#nav-feedback" type="button" role="tab" aria-controls="nav-feedback" aria-selected="false">Valoraciones</button>
                          </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab" wire:ignore.self>
                            <div class="row mtop16 p10">
                                @if(config('ecomsail.state_product') == 'on')
                                <div style="width:100%;padding: 10px 0">
                                    <span style="font-weight: bold;">Estado:</span> 
                                    @if($prod->settings->product_state == 0)
                                    {{'Nuevo'}}
                                    @elseif($prod->settings->product_state == 1)
                                    {{'Usado'}}
                                    @else
                                    {{'Reacondicionado'}}
                                    @endif
                                </div>
                                @endif
                                
                                {!!$prod->short_detail!!}
                            </div>
                        </div>

                        
                        <div class="tab-pane fade" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab" wire:ignore.self>
                            <div class="row mtop16 detail" >
                                {!!$prod->detail!!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-dimensions" role="tabpanel" aria-labelledby="nav-dimensions-tab" wire:ignore.self>
                            <div class="row mtop16">
                                <div class="col-12">
                                    <p>Longitud: <span>{{($prod->settings->long) ? floatval(number_format($prod->settings->long,2,'.','')).'cm.' : 'N/A'}}</span></p>
                                    <p>Anchura: <span>{{($prod->settings->width) ? floatval(number_format($prod->settings->width,2,'.','')).'cm.' : 'N/A'}}</span></p>
                                    <p>Altura: <span>{{($prod->settings->long) ? floatval(number_format($prod->settings->long,2,'.','')).'cm.' : 'N/A'}}</span></p>
                                    <p>Peso: <span>{{($prod->settings->weight) ? floatval(number_format($prod->settings->weight,2,'.','')).'Kg.' : 'N/A'}}</span></p>    
                                </div>
                                
                                
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="nav-feedback" role="tabpanel" aria-labelledby="nav-feedback-tab" wire:ignore.self>
                            <div class="row mtop16">
                                <div class="col-12">
                                    <p>No existen valoraciones</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{--
                    
                    --}}
                </div>
            </div>
        </div>
    </div>
    
</div>


