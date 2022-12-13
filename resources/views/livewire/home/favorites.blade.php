<div >
    <div class="message_modal" >
        <div class="message" >
            <div>
                <span class="success @if($typealert != 'success') {{'dnone'}} @endif">
                    <i class="fa-solid fa-circle-check"></i>
                </span>
                <span class="danger @if($typealert != 'danger') {{'dnone'}} @endif">
                    <i class="fa-solid fa-circle-xmark"></i>
                </span>
                <span class="info @if($typealert != 'info') {{'dnone'}} @endif">
                    <i class="fa-solid fa-circle-info"></i>
                </span>
                <span class="warning @if($typealert != 'warning') {{'dnone'}} @endif">
                    <i class="fa-solid fa-circle-exclamation"></i>
                </span>
                <span class="question @if($typealert != 'question') {{'dnone'}} @endif">
                    <i class="fa-solid fa-circle-question"></i>
                </span>
            </div>
            <div>
                <h2 class="title" style="display:flex;align-items:center">
                    @if(session('message.title'))
                        {{session('message.title')}}
                    @endif
                </h2>
            </div>
            <div>
                <h3 class="text_message">
                    @if(session('message.message'))
                        {{ session('message.message') }}
                    @endif
                </h3>
            </div>
            <div class="buttons"></div>
        </div>
    </div>
    <!-- loading cuando actualizamos edición -->
    <div id="loading" style="display: none;width:100%;height:100%;position:absolute;left: 0;background-color: rgba(0,0,0,.3);z-index:999" >
        <img src="{{url('ics/loading/dualball.svg')}}" alt="" style="margin:auto" width="100">
    </div>
    @section('title','Favoritos')
    @include('layouts.nav_user')
    {{--@include('livewire.cart.edit_user')--}}
    @if(!$favorites)
    <div class="loading"   >
      <img src="{{url('ics/loading/dualball.svg')}}" alt="" style="margin:auto" width="80">
    </div>
    @else
    <div class="container" x-data="cart()" x-init="start()" x-cloak>
        <div class="row mtop32 favorite"
        x-show="show2"
        x-transition:enter.duration.1000ms
        >
            <div class="col-md-12 shadow">
                <div class="header">
                    <h5>
                        <i class="fa-solid fa-star"></i> FAVORITOS
                    </h5>                    
                </div>
                
                @if($favorites->count() == 0)
                <div class="empty">
                    <h5>La lista de favoritos esta vacía</h5>
                </div>
                
                @else
                <div class="div_list">                    
                    @foreach($favorites as $favorite)
                    <!--
                    <div class="row" style="padding:10px">
                        <div class="col-12" >
                            <div class="order_header" style="border-bottom:#696969 1px solid;display:flex;justify-content:space-between">
                                <div style="font-size:12px">
                                    Nombre: <span>{{$favorite->get_product->name}}</span>
                                </div>
                                <div style="font-size:12px">
                                    Realizado el <span>{{$favorite->updated_at}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    -->
                    <div class="row list">
                        <div class="col-3 col-lg-2 image" style="display:flex">
                            <div title="{{$favorite->get_product->name}}">
                                <a href="{{route('product',['id' => $favorite->product_id])}}">
                                    <img src="{{url($favorite->get_product->path_tag.$favorite->get_product->image)}}" alt="" width="80">
                                </a>
                            </div>
                        </div>
                        <div class="col-9 col-lg-10 content" >
                            <div class="row">
                                <div class="col-10 title">
                                    <a href="{{route('product',['id' => $favorite->product_id])}}">
                                        {{$favorite->get_product->name}}    
                                    </a>
                                    
                                </div>
                                <div class="col-2 admin_items end">
                                    <button class="btn btn-sm delete_round" title="Eliminar {{$favorite->get_product->name}}" onclick="message_confirm({'status':'question','id':{{$favorite->id}},'type':'favorite' })">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row div_soldprice">
                                <div class="soldprice">
                                    <div class="price">
                                        <!--<span>Precio:</span>--> 
                                        {{number_format(floatval(number_format($favorite->get_product->price,2,'.','')),0,",",".")}} €
                                    </div>
                                    <div class="sold">
                                        10 Vendidos
                                    </div>
                                </div>
                            </div>
                            <div class="row date_favorite">
                                Añadido: {{$favorite->created_at}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    {{$favorites->render()}}
                </div>
                @endif
                
                
                
            </div>
        </div>
    </div>
    @endif
</div>
<script>
    //eliminar producto del carrito
    function deleteId(data){
        cancelModal(data);
        //mostrar loading
        set_loading();
        @this.delete(data.id);
    }
</script>
