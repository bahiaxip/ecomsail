<div>
    @include('livewire.modal_confirm')
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
                @auth
                <li class="nav-item">
                    <a href="{{url('/cart')}}" class="cart">
                        <span  style="">
                            CARRITO
                        </span> 
                    </a>
                </li>
                @endauth
            </ul>
        </div>
        <div class="lat lat_right" >
            @auth
            <li>
                <a href="{{url('/cart')}}" class="nav-link lk-home" >
                    <i class="fas fa-bag-shopping"></i> 
                    
                </a>
            </li>
            @endauth
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
    <div class="container">
        <div class="row mtop32 cart">
            <div class="col-md-8 shadow">
                <div class="cart_header">
                    <h5><i class="fas fa-cart-arrow-down"></i> CARRITO</h5>
                </div>
                
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
                            @php $sum=0;$total=0; @endphp


                            @foreach($orders_items as $oi)
                            <tr>                                
                                <td class="image">
                                    <img style="max-width:128px;max-height:128px" src="{{url($oi->product->path_tag.$oi->product->image)}}" alt="">
                                </td>
                                <td>{{$oi->product->name}}</td>
                                <td class="quantity">
                                    {{Form::number('quantity',$oi->quantity,['class' => 'form-control','wire:model' => $quantity])}}
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
                            @endphp

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4 shadow">
                <div class="resum">
                    <span class="left">{{$sum}} Productos</span>
                    <span class="right">{{$total}} €</span>
                </div>
                <div class="resum">
                    <span class="left">Transporte</span>
                    <span class="right">Gratis</span>
                </div>
                
                <div class="address">
                    Direcciones
                </div>
                <div class="payment">
                    Tipos de pago
                </div>
                <div class="comment">
                    {{Form::label('comment','Mensaje ')}}
                    {{Form::textarea('comment',null,['class' => 'form-control'])}}
                    
                </div>
                <div class="finish_order mtop32">
                    <button class="btn btn_pry">
                        FINALIZAR COMPRA
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
