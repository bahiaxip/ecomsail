<div style="overflow:hidden">
	@section('title','Ofertas')

	@include('layouts.nav_user')


	<div class="offers" style="" x-data="cart()" x-init="start()" x-cloak>
		<div  >
            <div 
            x-show="show2"
            x-transition:enter.duration.1000ms
            >
	            <div class="box_categories mtop16" >
	            	<div class="nav_offers_categories">
	            		@foreach($categories as $c)
		            		@if($c->icon_awesome_offer || $c->icon_image_offer)
		            		<div class="div_category" wire:click="set_offer({{$c->id}})">
				        		<div class="category">
				        			@if($c->icon_awesome_offer)
				        			{!!$c->icon_awesome_offer!!}
				        			@else
				        			<div class="icon" style="background-image:url({{url('icons/cat_icons/'.$c->icon_image_offer)}});">
				        				
				        			</div>
				        			<input type="hidden" name="icon_hover_{{$c->id}}" data_icon="{{url('icons/cat_icons/'.$c->icon_image_offer_hover)}}">
				        			@endif
				        		</div>
				        		<span class="title">
				        			{{$c->title_offer}}
				        		</span>
			        		</div>
			        		@endif
	            		@endforeach
	            		{{--
	            		<div class="div_category">
			        		<div class="category">
			        			
			        			<i class="fa-solid fa-shoe-prints" style="font-size:2em;"></i>
			        		</div>
			        		<span class="title">
			        			Ropa
			        		</span>
		        		</div>
		        		<div class="div_category">
			        		<div class="category">
			        			<div class="icon icon_appliance">
			        				
			        			</div>
			        			<!--
			        			<img src="{{url('icons/cat_icons/others/freezer_fridge.svg')}}" alt="" style="width:100%;padding:3px">
			        			-->
			        		</div>
			        		<span class="title">
			        			Electrohogar
			        		</span>
		        		</div>
		        		<div class="div_category">
			        		<div class="category">
			        			<i class="fa-solid fa-toolbox" style="font-size:2em;"></i>	        			
			        		</div>
			        		<span class="title">
			        			Bricolaje
			        		</span>
						</div>		        		
		        		<div class="div_category">
			        		<div class="category">
			        			<i class="fa-solid fa-laptop" style="font-size:2em"></i>	        			
			        		</div>
			        		<span class="title">
			        			Informática
			        		</span>
		        		</div>
		        		<div class="div_category">
			        		<div class="category">
			        			<div class="icon icon_garden">
			        				
			        			</div>
			        			<!--
			        			<img src="{{url('icons/cat_icons/others/garden.svg')}}" alt="" style="width:100%;padding:3px">
			        			-->
			        		</div>
			        		<span class="title" >
			        			Jardín
			        		</span>
		        		</div>
		        		<div class="div_category">
			        		<div style="width:50px;height:50px;margin:auto 25px;display:flex;align-items:center;justify-content:center">
			        			<img src="{{url('icons/cat_icons/others/beauty_care.svg')}}" alt="" style="width:100%;padding:5px">
			        			       			
			        		</div>
			        		<span class="title">
			        			Belleza
			        		</span>
		        		</div>
		        		--}}
	        		</div>
	            </div>
	            <div class="box_products_list mtop32" >
	            	<div class="div_products_list mtop16">
	            		<div class="mtop16">
	            			@isset($products)
		                    @if($products->count()==0)
		                    <p>No existen productos</p>
		                    @else
		                        @foreach($products as $prod)    
		                            <div class="products mtop32">
		                                @if($prod->infoprice->discount_type == 1
		                                    && date('Y-m-d') >= $prod->infoprice->init_discount && date('Y-m-d') <= $prod->infoprice->end_discount)
		                                <a href="{{ url('/product/'.$prod->id) }}" class="layer" >
		                                    <div class="content">
		                                        <span>
		                                            -{{$prod->infoprice->discount}}%            
		                                        </span>
		                                    </div>
		                                </a>
		                                @endif
		                            	
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
		                                    @if($prod->infoprice->discount_type == 1
		                                    && date('Y-m-d') >= $prod->infoprice->init_discount && date('Y-m-d') <= $prod->infoprice->end_discount)
		                                        
		                                        <span>{{ floatval(number_format(($prod->price*((100-$prod->infoprice->discount)/100)),2,'.','')) }}€</span>
		                                        &nbsp;&nbsp;
		                                        <span style="text-decoration:line-through;color:#696969">{{ floatval(number_format($prod->price,2,'.','')) }}€</span>
		                                            
		                                    @else
		                                        <span>{{ floatval(number_format($prod->price,2,'.','')) }}€</span>
		                                    @endif
		                                    </div>                                
		                                </a>
		                                
		                            </div>
		                            <div wire:loading wire:target="products">
		                                <img src="{{url('icons/loading/dualball.svg')}}" alt="" style="margin:auto" width="32">
		                            </div>
		                        @endforeach
	                    	@endif
	                    	@endisset
	                    </div>
	            	</div>
	            	<div class="row mtop16">
	                    {{$products->render()}}
	                </div>

	            <!--
	            <div class="mtop16" style="">
	            	<div style="width:100%;height:300px;">
	            		<div class="" style="height:40px;background-color:rgba(0,178,146,1);border-top-left-radius:8px;border-top-right-radius:8px">
	            		</div>
	            		<div style="height:220px;width:100%;display:flex;align-items:center">
	            			<div style="margin:1% 4%;width:20%">            				
	            				<h2 style="font-size:20px">Mi texto</h2>
	        				</div>
	        				<div style="width:80%;position:relative;height:auto">
	        					<img src="{{ url('/images/products/clothes/dress/grace_karin_murcielago/grace_karin_murcielago_negro.jpg')}}" style="height:200px;margin:auto" alt="">
	        				</div>
	            		</div>
	            		<div style="height:40px;background-color:rgba(0,178,146,1);border-bottom-left-radius:8px;border-bottom-right-radius:8px">
	            			
	            		</div>
	            		
	            	</div>
	            </div>
	            <div class="mtop16" style="">
	            	<div style="width:100%;height:300px;border-radius:8px;border: #D3D3D3 1px solid;background:linear-gradient(45deg, rgba(0,178,146,1) 40%,#FFFFFF 40%);">
	            		
	            		<div style="height:300px;display:flex">
	            			<div style="width:30%;margin:auto 4%;color: #FFF">
	            				<h2 style="line-height:2em">Mi texto sdfasdfasdf fddfasdfasdf fdsafdsfasdfa</h2>	
	            			</div>
	            			<div style="width:70%;margin:auto">
	            				<img src="{{ url('/images/products/clothes/dress/grace_karin_murcielago/grace_karin_murcielago_negro.jpg')}}" style="height:250px;margin:auto" alt="">
	            			</div>
	            		</div>
	            		
	            	</div>
	            </div>
	            <div class="mtop16" style="">
	            	<div style="width:100%;height:300px;border-radius:8px;border: #D3D3D3 1px solid;background:linear-gradient(to right, rgba(0,178,146,1) 10%,#FFFFFF 60%);">
	            		
	            		<div style="height:300px;display:flex">
	            			<div style="width:30%;margin:auto 4%;color: #FFF">
	            				<h2 style="line-height:2em">Mi texto sdfasdfasdf fddfasdfasdf fdsafdsfasdfa</h2>	
	            			</div>
	            			<div style="width:70%;margin:auto">
	            				<img src="{{ url('/images/products/clothes/dress/grace_karin_murcielago/grace_karin_murcielago_negro.jpg')}}" style="height:250px;margin:auto" alt="">
	            			</div>
	            		</div>
	            		
	            	</div>
	            </div>
				-->
			</div>
			@if($offers->count() > 0)
            <div style="width:100%;border-top:#D3D3D3 1px solid">
                <div class="box_offers" >
                    <h2>Ofertas</h2>
                    <div class="div_products_list mtop16" style="display:inline-flex;flex-flow:row nowrap;overflow:auto;position:relative">
                        <div class="sticky left" >                            
                            <button onclick="scroller('offers','left')">
                                <i class="fa-solid fa-chevron-left"></i>
                            </button>
                        </div>
                        
                        @foreach($offers as $offer)
                        <div class="products mtop32" style="margin:auto 20px;max-width:150px;">
                            @if($offer->infoprice->discount_type == 1
                                && date('Y-m-d') >= $offer->infoprice->init_discount && date('Y-m-d') <= $offer->infoprice->end_discount)
                            <a href="{{ url('/product/'.$offer->id) }}" wire:click="" class="layer">
                                <div class="content">
                                    <span>
                                        -{{$offer->infoprice->discount}}%            
                                    </span>
                                </div>
                            </a>
                            @endif
                            <a href="{{ url('/product/'.$offer->id) }}" class="image" wire:click="">
                                <img src="{{$offer->path_tag.$offer->image}}" alt="">
                            </a>
                            <a href="{{ url('/product/'.$offer->id) }}" title="{{$offer->name}}">
                                <div class="title">
                                    {{$offer->name}}
                                </div>
                                <div class="price">
                                    @if($offer->infoprice->discount_type == 1
                                        && date('Y-m-d') >= $offer->infoprice->init_discount && date('Y-m-d') <= $offer->infoprice->end_discount)
                                    <span>
                                        {{ floatval(number_format(($offer->price*((100-$offer->infoprice->discount)/100)),2,'.',',')) }}€
                                    </span>
                                    &nbsp;&nbsp;
                                    <span style="text-decoration:line-through;color:#696969">
                                        {{ floatval(number_format($offer->price,2,'.',',')) }}€
                                    </span>
                                    @else
                                        <span>{{ floatval(number_format($offer->price,2,'.',',')) }}€</span>
                                    @endif
                                </div>
                            </a>
                        </div>
                        @endforeach
                        <div class="sticky right">                            
                            <button onclick="scroller('offers','right')" >
                                <i  class="fa-solid fa-chevron-right"></i>
                            </button>
                        </div>
                        <input id="auto" type="hidden" value="{{Config::get('ecomsail.owner_name')}}">
                    </div>
                </div>
            </div>
            @endif
			@include('layouts.footer')
        </div>
		
	</div>
</div>