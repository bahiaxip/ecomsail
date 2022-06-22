<div style="position:relative">
    <div class="message_opacity" style="opacity:0;position:absolute;top:120px;left:50%;transform:translate(-50%,-50%);z-index:1">
        <div class="alert alert-{{$typealert}}" style="min-width:700px">            
            <h2 style="font-size:1em;text-align:center">Usuario actualizado correctamente</h2>
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
    @include('livewire.cart.edit_user')
    <div class="container">
        <div class="row mtop32 address">
            <div class="col-12 shadow">
                <div class="address_header">
                    <h5>
                        <i class="fa-solid fa-bag-shopping"></i> PEDIDOS
                    </h5>                    
                </div>
                @if($orders->count() == 0)
                <div class="empty_address alert alert-success">
                    <h5>Aun no existen pedidos</h5>
                </div>
                
                @else
                <div class="div_orders">                    
                    @foreach($orders as $order)
                    <div class="row" style="padding:10px">
                        <div class="col-12" >
                            <div class="order_header" style="border-bottom:#696969 1px solid;display:flex;justify-content:space-between">
                                <div style="font-size:12px">
                                    Nº Pedido: <span>{{$order->order_num}}</span>
                                </div>
                                <div style="font-size:12px">
                                    Realizado el <span>{{$order->updated_at}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding:10px">
                        <div class="col-md-8" style="display:flex">
                            @foreach($orders_items[$order->id] as $order_item)
                            <div title="{{$order_item->title}}&#013;{{$order_item->price_unit}}€ X {{$order_item->quantity}}">
                                <img src="{{url($order_item->path_tag.$order_item->image)}}" alt="" width="100">
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-4" style="display:block;margin:auto">
                            <div>
                                Total: {{floatval($order->total)}} €
                            </div>
                            <button class="btn btn_pry">
                                Eliminar
                            </button>
                        </div>
                    </div>
                    @endforeach
                    
                    
                </div>
                @endif
                
                
                
            </div>
        </div>
    </div>
</div>
