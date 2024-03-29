<div>
    {{-- establecemos title si subcatlist['name'] contiene valor --}}
    @section('title',$subcatlist['name'] ?? 'Categorías')
    
    
    @section('path')
    &nbsp;>&nbsp;
    <li class="list_name">
        <a href="{{ url('admin/categories/1') }}">
            <div class="icon icon_cat"></div>
            <!--<i class="fa-solid fa-columns"></i>--> 
            <span>Categorías</span>
        </a>
    </li>
    <!-- elemento li que será rellenado al pulsar el botón subcategorías de algún 
        elemento del listado categorías -->
    <li class="sublist_name" id="sublist_name">
        
    </li>
    <!-- elemento li que será mostrado al recargar la página en una subcategoría, 
        este elemento li sustituye al anterior al recargar la página -->
    @if($subcatlist['name'])
    &nbsp;>&nbsp;
    <li class="sublist_name">
        <a href="{{ url('admin/categories/'.$filter_type.'/'.$subcatlist['id']) }}" id="subcat">
            <div class="icon icon_subcat"></div>
            <span>{{$subcatlist['name']}}</span>
        </a>
    </li>
    @endif
    @endsection

    @if(helper()->testRole(Auth::user()->role,'create_categories') == true
            || Auth::user()->roles->special == 'all')
        @include('livewire.admin.categories.create')
    @endif
    @if(helper()->testRole(Auth::user()->role,'edit_categories') == true
            || Auth::user()->roles->special == 'all')
    @include('livewire.admin.categories.edit')
    @endif
    @if(helper()->testRole(Auth::user()->role,'delete_categories') == true
            || Auth::user()->roles->special == 'all')
        @include('livewire.admin.categories.confirm')
    @endif
    @include('livewire.admin.categories.sendmail')
    @include('livewire.admin.categories.massive_confirm')
    {{Form::hidden('hidden',null,['wire:model' => 'selected_list','id' => 'hidden_list'])}}
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
    <!--
    <ul class="add">
        <li>            
            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                Filtros
            </button>            
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <li>
                    <a href="{{ route('list_categories',['filter_type' => 1]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Público</a>
                </li>
                <li>
                    <a href="{{ route('list_categories',['filter_type' => 0]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Borrador</a>
                </li>
                <li>
                    <a href="{{ route('list_categories',['filter_type' => 2]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Reciclaje</a>
                </li>
                <li>
                    <a href=" {{ route('list_categories',['filter_type' => 3]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Todos</a>
                </li>
            </ul>            
        </li>
        <li>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory" wire:click="setckeditor()"><i class="fa-solid fa-plus"></i> Agregar Categoría</a>    
        </li>
        
    </ul>
