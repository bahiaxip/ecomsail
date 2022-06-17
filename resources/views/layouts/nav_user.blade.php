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
                <a href="{{url('/')}}" class="dropdown-item" data-toggle="dropdown">INICIO</a>
                <a href="{{url('/store')}}" class="dropdown-item" data-toggle="dropdown">TIENDA</a>
                <a href="{{url('/')}}" class="dropdown-item" data-toggle="dropdown">OFERTAS</a>
            </ul>
        </div>
        
        <div class="lat dropdown show">
            @isset($categories)
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
            @endisset
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
                @auth
                <ul class="dropdown-menu"  aria-labelledby="dropdownMenuButton2" style="" >
                    <li style="">
                        <a href="/register" class="dropdown-item" >
                            <i class="fa-solid fa-user-pen"></i>
                            Mi perfil
                        </a>
                    </li>
                    <li style="">
                        <a href="/register" class="dropdown-item" >
                            <i class="fa-solid fa-star"></i>
                            Mis favoritos
                        </a>
                    </li>
                    <li style="">
                        <a href="/register" class="dropdown-item" >
                            <i class="fa-solid fa-rectangle-list"></i>
                            Historial de pedidos
                        </a>
                    </li>
                    <li style="">
                        <a href="/address/{{auth()->id()}}" class="dropdown-item" >
                            <i class="fa-solid fa-location-arrow"></i>
                            Direcciones                        
                        </a>
                    </li>
                    <li style="">
                        <a href="/logout" class="dropdown-item" >
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Cerrar sesión
                        </a>
                    </li>
                </ul>
                @else
                <ul class="dropdown-menu"  aria-labelledby="dropdownMenuButton2" style="" >
                    <li style="">
                        <a href="/login" class="dropdown-item" >
                            <i class="fa-solid fa-user"></i>
                            Iniciar sesión                        
                        </a>
                    </li>
                    <li style="">
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