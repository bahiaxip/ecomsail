<div class="store" style="position:relative">

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
                <div class="div_products_list mtop32">
                	<div style="display:flex;justify-content: center;">
                        <div style="margin:auto 10px">
                            {{ Form::select('category',$categories_list,null,['class' => 'form-select','wire:model' => 'category','wire:change' => 'set_category'])}}
                        </div>

                        <div style="margin:auto 10px">
                            
                            <select name="subcategory" id="subcategory" class="form-select" wire:model="subcategory" wire:change="set_category">
                                @foreach($subcategories_list as $key=>$sl)
                                <option wire:key="{{$key}}" value="{{$key}}">{{$sl}}</option>
                                @endforeach
                            </select>
                            {{--
                            {{ Form::select('subcategory',$subcategories_list,null,['class' => 'form-select','wire:model' => 'subcategory','wire:change' => 'set_category'])}}
                            --}}
                            
                        </div>
                		
            		</div>
                    <div class="mtop16" style="display:flex;justify-content: center;">
                        <div style="outline:#D3D3D3 1px solid;padding: 5px;border-radius:5px;">
                            <a href="#" class="" style="margin:5px"> Vendidos</a>
                            <a href="#" class=""> Promo</a>
                            <a href="#" class=""> Precio</a>
                        </div>
                    </div>
                @if($products->count()==0)
                    <p>No existen productos</p>
                @else
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
                                                <i class="fa-solid fa-eye"></i> Vista r??pida
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
                                    <span>{{$prod->price}} ???</span>
                                </div>
                            </a>
                            
                        </div>
                        <div wire:loading wire:target="products">
                            <img src="{{url('icons/loading/dualball.svg')}}" alt="" style="margin:auto" width="32">
                        </div>
                    @endforeach
                @endif
                </div>

                <div class="row">
                    {{$products->render()}}
                </div>
            </div>
            
        </div>
    @include('layouts.footer')           
    </div>
    @endif
</div>