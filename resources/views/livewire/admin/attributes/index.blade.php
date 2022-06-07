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
    <!-- elemento li que será mostrado al recargar la página en valores("subatributos"), 
        este elemento li sustituye al anterior al recargar la página -->
    @if($attrlist['name'])
    &nbsp;>&nbsp;
    <li class="sublist_name">
        <a href="{{ url('admin/attributes/'.$filter_type.'/'.$attrlist['id']) }}">
            <div class="icon icon_value"></div>
            <span>{{$attrlist['name']}}</span>
        </a>
    </li>
    @endif
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
    @if(helper()->testPermission(Auth::user()->permissions,'add_attributes')== true)
        @include('livewire.admin.attributes.create')
        @if($attr)
            @include('livewire.admin.attributes.create_value')
        @endif
    @endif
    @if(helper()->testPermission(Auth::user()->permissions,'edit_attributes')== true)
        @include('livewire.admin.attributes.edit')
    @endif
    @if(helper()->testPermission(Auth::user()->permissions,'delete_attributes')== true)
        @include('livewire.admin.attributes.confirm')
    @endif
    
    @include('livewire.admin.attributes.sendmail')
    
    @if(helper()->testPermission(Auth::user()->permissions,'delete_attributes') == true ||
    helper()->testPermission(Auth::user()->permissions,'restore_attributes') == true)
        @include('livewire.admin.attributes.massive_confirm')
    @endif
    {{Form::hidden('hidden',null,['wire:model' => 'selected_list','id' => 'hidden_list'])}}
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
            <!-- Filtros -->
            <li>            
                <button class="btn btn-sm btn_sail btn_pry dropdown-toggle" type="button" id="dropdownMenu2" onclick="showMenuFilters()" aria-expanded="false">
                    <span class="d-none d-md-inline">Filtros</span>
                    <span class="d-inline d-md-none">
                        <i class="fa-solid fa-bars-staggered"></i>
                    </span>
                </button>            
                <ul class="dropdown-menu" id="dropdownMenuFilters" aria-labelledby="dropdownMenu2">                
                    <li>
                        <a @if(!$attr)
                        href="{{ route('list_attributes',['filter_type' => 1]) }}"
                        @else
                        href="{{ route('list_attributes',['filter_type' => 1,'attr' => $attr]) }}"
                        @endif 
                        class="dropdown-item">
                            &#x2714; Público
                        </a>
                    </li>
                    <li>
                        <a  @if(!$attr)href="{{ route('list_attributes',['filter_type' => 0]) }}"@else href="{{ route('list_attributes',['filter_type' => 0,'attr' => $attr]) }}"@endif class="dropdown-item">
                                &#x2716; Borrador
                            </a>
                    </li>
                    <li>
                        <a 
                        @if(!$attr)
                        href="{{ route('list_attributes',['filter_type' => 2]) }}"
                        @else
                        href="{{ route('list_attributes',['filter_type' => 2,'attr' => $attr]) }}"
                        @endif
                        class="dropdown-item">
                            <i class="fa-solid fa-trash"></i> Reciclaje
                        </a>
                    </li>
                    <li>
                        <a 
                        @if(!$attr)
                        href=" {{ route('list_attributes',['filter_type' => 3]) }}"
                        @else
                        href=" {{ route('list_attributes',['filter_type' => 3,'attr' => $attr]) }}"
                        @endif
                        class="dropdown-item">
                            &#x2714;&#x2716; Todos
                        </a>
                    </li>
                </ul>            
            </li>
            @if(helper()->testPermission(Auth::user()->permissions,'add_categories')== true)
                <li>
                    <button class="btn btn-sm btn_sail btn_pry" data-bs-toggle="modal" data-bs-target="#addAttribute" wire:click.prevent="setckeditor"><i class="fa-solid fa-plus"></i> 
                        <span class="d-none d-md-inline">Agregar Atributo</span>
                    </a>
                </li>
                <!-- si no existe ningún atributo padre todavía ocultamos el botón Crear Valor-->
                @if($attr)
                <li>
                    <button class="btn btn-sm btn_sail btn_pry" data-bs-toggle="modal" data-bs-target="#addValue" wire:click.prevent="setckeditor"><i class="fa-solid fa-plus"></i> 
                        <span class="d-none d-md-inline">Agregar Valor</span>
                    </a>
                </li>
                @endif
            @endif
        </ul>
    </div>

    <div class="div_table shadow mtop16">
