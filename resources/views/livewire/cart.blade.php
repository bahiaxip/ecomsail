<div>
    @include('livewire.modal_confirm')
    @include('layouts.nav_user')
    <div class="container">
        <div class="row mtop32 cart">
            <div class="col-md-8 shadow">
                <div class="cart_header">
                    <h5><i class="fas fa-cart-arrow-down"></i> CARRITO</h5>
                </div>
                @php $sum=0;$total=0; @endphp
                @if($orders_items->count()==0)
                
                <div class="empty_cart alert alert-success">
                    <h5>El carrito está vacío</h5>
                </div>
                
                @else
                <div class="cart_orders_items">
                    <table class="table_orders_items">
                        <thead>
                            <tr>                                
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            


                            @foreach($orders_items as $oi)
                            <tr>                                
                                <td class="image">
                                    <img style="max-width:128px;max-height:128px" src="{{url($oi->product->path_tag.$oi->product->image)}}" alt="">
                                </td>
                                <td>{{$oi->product->name}}</td>
                                <td class="quantity">
                                    {{Form::number('quantity',$oi->quantity,['class' => 'form-control','wire:model' => $quantity])}}
                                </td>
                                <td class="subtotal">
                                    {{$oi->total}}
                                </td>
                                <td>
                                    <div class="admin_items">
                                        <button class="btn btn-sm delete" title="Eliminar producto" wire:click="save_product_id({{$oi->id}})" data-bs-toggle="modal" data-bs-target="#modalConfirm">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @php
                            $sum = $sum + $oi->quantity;
                            $total = $total + $oi->total;
                            @endphp

                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
            <div class="col-md-4 shadow">
                <div class="resum">
                    <span class="left">{{$sum}} Productos</span>
                    <span class="right">{{$total}} €</span>
                </div>
                <div class="resum">
                    <span class="left">Transporte</span>
                    <span class="right">Gratis</span>
                </div>
                
                <div class="address">
                    Direcciones
                </div>
                <div class="payment">
                    Tipos de pago
                </div>
                <div class="comment">
                    {{Form::label('comment','Mensaje ')}}
                    {{Form::textarea('comment',null,['class' => 'form-control'])}}
                    
                </div>
                <div class="finish_order mtop32">
                    <button class="btn btn_pry">
                        FINALIZAR COMPRA
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
