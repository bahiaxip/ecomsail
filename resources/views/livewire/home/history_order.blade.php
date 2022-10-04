<div style="position:relative">
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
    @include('layouts.nav_user')
    @include('livewire.home.modal_feedback')
    {{-- para no incluir $user_id2 a todo el home usamos el modal de cart --}}
    {{--@include('livewire.cart.edit_user')--}}
    <div class="container" x-data="cart()" x-init="start()" x-cloak>
        <div class="row history_order mtop32 address" 
        x-show="show2"
        x-transition:enter.duration.1000ms
        >
            <div class="col-12 shadow">
                <div class="header">
                    <h5>
                        <i class="fa-solid fa-bag-shopping"></i> PEDIDOS
                    </h5>                    
                </div>
                @if($orders->count() == 0)
                <div class="empty alert alert-success">
                    <h5>Aun no existen pedidos</h5>
                </div>
                
                @else
                <div class="div_list">                    
                    @foreach($orders as $order)
                    <div class="row p10">
                        <div class="col-12" >
                            <div class="order_num" >
                                <div>
                                    Nº Pedido: <span>{{$order->order_num}}</span>
                                </div>
                                <div>
                                    Realizado el <span>{{$order->updated_at}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row list p10">

                        <div class="col-md-9" style="display:flex">
                            
                                @foreach($orders_items[$order->id] as $order_item)
                                <div>
                                    <div class="image {{$order_item->feedback}}"  title="{{$order_item->title}}&#013;{{$order_item->price_unit}}€ X {{$order_item->quantity}}">
                                        <img src="{{url($order_item->path_tag.$order_item->image)}}" alt="" class="p10">
                                    </div>
                                    @if(count($orders_items[$order->id]) > 1 && !$order_item->feedback)
                                    <div class="" style="display:flex">
                                        <button class="btn btn-sm btn_pry mauto" wire:click="set_data({{$order_item->product_id}},{{$order->id}},{{$order_item->id}})" data-bs-toggle="modal" data-bs-target="#addFeedback">  Valorar
                                        </button>
                                    </div>
                                    @endif
                                </div>
                                @endforeach

                            
                        </div>
                        <div class="col-md-3 col_price" >
                            <div>
                                <div class="price {{$orders_items[$order->id][0]->feedback}}">
                                    <div style="text-align:center;font-weight:bold">
                                        Total: {{number_format(floatval(number_format($order->total,2,'.','')),0,",",".")}} €
                                    </div>
                                </div>
                                @if($orders_items[$order->id]->count() < 2)
                                    @if(!$order_item->feedback)
                                        <button class="btn btn_pry" style="padding:4px 50px" data-bs-toggle="modal" data-bs-target="#addFeedback" wire:click="set_data({{$order_item->product_id}},{{$order->id}},{{$order_item->id}})">
                                            Valorar
                                        </button>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    
                </div>
                <div class="row">
                    {{$orders->render()}}
                </div>
                @endif
            </div>
        </div>
        
    </div>
</div>
