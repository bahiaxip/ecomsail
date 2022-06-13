<div>
    
    <div class="" style="width:100%;display:flex;">
        <li class="nav-item" style="float:left;list-style:none;color:orange;display:flex">
            <a href="{{url('/')}}" class="nav-link lk-home" style="color:#696969;display:flex">
                <span>ECOMSAIL</span>
            </a>
        </li>
        <li style="list-style: none;margin:auto">
            <input type="search" name="search" class="form-control" size="100" placeholder="Buscar...">
        </li>
    </div>
    <div class="container-fluid" style="display:flex">
        <div class="dropdown show menu_hidden">
            <a href="#" class="nav-link lk-home" type="button" id="dropdown_hidden" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-bars"></i>
            </a>
            <ul class="dropdown-menu">            
                <a href="" class="dropdown-item" data-toggle="dropdown">INICIO</a>
                <a href="" class="dropdown-item" data-toggle="dropdown">TIENDA</a>
                <a href="" class="dropdown-item" data-toggle="dropdown">OFERTAS</a>
            </ul>
        </div>
        
        <div class="lat dropdown show">
        {{--
            <li class="nav-item " >
                <a href="#" class="nav-link lk-home dropdown-toggle" id="dropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="toggleDropdown()">
                    <i class="fas fa-stream"></i> 
                    <span>CATEGORÍAS</span>
                </a>
            </li>
            <div class="dropdown-menu" id="dropdownMenuLink5" arialabelledby="dropdownMenuLink">
                @foreach($categories as $cat)
                    <a href="#" class="btn btn_sail dropdown-item">{{$cat->name}}</a>
                @endforeach            
            </div>
        --}}
        </div>
        
        <div class="nav_user" >
            <ul class="" >
                
                <li class="nav-item" style="display:flex">
                    <a href="{{url('/')}}" class="nav-link lk-home" >
                        
                        <span>INICIO</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/store')}}" class="nav-link lk-store lk-store_category lk-product_single">
                        
                        <span>TIENDA</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/')}}" class="nav-link">

                        <span>OFERTAS</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/')}}" class="nav-link">

                        <span>CONTACTO</span></a>
                </li>
                <li class="nav-item">
                    <a href="" class="cart">
                        <span  style="">
                            CARRITO
                        </span> 
                    </a>
                </li>
            </ul>
        </div>
        <div class="lat lat_right" >
            <li>
                <a href="{{url('/')}}" class="nav-link lk-home" >
                    <i class="fas fa-bag-shopping"></i> 
                    
                </a>
            </li>
            <li>
                <a href="#" class="nav-link lk-home" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user"></i>
                </a>
                <ul class="dropdown-menu"  aria-labelledby="dropdownMenuButton2" style="" >
                    <li style="">
                        <a href="/login" class="dropdown-item" >
                            Iniciar sesión                        
                        </a>
                    </li>
                    <li style="">
                        <a href="/register" class="dropdown-item" >
                            Registrarse                        
                        </a>
                    </li>
                </ul>
            </li>
        </div>
        <nav class="navbar navbar-expand-lg justify-content-center">
            
        </nav>
    </div>
    <div  class="container product_item">
        
        
        <div class="div_product  mtop32">
        
            <div class="product_gallery mtop32">
                <div class="image">
                    <div class="layer">
                        
                    </div>
                    <div wire:ignore class="product_slick">
                        <div>
                            <img src="{{$prod->path_tag.$prod->image}}" alt="" >
                        </div>
                        <div>
                            <img src="{{$prod->path_tag.$prod->image}}" alt="" >
                        </div>
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
                      <button type="button" class="btn " wire:click="add_cart">
                        <i class="fas fa-cart-plus"></i> Agregar al carrito</button>
                      {{--{{ Form::submit('Agregar al carrito',['class' => 'btn btn-success'])}}
                      --}}
                        <div class="icon_product">
                            <i class="fas fa-star"></i> 
                        </div>
                    </div>                            
                    
                </div>
                <div class="row mtop32">
                    @if(session()->has('message2'))
                        <div class="container ">
                            <div class="alert alert-{{$typealert}}">            
                                <p >{{session('message2')}}</p>
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
                     <p>{{$prod->detail}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