-->
    @if(!$categories)
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
            @if($subcatlist['name'] || $btn_back)
            <li>
                <a href="{{route('list_categories',['filter_type'=>$filter_type])}}" class="btn btn-sm btn_primary">
                    <i class="fa-solid fa-left-long"></i> Atrás
                </a>
            </li>
            @endif
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
                        <a 
                        @if(!$subcat)
                        href="{{ route('list_categories',['filter_type' => 1]) }}" 
                        @else
                        href="{{ route('list_categories',['filter_type' => 1,'subcat' => $subcat]) }}" 
                        @endif
                        class="dropdown-item">
                            &#x2714; Público
                        </a>
                    </li>
                    <li>
                        <a 
                        @if(!$subcat)
                        href="{{ route('list_categories',['filter_type' => 0]) }}" 
                        @else
                        href="{{ route('list_categories',['filter_type' => 0,'subcat' => $subcat]) }}" 
                        @endif
                        class="dropdown-item">
                            &#x2716; Borrador
                        </a>
                    </li>
                    <li>
                        <a 
                        @if(!$subcat)
                        href="{{ route('list_categories',['filter_type' => 2]) }}" 
                        @else
                        href="{{ route('list_categories',['filter_type' => 2,'subcat' => $subcat]) }}" 
                        @endif
                        class="dropdown-item">
                            <i class="fa-solid fa-trash"></i> Reciclaje
                        </a>
                    </li>
                    <li>
                        <a 
                        @if(!$subcat)
                        href=" {{ route('list_categories',['filter_type' => 3]) }}" 
                        @else
                        href=" {{ route('list_categories',['filter_type' => 3,'subcat' => $subcat]) }}" 
                        @endif
                        class="dropdown-item">
                            &#x2714;&#x2716; Todos
                        </a>
                    </li>
                </ul>            
            </li>
            @if(helper()->testRole(Auth::user()->role,'create_categories') == true
                    || Auth::user()->roles->special == 'all')
                <li>
                    <button class="btn btn-sm btn_sail btn_pry" data-bs-toggle="modal" data-bs-target="#addCategory" wire:click="setckeditor()">
                        <i class="fa-solid fa-plus"></i> 
                        <span class="d-none d-md-inline">Crear Categoría</span>
                    </a>
                </li>
            @endif
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
                    <td width="64"></td>                    
                    <td>
                        <a href="#" wire:click="setColAndOrder('name')">
                            Nombre    
                        </a>
                    </td>
                    <td>
                        @if(!$subcat)
                        Cantidad
                        @endif
                    </td>
                    <td>
                        Productos asoc.
                    </td>
                    <td class="max d-none d-md-table-cell">
                        <a href="#" wire:click="setColAndOrder('description')">
                            Descripción
                        </a>
                    </td>
                    <td width="140">Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                <tr>
                    <td width="50">
                        {{Form::checkbox($cat->id,"true",null,['class' => 'form-check-input','onclick' =>'selectCheckbox('.$cat->id.',this)','class' => 'checkbox'])}}
                    </td>
                    <td>{{ $cat->id }}</td>
                    <td>
                        @if($cat->image)
                        <img src="{{ url($cat->path_tag.$cat->image) }}" alt="{{ $cat->file_name }}" width="32">
                        @else
                        <img src="{{ url('/ics/grid_cat.svg') }}" alt="{{ $cat->file_name }}" width="32">
                        @endif
                    </td>
                    <td>{{$cat->name}}</td>
                    <td>
                        @if(!$subcat)
                        <span>{{$cat->subcatlength()}}</span>
                        @endif
                    </td>
                    <td>
                        @if(!$subcat)
                        {{$cat->prod->count()}}
                        @else
                        {{$cat->prod_from_subcat->count()}}
                        @endif
                    </td>
                    <!--
                    usamos la sintaxis laravel con !! para limpiar los 
                    tags añadidos del textarea en lugar de doble corchete
                    -->
                    <td class="max d-none d-md-table-cell">{!! $cat->description !!}</td>
                    <td>
                        <div class="admin_items">
                            @if($filter_type != 2)
                                @if(!$subcat)
                                <button class="btn btn-sm scat" title="Subcategorías" wire:click="renderSubCat({{ $cat->id }},'{{trim($cat->name)}}')">
                                    <!--<img src="{{url('ics/grid_subcat.svg')}}" alt="" width="16">-->
                                    <div class="icon icon_subcat"></div>
                                </button>
                                @endif
                                @if(helper()->testRole(Auth::user()->role,'edit_categories') == true
                                    || Auth::user()->roles->special == 'all')
                                <button class="btn btn-sm edit" data-bs-toggle="modal" data-bs-target="#editCategory" wire:click="edit({{$cat->id}})" title="Editar {{$cat->name}}">
                                    <i class="fa-solid fa-edit"></i>
                                </button>
                                @endif
                                @if(helper()->testRole(Auth::user()->role,'delete_categories') == true
                                    || Auth::user()->roles->special == 'all')
                                    @if($filter_type!=2)
                                        <button class="btn btn-sm delete" title="Eliminar {{$cat->name}}" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveCatId({{$cat->id}},'delete')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    @endif
                                @endif
                            @else
                                @if(helper()->testRole(Auth::user()->role,'restore_categories') == true
                                    || Auth::user()->roles->special == 'all')
                                    <button class="btn btn-sm back_livewire2" title="Restaruar categoría" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveCatId({{$cat->id}},'restore')">
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
                    @if($categories->count() == 0 && !$btn_back)
                    <td colspan="100%">
                        <p>No existen categorías</p>
                    </td>
                    @elseif($btn_back)
                        
                    <td colspan="100%">
                        <p>No existen subcategorías</p>
                    </td>
                    @else
                    <td colspan="3" style="font-size:14px">
                        <label for="status"><strong>Acciones en lote</strong></label>
                    </td>
                    <td colspan="2" style="display:inline-flex;vertical-align:middle;align-items:center">
                        <div class="input-group">                    
                            {{ Form::select('action_selected_ids',get_actionslist($filter_type),null,['class' => 'form-select form-select-sm','style' => 'max-width:300px;margin-right:10px','onchange' => "setActionSelected(this)",'id' => 'indiv_checkbox'])}}
                        </div> 
                        
                        <div>
                            <button class="btn btn-sm btn_sail btn_pry" onclick="testAnyCheckbox()">Aplicar</button>    
                        </div>
                    </td>
                    @endif
                </tr>
                <tr>
                    <td colspan="6">{{ $categories->links() }}</td>
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
function getColor(data){
    @this.color = data;
}
</script>
@endpush