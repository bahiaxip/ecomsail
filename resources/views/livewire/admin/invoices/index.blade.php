<div>
	@section('title', 'Facturas')

	@section('path')
    &nbsp;>&nbsp;
    <li class="list_name">
        <a href="{{ route('list_invoices',['filter_type' => 1]) }}">
            <i class="fa-solid fa-file-invoice"></i> 
            <span>Facturas</span>
        </a>
    </li>
    @if($order_id)
    &nbsp;>&nbsp;
    <li class="sublist_name">
        <a href="{{ route('list_invoices',['filter_type'=> 1,'order_id' => $order_id]) }}">
            <i class="fa-solid fa-file-invoice"></i> 
            <span>{{$order_id}}</span>
        </a>
    </li>
    @endif
    @endsection
    @if(helper()->testPermission(Auth::user()->permissions,'delete_invoices')== true || helper()->testPermission(Auth::user()->permissions,'restore_invoices')== true )
        @include('livewire.admin.invoices.confirm')
    @endif

    @include('livewire.admin.invoices.massive_confirm')
    @include('livewire.admin.invoices.sendmail')
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
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" id="dropdownMenuFilters">
                    <li>
                        <a @if(!$order_id)
                            href="{{ route('list_invoices',['filter_type' => 1]) }}"
                            @else
                            href="{{ route('list_invoices',['filter_type' => 1,'order_id' => $order_id]) }}"
                            @endif
                            class="dropdown-item">
                            &#x2714; Público
                        </a>
                    </li>
                    <li>
                        <a 
                            @if(!$order_id)
                            href="{{ route('list_invoices',['filter_type' => 0]) }}" 
                            @else
                            href="{{ route('list_invoices',['filter_type' => 0,'order_id' => $order_id]) }}" 
                            @endif
                            class="dropdown-item">
                            &#x2716; Borrador
                        </a>
                    </li>
                    <li>
                        <a @if(!$order_id)
                            href="{{ route('list_invoices',['filter_type' => 2]) }}" 
                            @else
                            href="{{ route('list_invoices',['filter_type' => 2,'order_id' => $order_id]) }}" 
                            @endif
                             class="dropdown-item">
                            <i class="fa-solid fa-trash"></i> Reciclaje
                        </a>
                    </li>
                    <li>
                        <a @if(!$order_id)
                            href="{{ route('list_invoices',['filter_type' => 3]) }}" 
                            @else
                            href="{{ route('list_invoices',['filter_type' => 3,'order_id' => $order_id]) }}" 
                            @endif
                        class="dropdown-item">
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
                        Nombre
                    </td>
                    <td>                        
                        Neto                        
                    </td>
                    <td>                        
                        IVA
                    </td>           
                    <td>
                        Total
                    </td>
                    <td>
                        Productos
                    </td>
                    <td>
                        Fecha
                    </td>
                    <td>
                    	
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach($invoices as $invoice)
                <tr>
                    <td width="50">
                        {{Form::checkbox($invoice->id,"true",null,['class' => 'form-check-input','onclick' =>'selectCheckbox('.$invoice->id.',this)','class' => 'checkbox'])}}
                    </td>
                    <td>                        
                        {{ $invoice->id }}</td>                        
                    <td>
                        @if($invoice->get_order)                        
                        {{ $invoice->get_order->get_address->name}} {{ $invoice->get_order->get_address->lastname}}
                        @endif
                    </td>
                    <td>
                        {{ $invoice->net }}
                    </td>
                    <td>
                        {{ $invoice->vat }}
                    </td>
                    <td>
                        {{ $invoice->total }}
                    </td>
                    <td>
                        @if($invoice->get_order)
                        {{$invoice->get_order->quantity}}
                        @endif
                    </td>

                    <td>
                        {{ $invoice->created_at }}
                    </td>
                    <td>
                        <div class="admin_items">
                            @if($filter_type != 2)
                                @if(helper()->testPermission(Auth::user()->permissions,'delete_invoices')== true)
                                    <button class="btn btn-sm delete" title="Eliminar {{$invoice->id}}" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveInvoiceId({{$invoice->id}},'delete')">
                                            <i class="fa-solid fa-trash"></i>
                                    </button>
                                @endif
                            @else
                                @if(helper()->testPermission(Auth::user()->permissions,'restore_invoices')== true)
                                    <button class="btn btn-sm edit" title="Restaruar {{$invoice->id}}" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveInvoiceId({{$invoice->id}},'restore')">
                                        <i class="fa-solid fa-trash-arrow-up"></i>
                                    </button>
                                @endif
                            @endif

                        </div>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <!--
                    <td colspan="1">
                        {{Form::checkbox('box',true,null,['class' => 'form-check-input'])}}
                    </td>
                    -->
                    @if($invoices->count() == 0)
                    <td colspan="100%">
                        <p>No existen facturas</p>
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
                    <td colspan="6">{{$invoices->links()}}</td>
                </tr>         
            </tbody>
        </table>
    </div>
</div>
@push('scripts')
<script>
function setList(){
    @this.selected_list = selected_list;
}
</script>
@endpush