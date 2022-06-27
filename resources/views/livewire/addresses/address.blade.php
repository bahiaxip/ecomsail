<div style="position: relative;">
    <div class="message_opacity" style="opacity:0;position:absolute;top:120px;left:50%;transform:translate(-50%,-50%);z-index:1">
        <div class="alert alert-{{$typealert}}" style="min-width:700px">            
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
    @include('livewire.addresses.create')
    @include('livewire.addresses.confirm')
    @include('livewire.addresses.edit_user')
    <div class="container">
        <div class="row mtop32 address">
            <div class="col-md-12 shadow">
                <div class="header">
                    <div class="address_header">
                        <h5><i class="fa-solid fa-location-arrow"></i> DIRECCIONES</h5>
                        <button class="btn btn_pry" data-bs-toggle="modal" data-bs-target="#addAddress" >
                            Crear
                        </button>
                    </div>
                </div>
                @if(!$addresses)
                    <div style="display: flex;width:100%;height:100%;position:absolute;background-color: rgba(0,0,0,.5);z-index:999" >
                        <img src="{{url('icons/spinner2.svg')}}" alt="" style="margin:auto" width="100">
                    </div>
                @endif
                @php $sum=0;$total=0; @endphp
                @if($addresses->count()==0)
                
                <div class="empty alert alert-success">
                    <p class="mauto">Aun no existen direcciones</p>
                </div>
                
                @else
                <div class="addresses">
                    @foreach($addresses as $key => $adr)
                    @if($key %2 == 0  )
                    <div class="row">
                    @endif
                        <div class="col-sm-6 box_address_card @if($adr->default==1) active @endif" onclick="set_direction(this)" >
                            <div class="address_card @if($adr->default==1) active @endif" onclick="set_direction(this)" >
                            
                                <!--
                                <div class="col-md-2 input">
                                    <input type="radio" name="address_selected" value="{{$adr->id}}" wire:model.defer="address_selected">
                                </div>
                                -->
                                <div class="col-md-10 dflex" >
                                    
                                    <div class="input">
                                        <input type="radio" name="address_selected" value="{{$adr->id}}" wire:model.defer="address_selected">
                                    </div>
                                    
                                    <div>
                                    <div class="card-title">
                                        <h5>{{$adr->title}}</h5>
                                    </div>
                                    <div class="card-subtitle">
                                        {{$adr->name}} {{$adr->lastname}}
                                    </div>
                                    <div class="card-text">
                                        <div>{{$adr->address_home}}</div>
                                        <span>
                                            {{$adr->cp}} 
                                            @if($adr->city_id){{$adr->get_city->name}}@endif
                                        </span>
                                        <div>{{$adr->get_location->name}}</div>
                                        <div>{{$adr->nif}}</div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-2 actions" >
                                    <div class="delete" >
                                        <button class="btn btn-sm delete" title="Eliminar producto" wire:click="save_address_id({{$adr->id}})" data-bs-toggle="modal" data-bs-target="#confirmDel">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                    
                                    <div class="toggle" >
                                        <div class="form-check form-switch" >
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" wire:click="set_default({{$adr->id}})" @if($adr->default == 1) checked @endif @if($addresses->count() == 1) disabled @endif>           
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    @if($key %2 != 0  )
                    </div>
                    @endif
                    @endforeach
                        
                    {{--
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
                                <div class="form-check form-switch" style="display:flex;align-items:center;justify-content:center">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" wire:click="set_default({{$address->id}})" @if($address->default == 1) checked @endif @if($addresses->count() == 1) disabled @endif>           
                                </div>
                                <button class="btn btn-sm delete" title="Eliminar producto" wire:click="save_address_id({{$address->id}})" data-bs-toggle="modal" data-bs-target="#confirmDel">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    
                    </tr>                    
                    @endforeach
                    --}}
                        
                    
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
