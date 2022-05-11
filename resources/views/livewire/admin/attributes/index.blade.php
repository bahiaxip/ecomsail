<div>
    @section('title','Atributos')

    @section('path')
    &nbsp;>&nbsp;
    <li class="list_name">
        <a href="{{ url('admin/attributes/1') }}">
            <div class="icon icon_attr"></div>
            <!--<i class="fa-solid fa-columns"></i>--> 
             <span>Atributos</span>
        </a>
    </li>
    <!-- elemento li que será rellenado al pulsar el botón subcategorías de algún 
        elemento del listado categorías -->
    <li class="sublist_name" id="sublist_name">
        
    </li>
    <!-- elemento li que será mostrado al recargar la página en una subcategoría, 
        este elemento se sustituye por el anterior al recargar la página -->
    
    @endsection

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

    @include('livewire.admin.attributes.create')
    @include('livewire.admin.attributes.edit')
    @if($attributes->total() > 0)
    @include('livewire.admin.attributes.create_value')
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
            @if($attrlist['name'] || $btn_back)
    <!-- revisar si exsite page=? para no volver al principio -->
            <li>
                <a href="{{route('list_attributes',['filter_type'=>$filter_type])}}" class="btn btn-sm btn_primary">
                    <i class="fa-solid fa-left-long"></i> Atrás
                </a>
            </li>
            @endif
            <li>
                <button class="btn btn-sm btn_primary dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" >
                    <span class="d-none d-md-inline">Exportar</span>
                    <span class="d-inline d-md-none">
                        <i class="fa-solid fa-file-export"></i>
                    </span>

                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuLink">                
                    <li>
                        <a href="#" class="dropdown-item" wire:click="exportPDF">
                            <i class="fa-solid fa-file-pdf"></i> PDF
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item" wire:click="exportExcel">
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
                <button class="btn btn-sm btn_primary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="d-none d-md-inline">Filtros</span>
                    <span class="d-inline d-md-none">
                        <i class="fa-solid fa-bars-staggered"></i>
                    </span>
                </button>            
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">                
                    <li>
                        <a href="{{ route('list_attributes',['filter_type' => 1]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Público</a>
                    </li>
                    <li>
                        <a href="{{ route('list_attributes',['filter_type' => 0]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Borrador</a>
                    </li>
                    <li>
                        <a href="{{ route('list_attributes',['filter_type' => 2]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Reciclaje</a>
                    </li>
                    <li>
                        <a href=" {{ route('list_attributes',['filter_type' => 3]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Todos</a>
                    </li>
                </ul>            
            </li>
            @if(helper()->testPermission(Auth::user()->permissions,'add_categories')== true)
                <li>
                    <button class="btn btn-sm btn_primary" data-bs-toggle="modal" data-bs-target="#addAttribute" wire:click.prevent="setckeditor"><i class="fa-solid fa-plus"></i> 
                        <span class="d-none d-md-inline">Agregar Atributo</span>
                    </a>
                </li>
                @if($attributes->total() > 0)
                <li>
                    <button class="btn btn-sm btn_primary" data-bs-toggle="modal" data-bs-target="#addValue" wire:click.prevent="setckeditor"><i class="fa-solid fa-plus"></i> 
                        <span class="d-none d-md-inline">Agregar Valor</span>
                    </a>
                </li>
                @endif
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
                    <td>
                        <a href="#" wire:click="setColAndOrder('name')">
                            Nombre    
                        </a>
                    </td>
                    <td>
                        <a href="#" wire:click="setColAndOrder('name')">
                            Cantidad    
                        </a>
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
                @foreach($attributes as $attr)
                <tr>
                    <td width="50">
                        {{Form::checkbox($attr->id,"true",null,['class' => 'form-check-input','onclick' =>'selectCheckbox('.$attr->id.',this)','class' => 'checkbox'])}}
                    </td>
                    <td>{{ $attr->id }}</td>
                    <td>{{$attr->name}}</td>
                    <td>0</td>
                    
                    <!--
                    usamos la sintaxis laravel con !! para limpiar los 
                    tags añadidos del textarea en lugar de doble corchete
                    -->
                    <td class="max d-none d-md-table-cell">{!! $attr->description !!}</td>
                    <td>
                        <div class="admin_items">
                            @if($filter_type != 2)
                                @if(!$value)
                                <button class="btn btn-sm scat" title="Valores" wire:click="renderValues({{ $attr->id }},'{{trim($attr->name)}}')">
                                    <!--<img src="{{url('icons/attribute_white.svg')}}" alt="" width="16">-->
                                    <div class="icon icon_value "></div>
                                </button>
                                @endif
                                @if(helper()->testPermission(Auth::user()->permissions,'edit_categories')== true)
                                <button class="btn btn-sm edit" data-bs-toggle="modal" data-bs-target="#editAttribute" wire:click="edit({{$attr->id}})" title="Editar {{$attr->name}}">
                                    <i class="fa-solid fa-edit"></i>
                                </button>
                                @endif
                                @if(helper()->testPermission(Auth::user()->permissions,'delete_categories')== true)
                                    @if($filter_type!=2)
                                        <button class="btn btn-sm delete" title="Eliminar {{$attr->name}}" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveCatId({{$attr->id}})">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    @endif
                                @endif
                            @else
                                @if(helper()->testPermission(Auth::user()->permissions,'restore_categories')== true)
                                    <button class="btn btn-sm back_livewire2" title="Restaruar categoría" wire:click="restore({{$cat->id}})">
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
                    @if($attributes->count() == 0)
                        
                    <td colspan="100%">
                        <p>No existen Atributos</p>
                    </td>
                    @else
                    <td colspan="3" style="font-size:14px">
                        <label for="status"><strong>Acciones en lote</strong></label>
                    </td>
                    <td colspan="1" style="display:inline-flex;vertical-align:middle;align-items:center">
                        <div class="input-group">                    
                            {{ Form::select('action_selected_ids',[0 => 'Seleccione...',1 => 'Eliminar'],null,['class' => 'form-select', 'wire:model' => 'action_selected_ids','style' => 'max-width:300px;margin-right:10px'])}}
                        </div>
                        <div>
                            <button class="btn btn-sm btn_primary" wire:click="deleteids">Aplicar</button>    
                        </div>
                    </td>
                    @endif
                </tr>
                <tr>
                    <td colspan="6">{{ $attributes->links() }}</td>
                </tr>         
            </tbody>
        </table>
    </div>

</div>
