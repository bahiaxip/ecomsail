<div class="store" style="position:relative">

	@section('title','Tienda')

	<div class="message_opacity" >
        <div class="alert alert-{{$typealert}}" >            
            <h2 style="font-size:1em;text-align:center">{{session('message')}}</h2>
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
	<div style="width:100%" x-data="cart()" x-init="start()" x-cloak>
        <div  class="box_products" >

            <div 
            x-show="show2"
            x-transition:enter.duration.1000ms
            >
            
                <div class="div_products_list mtop32">
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
            </div>
        </div>
    @include('layouts.footer')           
    </div>
</div>