<!-- div loading -->

        <table class="table table-hover">
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
                    @if($attr)
                    <td>
                        <a href="#" wire:click="setColAndOrder('name')">
                            Imagen
                        </a>
                    </td>
                    @endif
                    <td>
                        <a href="#" wire:click="setColAndOrder('name')">
                            Nombre    
                        </a>
                    </td>
                    @if($attr)
                    <td>
                        <a href="#" wire:click="setColAndOrder('name')">
                            Color
                        </a>
                    </td>
                    @endif
                    @if(!$attr)
                    <td>
                        <a href="#" wire:click="setColAndOrder('name')">
                            Cantidad    
                        </a>
                    </td>
                    @endif
                    <td class="max d-none d-md-table-cell">
                        <a href="#" wire:click="setColAndOrder('description')">
                            Descripción
                        </a>
                    </td>
                    <td width="140">Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach($attributes as $at)
                <tr>
                    <td width="50">
                        {{Form::checkbox($at->id,"true",null,['class' => 'form-check-input','onclick' =>'selectCheckbox('.$at->id.',this)','class' => 'checkbox'])}}
                    </td>
                    <td>{{ $at->id }}</td>                    
                    @if($attr)
                    <td>
                        @if($at->image)
                        <img src="{{ url('/storage/'.$at->image) }}" alt="{{ $at->file_name }}" width="32">
                        @else
                        <img src="{{ url('/icons/values.svg') }}" alt="{{ $at->file_name }}" width="32">
                        @endif
                    </td>
                    @endif
                    <td>{{$at->name}}</td>
                    @if($attr)
                    <td>
                        @if($at->color)
                        <div style="background-color:{{$at->color}};width:20px;height:20px;margin:auto" title="{{$at->color}}"></div>                        
                        @endif
                    </td>
                    @endif
                    @if(!$attr)
                    <td>{{$at->valueslength()}}</td>
                    @endif

                    
                    <!--
                    usamos la sintaxis laravel con !! para limpiar los 
                    tags añadidos del textarea en lugar de doble corchete
                    -->
                    <td class="max d-none d-md-table-cell">{!! $at->description !!}</td>
                    <td>
                        <div class="admin_items">
                            @if($filter_type != 2)
                                @if(!$attr)
                                    @if(helper()->testPermission(Auth::user()->permissions,'list_attributes')== true)
                                    <button class="btn btn-sm scat" title="Valores" wire:click="renderValues({{ $at->id }},'{{trim($at->name)}}')">
                                        <!--<img src="{{url('icons/attribute_white.svg')}}" alt="" width="16">-->
                                        <div class="icon icon_value "></div>
                                    </button>
                                    @endif
                                @endif
                                @if(helper()->testPermission(Auth::user()->permissions,'edit_attributes')== true)
                                <button class="btn btn-sm edit" data-bs-toggle="modal" data-bs-target="#editAttribute" wire:click="edit({{$at->id}})" title="Editar {{$at->name}}">
                                    <i class="fa-solid fa-edit"></i>
                                </button>
                                @endif
                                @if(helper()->testPermission(Auth::user()->permissions,'delete_attributes')== true)
                                    @if($filter_type!=2)
                                        <button class="btn btn-sm delete" title="Eliminar {{$at->name}}" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveAttrId({{$at->id}},'delete')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    @endif
                                @endif
                            @else
                                @if(helper()->testPermission(Auth::user()->permissions,'restore_attributes')== true)
                                    <button class="btn btn-sm back_livewire2" title="Restaruar categoría" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveAttrId({{$at->id}},'restore')">
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
  <!-- falta hacer un else if como en categories y subcategories -->      
                    <td colspan="100%">
                        <p>No existen Atributos</p>
                    </td>
                    @else
                    <td colspan="3" style="font-size:14px">
                        <label for="status"><strong>Acciones en lote</strong></label>
                    </td>
                    <td colspan="1" style="display:inline-flex;vertical-align:middle;align-items:center">

                        <div class="input-group">
                            {{ Form::select('action_selected_ids',get_actionslist($filter_type),null,['class' => 'form-select form-select-sm', 'wire:model' => 'action_selected_ids','style' => 'max-width:300px;margin-right:10px','onchange' => "setActionSelected(this)",'id' => 'indiv_checkbox'])}}
                        </div>
                        <div>
                            <button class="btn btn-sm btn_sail btn_pry" onclick="testAnyCheckbox()" >Aplicar</button>
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
@push('scripts')
<script>
function setList(){
    @this.selected_list = selected_list;
}
function getColor(data){
    @this.color = data;
}

console.log("llega a colorpicker")
</script>
@endpush
