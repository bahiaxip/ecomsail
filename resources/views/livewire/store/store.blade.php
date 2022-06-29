<div class="store" style="position:relative">

	
	@include('layouts.nav_user')
	<div style="width:100%" x-data="cart()" x-init="start()" x-cloak>
        <div  class="box_products" >

            <div 
            x-show="show2"
            x-transition:enter.duration.1000ms
            >
            	
                <div class="div_products_list mtop32">
                	<div style="display:flex;justify-content: center;">
                		<div style="outline:#696969 1px solid;padding: 5px;border-radius:5px;">
	            			<a href="#" class="" style="margin:5px"> Precio</a>
	            			<a href="#" class=""> Pedidos</a>
	            			<a href="#" class=""> Promo</a>
            			</div>
            		</div>
                @foreach($products as $prod)    
                    <div class="products mtop32">
                    	<a href="{{ url('/product/'.$prod->id) }}" class="image" >
                    		<div class="layer"></div>
                    	</a>
                        <a href="{{ url('/product/'.$prod->id) }}" class="image" >
                            {{--
                            <div class="layer">
                                <div class="favorite">
                                    <div class="icon">
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                                <div class="plus">
                                    <div class="plus_btn">
                                        <button class="btn btn-sm btn_pry"  wire:click.prevent="fastview({{$prod->id}})">
                                            <i class="fa-solid fa-eye"></i> Vista rápida
                                        </button>
                                    </div>
                                </div>
                            </div>
                            --}}
                            <img src="{{$prod->path_tag.$prod->image}}" alt="">
                        </a>
                        <a href="{{ url('/product/'.$prod->id) }}" title="{{$prod->name}}">
                            <div class="title">
                            
                                {{$prod->name}}
                            
                            </div>
                            <div class="price">
                                <span>{{$prod->price}} €</span>
                            </div>
                        </a>
                        
                    </div>
                @endforeach
                </div>
                <div class="row">
                    {{$products->render()}}
                </div>
            </div>
            
        </div>
    @include('layouts.footer')           
    </div>
</div>