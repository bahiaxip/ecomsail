<div style="position: relative;overflow:hidden">

    @section('title','Inicio')
    <div class="message_opacity" >
        <div class="alert alert-{{$typealert}}" >            
            <h2 style="font-size:1em;text-align:center">{{session('message')}}
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
    
    @include('livewire.home.fastview_item')
    @include('layouts.nav_user')

    {{--@include('livewire.home.edit_user')--}}


    
    <div style="width:100%" x-data="cart()" x-init="start()" x-cloak>
        <div  class="box_products" >
            <div 
            x-show="show2"
            x-transition:enter.duration.1000ms
            >
                @if($main_slider == 'on')
                <div wire:ignore>
                    @include('livewire.home.slider_home')    
                </div>
                @endif
                
                <div class="div_products_list mtop32">
                    <div class="row">
                        <div class="col" style="text-align:left">
                            <p style="font-family:QuicksandB;font-size:22px">
                                Últimos productos
                            </p>
                        </div>
                    </div>
                @foreach($products as $prod)    
                    <div class="products mtop32">
                        @if($prod->infoprice->discount_type == 1
                            && date('Y-m-d') >= $prod->infoprice->init_discount && date('Y-m-d') <= $prod->infoprice->end_discount)
                        <a href="{{ url('/product/'.$prod->id) }}" wire:click="" class="layer">
                            <div class="content">
                                <span>
                                    -{{$prod->infoprice->discount}}%            
                                </span>
                            </div>
                        </a>
                        @endif
                        <a href="{{ url('/product/'.$prod->id) }}" class="image" wire:click="">
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
                                <span>
                                    {{ floatval(number_format(($prod->price*((100-$prod->infoprice->discount)/100)),2,'.',',')) }}€
                                </span>
                                &nbsp;&nbsp;
                                <span style="text-decoration:line-through;color:#696969">
                                    {{ floatval(number_format($prod->price,2,'.',',')) }}€
                                </span>
                                @else
                                    <span>{{ floatval(number_format($prod->price,2,'.',',')) }}€</span>
                                @endif
                            </div>
                        </a>
                    </div>
                @endforeach
                </div>

                
            </div>
            
        </div>
        <div style="display:block;width:92%;margin:auto">
                <h2 style="font-size:22px">Más Vendidos</h2>
                <div class="div_products_list mtop16" style="display:inline-flex;flex-flow:row nowrap;overflow:auto;position:relative">
                    <div style="position:sticky;top:50%;left:5%;transform:translate(-50%,-50%);z-index:10">
                        <button class="btn btn_pry">Left</button>
                    </div>
                    
                    @foreach($sold_products as $sold)
                    <div class="products mtop32" style="margin:auto 20px;max-width:150px;">
                        @if($sold->product->infoprice->discount_type == 1
                            && date('Y-m-d') >= $sold->product->infoprice->init_discount && date('Y-m-d') <= $sold->product->infoprice->end_discount)
                        <a href="{{ url('/product/'.$prod->id) }}" wire:click="" class="layer">
                            <div class="content">
                                <span>
                                    -{{$sold->product->infoprice->discount}}%            
                                </span>
                            </div>
                        </a>
                        @endif
                        <a href="{{ url('/product/'.$sold->id) }}" class="image" wire:click="">
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
                            <img src="{{$sold->product->path_tag.$sold->product->image}}" alt="">
                        </a>
                        <a href="{{ url('/product/'.$sold->id) }}" title="{{$sold->product->name}}">
                            <div class="title">
                                {{$sold->product->name}}
                            </div>
                            <div class="price">
                                @if($sold->product->infoprice->discount_type == 1
                                    && date('Y-m-d') >= $sold->product->infoprice->init_discount && date('Y-m-d') <= $sold->product->infoprice->end_discount)
                                <span>
                                    {{ floatval(number_format(($sold->product->price*((100-$sold->product->infoprice->discount)/100)),2,'.',',')) }}€
                                </span>
                                &nbsp;&nbsp;
                                <span style="text-decoration:line-through;color:#696969">
                                    {{ floatval(number_format($sold->product->price,2,'.',',')) }}€
                                </span>
                                @else
                                    <span>{{ floatval(number_format($sold->product->price,2,'.',',')) }}€</span>
                                @endif
                            </div>
                        </a>
                    </div>
                    @endforeach
                    <div style="position:sticky;top:50%;right:5%;transform:translate(-50%,-50%);z-index:10">
                        <button class="btn btn_pry">Right</button>
                    </div>
                    <input id="auto" type="hidden" value="{{Config::get('ecomsail.owner_name')}}">
                </div>
            </div>

    @include('layouts.footer')           
    </div>
    
</div>

<script>
    //obtenemos los valores de ajustes del slider

    var config;
    var slider;
    document.addEventListener('livewire:load', function () {
        mainSlider = @this.main_slider;
        if(mainSlider == 'on'){
            config = {
                autoslide : @this.autoslide,
                timeInterval : @this.time_interval
            }
            console.log(config)
            slider = new MDSlider(config);    
        }
        
        
    })
    //var data = @this.autoslide;
    /*
    function modalFastview(){
       console.log($('.productmodal_slick'))
        $('#fastview').modal('show');

        if(!sliderfirst){
            setTimeout(()=>{
                $('.productmodal_slick').slick({
                  dots:true,
                  infinite:true,
                  autoplay:true,
                  autoplaySpeed:4000,
                  
              });
                console.log($('.productmodal_slick'));
            },100);
            sliderfirst = true
        }else{
            sliderfirst=false;
            setTimeout(()=>{
                $('.productmodal_slick').slick({
                  dots:true,
                  infinite:true,
                  autoplay:true,
                  autoplaySpeed:4000,
                  
              });
                console.log($('.productmodal_slick'));
            },100);
            console.log("primero");
        }
    }
    */
    function clearModal(data=null){
        @this.data = "false";
        //$('.productmodal_slick').slick('destroy').slick();
        //$('.productmodal_slick')[0].slick.destroy();
        //$('.productmodal_slick')[0].slick.unslick();
        $('.productmodal_slick').slick('unslick').slick('slickRemove');
        //$('.productmodal_slick').slick('unslick');
        $('.productmodal_slick').slick('destroy');
        //$('.productmodal_slick').html('<div><img src="/images/products/appliance/fridges/candy_CMDDS/candy_CMDDS.jpg" width="128"></div>');
        //$('.productmodal_slick').slick('destroy').slick();
        if(!data){
            $('#fastview').modal('hide');

        }
        console.log("modal: ",$('.productmodal_slick'))
    }
    console.log("config es: ",config)
    

    
</script>
