<div class="" style="width:100%;display:flex;">
    <li class="nav-item" style="float:left;list-style:none;color:orange;display:flex">
        <a href="{{url('/')}}" class="nav-link lk-home" style="color:#696969;display:flex">
            <span><img src="{{url('images/ecomsail_logo.svg')}}" alt="" style="max-height:40px"></span>
        </a>
    </li>
    <li style="list-style: none;margin:auto">
        <input type="search" name="search" class="form-control" size="100" placeholder="Buscar...">
    </li>
</div>
<div class="container-fluid box_nav_user" >
    <div class="dropdown show menu_hidden">
        <a href="#" class="nav-link lk-home" type="button" id="dropdown_hidden" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-bars"></i>
        </a>
        <ul class="dropdown-menu">            
            <a href="{{route('home')}}" class="dropdown-item"  data-toggle="dropdown">
                INICIO
            </a>
            <a href="{{route('store')}}" class="dropdown-item" data-toggle="dropdown">TIENDA</a>
            <a href="{{route('offers')}}" class="dropdown-item" data-toggle="dropdown">OFERTAS</a>
        </ul>
    </div>
    
    <div class="lat @isset($categories) categories @endisset dropdown show">
        @isset($categories)
        <li class="nav-item " >
            <a href="#" class="nav-link categories dropdown-toggle" id="dropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="toggleDropdown()">
                <i class="fas fa-stream"></i> 
                <span>CATEGORÍAS</span>
            </a>
        </li>
        <div class="dropdown-menu" id="dropdownMenuLink5" arialabelledby="dropdownMenuLink">
            @foreach($categories as $key => $cat)
            <li class="dropdown-submenu dropdown_menu1">
                <a href="{{route('store',['category' => $cat->id])}}" class="btn btn_sail dropdown-item">
                    <span>{{$cat->name}}</span>
                </a>
                <ul class="dropdown-menu dropdown_menu2">
                    @php
                    $subcat[$key] = App\Models\Category::where('type',$cat->id)->get();
                    @endphp
                    @foreach($subcat[$key] as $c)
                    <li class="dropdown-item">
                        <a href="{{route('store',['category' =>$cat->id ,'subcategory'=>$c->id])}}">
                                <span>{{$c->name}}</span>
                            </a>
                    </li>                    
                    @endforeach
                </ul>
            </li>
            @endforeach            
        </div>
        @endisset
    </div>
    
    <div class="nav_user" >
        <ul class="" >
            
            <li class="">
                <a href="{{route('home')}}" class="nav-link @if(Route::is('home')) active @endif" >
                    <span>INICIO</span>
                </a>
                <div class="layer_nav"></div>
            </li>
            <li class="">
                <a href="{{route('store')}}" class="nav-link @if(Route::is('store')) active @endif">
                    
                    <span>TIENDA</span>
                </a>
                <div class="layer_nav"></div>
            </li>
            <li class="">
                <a href="{{route('offers')}}" class="nav-link @if(Route::is('offers')) active @endif">
                    <span>OFERTAS</span>
                </a>
                <div class="layer_nav"></div>
            </li>
            <li class="nav-item">
                <a href="{{route('contact')}}" class="nav-link @if(Route::is('contact')) active @endif">
                    <span>CONTACTO</span>
                </a>
                <div class="layer_nav"></div>
            </li>
            @auth
            <li class="nav-item">
                <a href="{{route('cart')}}" class="nav-link @if(Route::is('cart')) active @endif">
                    <span>
                        CARRITO
                    </span> 
                </a>
                <div class="layer_nav"></div>
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
            @auth
            <ul class="dropdown-menu"  aria-labelledby="dropdownMenuButton2" style="" >                
                <li class="dropdown_menu_user">
                    <a href="{{route('favorites')}}" class="dropdown-item" >
                        <i class="fa-solid fa-star"></i>
                        Favoritos
                    </a>
                </li>
                <li class="dropdown_menu_user">
                    <a href="{{route('history_orders')}}" class="dropdown-item" >
                        <i class="fa-solid fa-rectangle-list"></i>
                        Pedidos
                    </a>
                </li>
                <li class="dropdown_menu_user">
                    <a href="/address/{{auth()->id()}}" class="dropdown-item" >
                        <i class="fa-solid fa-location-arrow"></i>
                        Direcciones                        
                    </a>
                </li>
                <li class="dropdown_menu_user">
                    <a class="dropdown-item" href="{{route('edit_user')}}">
                        <i class="fa-solid fa-user-pen"></i>
                        Perfil
                    </a>
                </li>
                <li class="dropdown_menu_user">
                    <a href="/logout" class="dropdown-item" >
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Cerrar sesión
                    </a>
                </li>
            </ul>
            @else
            <ul class="dropdown-menu"  aria-labelledby="dropdownMenuButton2" style="" >
                <li class="dropdown_menu_user">
                    <a href="/login" class="dropdown-item" >
                        <i class="fa-solid fa-user"></i>
                        Iniciar sesión                        
                    </a>
                </li>
                <li class="dropdown_menu_user">
                    <a href="/register" class="dropdown-item" >
                        <i class="fa-solid fa-user-plus"></i>
                        Registrarse                        
                    </a>
                </li>
            </ul>
            @endif
        </li>
    </div>
    <nav class="navbar navbar-expand-lg justify-content-center">
        
    </nav>
</div>