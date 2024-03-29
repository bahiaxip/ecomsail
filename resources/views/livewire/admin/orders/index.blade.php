<div>
    {{-- establecemos title si subcatlist['name'] contiene valor --}}
    @section('title', 'Pedidos')

    @section('path')
    &nbsp;>&nbsp;
    <li class="list_name">
        <a href="{{ route('list_orders',['filter_type' => 1]) }}">
            <i class="fa-solid fa-bag-shopping"></i> 
            <span>Pedidos</span>
        </a>
    </li>
    @endsection
    @if(helper()->testRole(Auth::user()->role,'delete_orders') == true
        || helper()->testRole(Auth::user()->role,'restore_orders') == true
        || Auth::user()->roles->special == 'all')
        @include('livewire.admin.orders.confirm')
    @endif
    @include('livewire.admin.orders.sendmail')
    @include('livewire.admin.orders.massive_confirm')

    @if(session()->has('message'))
    <div class="container ">
        <div class="alert alert-{{$typealert}}">            
            <h2 >{{session('message') }}</h2>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <script>
                $('.alert').slideDown();
                setTimeout(()=>{ $('.alert').slideUp(); }, 10000);
            </script>
        </div>
    </div>
    @endif
    @if(!$orders)
        <div class="loading" id="loading"  >
          <img src="{{url('ics/loading/dualball.svg')}}" alt="" style="margin:auto" width="80">
        </div>
    @else
        <div class="filters mtop16">
            <ul class="addL">
                <li>
                    <div class="input-group div_search">
                        <span class="d-none d-sm-flex fas fa-search form-control-icon"></span>                    
                        <input type="text" id="search_data" class="form-control form-control-sm" placeholder="Buscar..." wire:model="search_data">
                        <span class="d-none d-md-flex far fa-times-circle form-control-icon2" wire:click="clearSearch"></span>
                    </div>
                </li>
            </ul>
            <ul class="add">
                <li>
                    <button class="btn btn-sm btn_sail btn_pry dropdown-toggle" id="dropdownMenuLink" onclick="showMenuExport()" aria-expanded="false" >
                        <span class="d-none d-md-inline">Exportar</span>
                        <span class="d-inline d-md-none">
                            <i class="fa-solid fa-file-export"></i>
                        </span>
                    </button>
                    <ul class="dropdown-menu" role="menu" id="dropdownMenuExport" aria-labelledby="dropdownMenuLink">                
                        <li>
                            <a href="#" class="dropdown-item" wire:click.prevent="exportPDF">
                                <i class="fa-solid fa-file-pdf"></i> PDF
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item" wire:click.prevent="exportExcel">
                                <i class="fa-solid fa-file-excel"></i> Excel
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#sendModal" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa-solid fa-envelope"></i> E-Mail
                            </a>
                        </li>
                    </ul>
                </li>

                <li>            
                    <button class="btn btn-sm btn_sail btn_pry dropdown-toggle" type="button" id="dropdownMenu2" onclick="showMenuFilters()"  aria-expanded="false" >
                        <span class="d-none d-md-inline">Filtros</span>
                        <span class="d-inline d-md-none">
                            <i class="fa-solid fa-bars-staggered"></i>
                        </span>
                    </button>            
                    <ul class="dropdown-menu right0" aria-labelledby="dropdownMenu2" id="dropdownMenuFilters">
                        <li>
                            <a href="{{ route('list_orders',['filter_type' => 1]) }}" class="dropdown-item">
                                &#x2714; Público
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('list_orders',['filter_type' => 0]) }}" class="dropdown-item">
                                &#x2716; Borrador
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('list_orders',['filter_type' => 2]) }}" class="dropdown-item">
                                <i class="fa-solid fa-trash"></i> Reciclaje
                            </a>
                        </li>
                        <li>
                            <a href=" {{ route('list_orders',['filter_type' => 3]) }}" class="dropdown-item">
                                &#x2714;&#x2716; Todos
                            </a>
                        </li>
                    </ul>            
                </li>            
            </ul>
        </div>

        <div class="div_table shadow mtop16">
    <!-- div loading -->

            <table class="table">
                <thead>
                    <tr>
                        <td>
                            {{Form::checkbox('box',true,null,['class' => 'form-check-input','id'=>'allcheckbox','onclick' => 'selectAllCheckbox()'])}}
                        </td>
                        <td width="64">
                            <a href="#" wire:click="setColAndOrder('id')">
                                ID
                            </a>
                        </td>                    
                        <td>
                            <a href="#" wire:click="setColAndOrder('order_num')">
                                Pedido
                            </a>
                        </td>
                        <td>
                            <!-- nombre de la factura y dirección, no tiene porque ser
                             el usuario iniciado-->
                            <a href="#" wire:click="setColAndOrder('selected_address')">
                                Cliente
                            </a>
                        </td>           
                        <td>
                            Entrega
                        </td>
                        <td>
                            Productos
                        </td>
                        <td>
                            Total
                        </td>
                        <td>
                            Pago
                        </td>
                        <td>
                            Estado
                        </td>
                        <td>
                            <a href="#" wire:click="setColAndOrder('created_at')">
                                Fecha
                            </a>
                        </td>
                        <td>
                            Acciones
                        </td>
                    </tr>
                </thead>
                <tbody>                
                    @if($orders->count() > 0)
                        @foreach($orders as $key=>$order)
                        <tr style="cursor:pointer" >
                            <td width="50">
                                {{Form::checkbox($order->id,"true",null,['class' => 'form-check-input','onclick' =>'selectCheckbox('.$order->id.',this)','class' => 'checkbox'])}}
                            </td>
                            <td>{{ $order->id }}</td>
                            <td>
                                {{ $order->order_num }}
                            </td>
                            <td>
                                @if($order->selected_address != 0)
                                {{ $order->get_history_address->name}} {{$order->get_history_address->lastname}}
                                @else
                                {{ $order->selected_address }}
                                @endif
                            </td>
                            <td>
                                @if($order->location)
                                {{ $order->get_location->name}}
                                @else
                                N/A
                                @endif
                            </td>
                            <td>
                                {{$order->quantity}}
                            </td>
                            <td>
                                {{ $order->total }}
                            </td>
                            <td>
                                @if($order->payment_method == 1)
                                    {{ 'Tarjeta' }}
                                @elseif($order->payment_method == 2)
                                    {{'Transferencia'}}
                                @elseif($order->payment_method == 3)
                                    {{'Paypal'}}
                                @endif
                            </td>
                            <td>
                                @if($order->order_state != 0)
                                {{ $order->get_state->name }}
                                @else
                                N/A
                                @endif
                            </td>
                            <td>
                                {{ $order->created_at }}
                            </td>
                            <td>
                                <div class="admin_items">
                                @if($filter_type != 2)
                                    <button class="btn btn-sm scat" onclick="show_items({{$key}})" title="Mostrar productos del pedido">
                                            &#11015;
                                    </button>
                                    @if(helper()->testRole(Auth::user()->role,'list_orders') == true
                                        || Auth::user()->roles->special == 'all')
                                        <button class="btn btn-sm scat" data-bs-toggle="modal" data-bs-target="#editProduct" wire:click="invoices({{$order->id}})" title="Ir a facturas">
                                            <i class="fa-solid fa-file-invoice"></i>
                                        </button>
                                    @endif
                                    @if(helper()->testRole(Auth::user()->role,'delete_orders') == true
                                        || Auth::user()->roles->special == 'all')
                                        <button class="btn btn-sm delete" title="Eliminar {{$order->order_num}}" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveOrderId({{$order->id}},'delete')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    @endif
                                @else
                                    @if(helper()->testRole(Auth::user()->role,'restore_orders') == true
                                        || Auth::user()->roles->special == 'all')
                                        <button class="btn btn-sm restore" title="Restaruar {{$order->order_num}}" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveOrderId({{$order->id}},'restore')">
                                            <i class="fa-solid fa-trash-arrow-up"></i>
                                        </button>
                                    @endif
                                @endif
                                </div>
                            </td>                        
                        </tr>
                        <tr class="order_item" id="collapse_{{$key}}" >
                        <td colspan="11" >
                            
                            {{-- obtenemos los items desde el model y los recorremos --}}
                            @php $data = $order->get_orders_items @endphp
                            @foreach($data as $d)
                            
                            <div class="row list" >
                                <div class="col-2" >                            
                                    <img class="image" src="{{ url($d->path_tag.$d->image) }}" alt="{{ $d->title }}" style="max-width:32px;max-height:70px">
                                </div>
                                <div class="col-8">
                                    <div class="row">
                                    {{$d->title}}                              
                                    </div>
                                    @if($d->combinations_text != 'null')
                                    <div class="row">
                                        @php
                                        $text = json_decode($d->combinations_text);
                                        @endphp                                    
                                        @foreach($text as $t)
                                        {{$t->name}} : {{$t->value}}
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                                <div class="col-2">
                                    <div class="row div_price">
                                        <div class="price" >
                                        x {{$d->quantity}}
                                        
                                        </div>
                                    </div>
                                    <div class="row div_price" >
                                        <div class="price" >
                                            {{floatval(number_format($d->total,2,'.',''))}}€
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </td>
                    </tr>
                        @endforeach
                    @endif
                    <tr>
                        <!--
                        <td colspan="1">
                            {{Form::checkbox('box',true,null,['class' => 'form-check-input'])}}
                        </td>
                        -->
                        @if($orders->count() == 0)
                        <td colspan="100%">
                            <p>No existen pedidos</p>
                        </td>                    
                        @else
                        <td colspan="3" style="font-size:14px">
                            <label for="status"><strong>Acciones en lote</strong></label>
                        </td>
                        <td colspan="2" style="display:inline-flex;vertical-align:middle;align-items:center">
                            <div  class="input-group">                    
                                {{ Form::select('action_selected_ids',get_actionslist($filter_type),null,['class' => 'form-select form-select-sm','style' => 'max-width:300px;margin-right:10px','onchange' => "setActionSelected(this)",'id' => 'indiv_checkbox'])}}
                            </div> 
                            
                            <div>
                                <button class="btn btn-sm btn_sail btn_pry" onclick="testAnyCheckbox()">Aplicar</button>    
                            </div>
                        </td>
                        @endif
                    </tr>
                    <tr>
                        <td colspan="6">{{$orders->links()}}</td>
                    </tr>         
                </tbody>
            </table>
        </div>
    @endif
</div>
@push('scripts')
<script>
function setList(){
    @this.selected_list = selected_list;
}
</script>
@endpush