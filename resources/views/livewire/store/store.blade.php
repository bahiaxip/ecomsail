<div class="store" style="position:relative;overflow:hidden">

	@section('title', $title ?? 'Todos los productos')
	@include('layouts.nav_user')
    @if(!$start)
    <div id="loading" style="display: flex;width:100%;height:100vh;position:absolute;left: 0;background-color: rgba(255,255,255,.9);z-index:999" >
        <img src="{{url('icons/loading/dualball.svg')}}" alt="" style="margin:auto" width="100">
    </div>
    @else
	<div style="width:100%" x-data="cart()" x-init="start()" x-cloak>
        <div  class="box_products" >
            <div 
            x-show="show2"
            x-transition:enter.duration.1000ms
            >
                <div class="div_products_list mtop16">
                	<div class="filters_products">
                        <a class="filter_product" href="javascript:void(0)" wire:click="set_special_filter('news')">
                            <span >Novedades</span>
                        </a>
                        <a class="filter_product" href="javascript:void(0)" wire:click="set_special_filter('sold')">
                            <span> Vendidos</span>
                        </a>
                        <a class="filter_product" href="javascript:void(0)" wire:click="set_special_filter('price')">
                            <span> Precio</span>
                        </a>
                        <a class="filter_product" href="javascript:void(0)" wire:click="set_special_filter('feed')">
                            <span> Mejor valorados</span>
                        </a>
                        
                		
            		</div>
                    <div style="display:flex;justify-content: center;margin-top:10px">
                        <div class="" style="margin:auto 10px">
                            {{--
                            {{ Form::select('category',$categories_list,null,['class' => 'form-select','wire:model' => 'category','wire:change' => 'set_category'])}}
                            --}}
                            {{--
                            Debido a un error con livewire en la primera selección de
                            category, ha sido necesario añadir un if-else para aislar 
                            el valor 0. Posiblemente el error esté relacionado con
                            el valor 0 de category, al realizar las comprobaciones, ya sea en set_category() o en render() reconoce category cuando es 0 y no debería reconocerlo, revisar en caso de error.
                            --}}
                            
                            <select name="category" id="category" class="form-select" wire:model="category" wire:change="set_category">
                                @if($categories_list)
                                @foreach($categories_list as $key=>$c)
                                @if($key == 0)
                                    @if(!$computed_cat)
                                    <option wire:key="{{$key}}"  value="{{$key}}">
                                        {{$c}}
                                    </option>
                                    @endif
                                @else
                                    <option   value="{{$key}}">
                                        {{$c}}
                                    </option>
                                @endif
                                @endforeach
                                @endif
                            </select>
                            
                        </div>

                        <div style="margin:auto 10px" class="{{$subcategory}} {{$category}}">
                            
                            <select name="subcategory" id="subcategory" class="form-select" wire:model.defer="subcategory" wire:change="set_category">
                                
                                @foreach($subcategories_list as $key=>$sl)
                                
                                <option wire:key="{{$key}}" value="{{$key}}" onmouseenter="changeColor('hola')" class="option">{{--@if($key != 0)&#x2714;&nbsp; @endif--}} {{$sl}}</option>
                                
                                @endforeach
                                
                            </select>
                            {{--
                            {{ Form::select('subcategory',$subcategories_list,null,['class' => 'form-select','wire:model' => 'subcategory','wire:change' => 'set_category'])}}
                            --}}
                            
                        </div>
                    </div>
                    <div class="mtop16">
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
                    </div>
                </div>
                @if(!$switch_special_filter)
                <div class="row pagination">
                    {{$products->render()}}
                </div>
                @endif
                @if($inf_scroll_plus)
                <div class="row btn_infscroll">                    
                    <button class="btn btn_pry infscroll" wire:click.prevent="inf_scroll" onclick="getScroll()">Cargar más</button>
                </div>
                @endif
                @include('layouts.footer')
            </div>
            
        </div>
    
    </div>
    @endif
</div>