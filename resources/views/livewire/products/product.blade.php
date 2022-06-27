<div style="position:relative">
    <div class="message_opacity" style="opacity:0;position:absolute;top:120px;left:50%;transform:translate(-50%,-50%);z-index:1">
        <div class="alert alert-{{$typealert}}" >
            <h2 style="font-size:1em;text-align:center">{{session('message') }}</h2>
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
            <button onclick="history.back()" class="btn btn-sm btn_pry">
                <i class="fa-solid fa-left-long"></i> Atrás
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
                <div class="header">
                    <h2>{{$prod->name}}</h2>
                </div>
                <div class="price">
                    <span>{{$price_tmp}} €</span> 
                    <p>(Impuestos incluidos)</p>
                </div>

                <div class="combinations product_combinations" >
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

                <div class="row ">
                    <div class="col-xl-5">
                      <div class="quantity">
                        <a href="#" class="amount_action" wire:click.prevent="change_quantity('minus')">
                          <i class="fas fa-minus"></i>
                        </a>
                        {{ Form::text('quantity',1,['class' => ' form-control-sm','min' => 1,'id' => 'add_to_cart_quantity','wire:model'=> 'quantity']) }}
                        <a href="#" class="amount_action" wire:click.prevent="change_quantity('plus')">
                          <i class="fas fa-plus"></i>
                        </a>
                      </div>
                    </div>
                    <div class="col-xl-7 quantity_btn">
                      <button type="button" class="btn " wire:click="add_cart" @guest disabled @endguest @guest title="Inicie sesión para añadir productos al carrito" @endguest>
                        <i class="fas fa-cart-plus"></i> Agregar al carrito</button>
                      {{--{{ Form::submit('Agregar al carrito',['class' => 'btn btn-success'])}}
                      --}}
                        <div class="icon_product @guest disabled @endguest @if($favorite) active @endif" @guest title="Inicie sesión para añadir productos a la lista de favoritos" @endguest wire:click.prevent="add_favorite">
                            <i class="fas fa-star"></i> 
                        </div>
                    </div>                            
                    
                </div>
                <div class="row mtop32">
                    @if(session()->has('message2'))
                        <div class="container ">
                            <div class="product_message alert alert-{{$typealert}}">            
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
                </div>
                <div class="row mtop32">
                    <h5>Descripción</h5>
                     <p>{!!$prod->detail!!}</p>
                </div>
            </div>
        </div>
    </div>
    
</div>


