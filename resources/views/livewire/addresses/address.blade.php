<div>
    @include('layouts.nav_user')
    @include('livewire.addresses.create')
    @include('livewire.addresses.confirm')
    <div class="container">
        <div class="row mtop32 address">
            <div class="col-md-12 shadow div_address">
                <div class="address_header">
                    <h5><i class="fa-solid fa-location-arrow"></i> DIRECCIONES</h5>
                    <button class="btn btn_pry" data-bs-toggle="modal" data-bs-target="#addAddress" >
                        Crear
                    </button>
                </div>
                @if(!$addresses)
                    <div style="display: flex;width:100%;height:100%;position:absolute;background-color: rgba(0,0,0,.5);z-index:999" >
                        <img src="{{url('icons/spinner2.svg')}}" alt="" style="margin:auto" width="100">
                    </div>
                @endif
                @php $sum=0;$total=0; @endphp
                @if($addresses->count()==0)
                
                <div class="empty_address alert alert-success">
                    <p class="mauto">Aun no existen direcciones</p>
                </div>
                
                @else
                <div class="address_orders_items">
                    <table class="table_orders_items">
                        <thead>
                            <tr>                                
                                <td ></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>                       
                                <td></td>
                                <td></td>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($addresses as $address)
                            <tr>
                                <td width="120">
                                    {{$address->name}}
                                </td>
                                <td width="120">
                                    {{$address->lastname}}
                                </td>
                                <td>
                                    {{$address->get_location->name}}
                                </td>                                
                                <td>
                                    @if($address->province_id)
                                    {{$address->get_province->name}}
                                    @else
                                    N/A
                                    @endif

                                </td>
                                
                                <td>
                                    @if($address->city_id)
                                    {{$address->get_city->name}}
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>
                                    {{$address->address_home}}
                                </td>
                                
                                <td>
                                    <div class="admin_items" style="display:flex">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" wire:click="set_default({{$address->id}})" @if($address->default == 1) checked @endif @if($addresses->count() == 1) disabled @endif>           
                                        </div>
                                        <button class="btn btn-sm delete" title="Eliminar producto" wire:click="save_address_id({{$address->id}})" data-bs-toggle="modal" data-bs-target="#confirmDel">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            
                            </tr>
                            {{--@php
                            $sum = $sum + $oi->quantity;
                            $total = $total + $oi->total;

                            @endphp
                            --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
            
            {{--
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
            --}}
        </div>
    </div>
</div>
