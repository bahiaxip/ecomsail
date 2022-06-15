<div>
    @include('livewire.home.fastview_item')
    @include('layouts.nav_user')
    <div  class="container">
        <div wire:ignore>
            @include('livewire.home.slider_home')    
        </div>
        
        <div class="div_products_list mtop32">
        @foreach($products as $prod)    
            <div class="products mtop32">
                <a href="{{ url('/product/'.$prod->id) }}" class="image" wire:click="">
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
                    <img src="{{$prod->path_tag.$prod->image}}" alt="">
                </a>
                <div class="title">
                    {{$prod->name}}        
                </div>
                <div class="price">
                    <span>{{$prod->price}} €</span>
                    
                </div>
            </div>
        @endforeach
    </div>
    
</div>

<script>
    let sliderfirst = false;
    function toggleDropdown(){
        $('#dropdownMenuLink5').toggle()    
    }
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
