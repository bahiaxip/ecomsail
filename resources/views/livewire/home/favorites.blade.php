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
        <div class="row mtop32 favorite">
            <div class="col-md-12 shadow">
                <div class="header">
                    <h5>
                        <i class="fa-solid fa-star"></i> FAVORITOS
                    </h5>                    
                </div>
                @if(!$favorites)
                <div class="empty alert alert-success">
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
                        <div class="col-3 image" style="display:flex">
                            <div title="{{$favorite->get_product->name}}">
                                <img src="{{url($favorite->get_product->path_tag.$favorite->get_product->image)}}" alt="" width="80">
                            </div>
                        </div>
                        <div class="col-9" >
                            <div class="row">
                                <div class="col-10 title">
                                    {{$favorite->get_product->name}}
                                </div>
                                <div class="col-2 admin_items end">
                                    <button class="btn btn-sm delete_round" title="Eliminar producto" wire:click="save_product_id({{$favorite->id}})" data-bs-toggle="modal" data-bs-target="#modalConfirm">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row div_price">
                                <div class="price">
                                    <div>
                                        Total: {{number_format(floatval(number_format($favorite->get_product->price,2,'.','')),0,",",".")}} €
                                    </div>
                                    <div>
                                        Vendidos
                                    </div>
                                </div>
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
</div>
