<div>
    @include('livewire.fastview_item')
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
    <div  class="container">
        <div wire:ignore>
            @include('livewire.slider_home')    
        </div>
        
        <div class="div_products_list mtop32">
        @foreach($products as $prod)    
            <div class="products mtop32">
                <div class="image" onclick="modalFastview(event)" wire:click.prevent="fastview({{$prod->id}})">
                    <div class="layer">
                        <div class="favorite">
                            <div class="icon">
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                        <div class="plus">
                            <div class="plus_btn">
                                <button class="btn btn-sm btn_pry">
                                    <i class="fa-solid fa-cart-plus"></i> Añadir al carrito
                                </button>
                            </div>
                        </div>
                    </div>
                    <img src="{{$prod->path_tag.$prod->image}}" alt="">
                </div>
                <div class="title">
                    {{$prod->name}}        
                </div>
                <div class="price">
                    {{$prod->price}} €
                </div>
            </div>
        @endforeach
    </div>
    
</div>

<script>
    function toggleDropdown(){
        $('#dropdownMenuLink5').toggle()    
    }

    function modalFastview(){
       
        $('#fastview').modal('show');
    }

    function clearModal(){
        $('#fastview').modal('hide');
    }
    var slider = new MDSlider();
</script>
