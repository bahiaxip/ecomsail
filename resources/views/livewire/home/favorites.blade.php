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
    @section('title','Favoritos')
    @include('layouts.nav_user')
    @include('livewire.cart.edit_user')
    <div class="container">
        <div class="row mtop32 address">
            <div class="col-md-12 shadow">
                <div class="address_header">
                    <h5>
                        <i class="fa-solid fa-star"></i> FAVORITOS
                    </h5>                    
                </div>
                @if(!$favorites)
                <div class="empty_address alert alert-success">
                    <h5>La lista de favoritos esta vacía</h5>
                </div>
                
                @else
                <div class="div_orders">                    
                    @foreach($favorites as $favorite)
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
                    <div class="row" style="padding:10px">
                        <div class="col-8" style="display:flex">
                            
                            <div title="{{$favorite->get_product->name}}">
                                <img src="{{url($favorite->get_product->path_tag.$favorite->get_product->image)}}" alt="" width="100">
                            </div>
                            
                        </div>
                        <div class="col-4" style="display:block;margin:auto">
                            <div>
                                Total: {{number_format((float)$favorite->get_product->price,2,'.',',')}} €
                            </div>
                            <button class="btn btn_pry">
                                Eliminar
                            </button>
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
</div>
