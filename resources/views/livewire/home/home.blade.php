<div style="position: relative;overflow-x:hidden">

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
                <div wire:ignore>
                    @include('livewire.home.slider_home')    
                </div>
                
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
                        <a href="{{ url('/product/'.$prod->id) }}" class="image" wire:click="">
                            <div class="layer"></div>
                        </a>
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

<script>
    
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
    var slider = new MDSlider();

    
</script>
