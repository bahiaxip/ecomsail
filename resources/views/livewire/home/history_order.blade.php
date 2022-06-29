<div style="position:relative">
    <div class="message_opacity" style="opacity:0;position:absolute;top:120px;left:50%;transform:translate(-50%,-50%);z-index:1">
        <div class="alert alert-{{$typealert}}" >            
            <h2 style="font-size:1em;text-align:center">{{session('message') }}</h2>
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
                                <div class="image"  title="{{$order_item->title}}&#013;{{$order_item->price_unit}}€ X {{$order_item->quantity}}">
                                    <img src="{{url($order_item->path_tag.$order_item->image)}}" alt="" class="p10">
                                </div>
                                @endforeach
                            
                        </div>
                        <div class="col-md-3 col_price" >
                            <div>
                                <div class="price">
                                    <div style="text-align:center;font-weight:bold">
                                        Total: {{number_format(floatval(number_format($order->total,2,'.','')),0,",",".")}} €
                                    </div>
                                </div>
                                
                                <button class="btn btn_red" style="padding:4px 50px">
                                    Eliminar
                                </button>
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
