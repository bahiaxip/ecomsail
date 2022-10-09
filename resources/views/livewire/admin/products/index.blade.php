<div>
    @section('title','Productos')

    @section('path')
    &nbsp;>&nbsp;
    <li class="list_name">
        <a href="{{ route('list_products',1) }}">
            <i class="fa-solid fa-columns"></i> <span>Productos</span>
        </a>
    </li>
    @endsection
    
    @if(helper()->testRole(Auth::user()->role,'add_products') == true
                || Auth::user()->roles->special == 'all')
        @include('livewire.admin.products.create')
    @endif
    @if(helper()->testRole(Auth::user()->role,'edit_products') == true
                || Auth::user()->roles->special == 'all')
        @include('livewire.admin.products.edit')
        @include('livewire.admin.products.settings')
    @endif
    
    
    @if(helper()->testRole(Auth::user()->role,'delete_products') == true
        || helper()->testRole(Auth::user()->role,'restore_products') == true
        || Auth::user()->roles->special == 'all')

        @include('livewire.admin.products.confirm')
    @endif
    @include('livewire.admin.products.sendmail')
    @include('livewire.admin.products.massive_confirm')
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
                    <input type="text" id="searchData" class="form-control form-control-sm" placeholder="Buscar..." wire:model="search_data">
                    <span class="d-none d-md-flex far fa-times-circle form-control-icon2" wire:click="clearSearch"></span>
                </div>
            </li>
        </ul>

        <ul class="add">

            <li>
                <button class="btn btn-sm btn_primary dropdown-toggle" id="dropdownMenuLink" onclick="showMenuExport()" aria-expanded="false" >
                    <span class="d-none d-md-inline">Exportar</span>
                    <span class="d-inline d-md-none">
                        <i class="fa-solid fa-file-export"></i>
                    </span>
                </button>
                <ul id="dropdownMenuExport" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuLink">                
                    <li>
                        <a href="#" class="dropdown-item " wire:click.prevent="exportPDF">
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
                <div class="dropdown">
                    <button class="btn btn-sm btn_primary dropdown-toggle" type="button" id="dropdownMenu1" onclick="showMenuFilters()" aria-expanded="false">
                        Filtros
                    </button>            
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" id="dropdownMenuFilters">
                        <li>
                            <a href="{{ route('list_products',['filter_type' => 1]) }}" class="dropdown-item">
                                &#x2714; Públicos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('list_products',['filter_type' => 0]) }}" class="dropdown-item">
                                &#x2716; Borrador
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('list_products',['filter_type' => 2]) }}" class="dropdown-item">
                                <i class="fa-solid fa-trash"></i> Reciclaje
                            </a>
                        </li>
                        <li>
                            <a href=" {{ route('list_products',['filter_type' => 3]) }}" class="dropdown-item">
                                &#x2714;&#x2716; Todos
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @if(helper()->testRole(Auth::user()->role,'add_products') == true
                || Auth::user()->roles->special == 'all')
                <li>
                    <button class="btn btn-sm btn_primary" data-bs-toggle="modal" data-bs-target="#addProduct" wire:click="setckeditor()"><i class="fa-solid fa-plus"></i> Crear Producto</a>    
                </li>
            @endif
            
        </ul>
    </div>
    <div class="div_table shadow mtop16">
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>
                        {{Form::checkbox('box',true,null,['class' => 'form-check-input','id'=>'allcheckbox','onclick' => 'selectAllCheckbox()'])}}
                    </td>
                    <td width="40">ID</td>
                    <td width="64"></td>
                    <td>Nombre</td>
                    <td>Descripción corta</td>
                    <td>Categoría</td>
                    <td>Precio</td>
                    <td>Stock</td>
                    <td>Cod.Ref.</td>
                    <td width="140">Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $prod)
                <tr>
                    <td width="50">
                        {{Form::checkbox($prod->id,"true",null,['class' => 'form-check-input','onclick' =>'selectCheckbox('.$prod->id.',this)','class' => 'checkbox'])}}
                    </td>
                    <td>
                        <a href="#">{{ $prod->id }}</a>
                    </td>
                    <td>
                        @if($prod->image)
                        <img src="{{ url($prod->path_tag.$prod->image) }}" alt="{{ $prod->file_name }}" width="32">
                        @else
                        <img style="margin:auto" src="{{ url('images/bolsas-de-compra.png') }}" alt="{{ $prod->file_name }}" width="32">
                        @endif
                    </td>
                    <td>{{ $prod->name }}</td>
                    <td>{{ $prod->short_detail }}</td>
                    <td>{{ $prod->cat->name }}</td>
                    <td>{{ $prod->price }}</td>
                    <td>{{ $prod->stock }}</td>
                    <td>{{ $prod->code }}</td>
                    <td>
                        <div class="admin_items">
                            @if($filter_type != 2)
                                @if(helper()->testRole(Auth::user()->role,'edit_products') == true
                                    || Auth::user()->roles->special == 'all')

                                    <button class="btn btn-sm scat" data-bs-toggle="modal" data-bs-target="#settings" wire:click="edit_settings_product({{$prod->id}})">
                                        <i class="fa-solid fa-list-check"></i>
                                    </button>
                                @endif
                                
                                @if(helper()->testRole(Auth::user()->role,'edit_products') == true
                                    || Auth::user()->roles->special == 'all')
                                    <button class="btn btn-sm edit" data-bs-toggle="modal" data-bs-target="#editProduct" wire:click="edit({{$prod->id}})">
                                        <i class="fa-solid fa-edit"></i>
                                    </button>
                                @endif
                                @if(helper()->testRole(Auth::user()->role,'delete_products') == true
                                    || Auth::user()->roles->special == 'all')
                                    <button class="btn btn-sm delete" title="Eliminar producto" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveProdId({{$prod->id}},'delete')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                @endif
                            @else
                                @if(helper()->testRole(Auth::user()->role,'restore_products') == true
                                    || Auth::user()->roles->special == 'all')
                                    <button class="btn btn-sm edit" title="Restaruar producto" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveProdId({{$prod->id}},'restore')">
                                        <i class="fa-solid fa-trash-arrow-up"></i>
                                    </button>
                                    <button class="btn btn-sm delete" title="Eliminar producto @if($actionTmp=='deleteend') definitivamente @endif " data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveProdId({{$prod->id}},'deleteend')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                @endif
                            @endif

                        </div>
                    </td>
                </tr>
                @endforeach
                <tr>
                    @if($products->count() == 0)
                        
                    <td colspan="100%">
                        <p>No existen productos</p>
                    </td>
                    @else
                    
                    <td colspan="3" style="font-size:14px">
                        <label for="status"><strong>Acciones en lote</strong></label>
                    </td>
                    <td colspan="2" style="display:inline-flex;vertical-align:middle;align-items:center">
                        <div class="input-group">                    
                            {{ Form::select('action_selected_ids',get_actionslist($filter_type),0,['class' => 'form-select form-select-sm','style' => 'max-width:300px;margin-right:10px','onchange' => "setActionSelected(this)",'id' => 'indiv_checkbox'])}}
                        </div> 
                        
                        <div>
                            <button class="btn btn-sm btn_sail btn_pry" onclick="testAnyCheckbox()">Aplicar</button>    
                        </div>
                    </td>
                    @endif
                </tr>
                <tr>
                    <td colspan="6">{{ $products->links() }}</td>
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
