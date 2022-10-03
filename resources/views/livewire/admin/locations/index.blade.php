<div>
    {{-- establecemos title si subcatlist['name'] contiene valor --}}
    @section('title', 'Ubicaciones')
    @section('path')
    &nbsp;>&nbsp;
    <li class="list_name">
        <a href="{{ route('list_locations',['filter_type' => 1]) }}">
            <i class="fa-solid fa-columns"></i> <span>Ubicaciones</span>
        </a>
    </li>
    @endsection
    
    
    @if(helper()->testPermission(Auth::user()->permissions,'edit_locations')== true)
        @include('livewire.admin.locations.edit')
    @endif
    {{--
    
    
    @if(helper()->testPermission(Auth::user()->permissions,'delete_categories')== true)
        @include('livewire.admin.locations.confirm')
    @endif
    @include('livewire.admin.locations.sendmail')
    @include('livewire.admin.locations.massive_confirm')

    {{Form::hidden('hidden',null,['wire:model' => 'selected_list','id' => 'hidden_list'])}}
    --}}
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
                <button class="btn btn-sm btn_sail btn_pry dropdown-toggle" type="button" id="dropdownMenu2" onclick="showMenuFilters()"  aria-expanded="false" >
                    <span class="d-none d-md-inline">Filtros</span>
                    <span class="d-inline d-md-none">
                        <i class="fa-solid fa-bars-staggered"></i>
                    </span>
                </button>            
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" id="dropdownMenuFilters">
                    <li>
                        <a 
                        {{--@if(!$subcat)--}}
                        href="{{ route('list_locations',['filter_type' => 1]) }}" 
                        
                        {{--@else
                        href="{{ route('list_locations',['filter_type' => 1,'subcat' => $subcat]) }}" 
                        @endif --}}
                        class="dropdown-item">
                            &#x2714; Público
                        </a>
                    </li>
                    <li>
                        <a 
                        {{--@if(!$subcat)--}}
                        href="{{ route('list_locations',['filter_type' => 0]) }}" 
                        {{--@else
                        href="{{ route('list_categories',['filter_type' => 0,'subcat' => $subcat]) }}" 
                        @endif
                        --}}
                        class="dropdown-item">
                            &#x2716; Borrador
                        </a>
                    </li>                    
                    <li>
                        <a 
                        {{--@if(!$subcat)--}}
                        href=" {{ route('list_locations',['filter_type' => 3]) }}" 
                        {{--@else
                        href=" {{ route('list_categories',['filter_type' => 3,'subcat' => $subcat]) }}" 
                        @endif--}}
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
                    <td width="64">Bandera</td>                    
                    <td>
                        <a href="#" wire:click="setColAndOrder('name')">
                            Nombre    
                        </a>
                    </td>
                    <td>
                        <a href="#" wire:click="setColAndOrder('zone')">
                            Zona
                        </a>
                    </td>
                    <td>
                        Ciudades/Distritos
                    </td>
                    <td>
                        Moneda
                    </td>
                    <td>
                        IVA
                    </td>
                    <td class="max d-none d-md-table-cell">
                        ISO
                    </td>
                    <td width="140">Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach($locations as $l)
                <tr>
                    <td width="50">
                        {{Form::checkbox($l->id,"true",null,['class' => 'form-check-input','onclick' =>'selectCheckbox('.$l->id.',this)','class' => 'checkbox'])}}
                    </td>
                    <td>
                        {{$l->id}}
                    </td>
                    <td>
                        <img src="{{url($l->path_tag.$l->icon)}}" alt="" width="24">
                    </td>
                    <td>
                        {{$l->name}}
                    </td>
                    <td>                        
                        {{$l->namezone->name}}
                    </td>
                    <td>
                        {{$l->countCities()}}
                    </td>
                    <td>
                        {{$l->coin}}
                    </td>
                    <td>
                        {{$l->vat}}
                    </td>
                    <td>
                        {{$l->isocode_alfa2}}
                    </td>
                    <td>
                        <div class="admin_items">
                            @if($filter_type != 2)
                                @if(helper()->testPermission(Auth::user()->permissions,'list_locations')== true)
                                    <button class="btn btn-sm delete" wire:click="renderCities({{$l->id}})" title="Ciudades de {{$l->name}}">
                                        <i class="fa-solid fa-city"></i>
                                    </button>
                                @endif
                                @if(helper()->testPermission(Auth::user()->permissions,'edit_locations')== true)
                                    <button class="btn btn-sm edit" data-bs-toggle="modal" data-bs-target="#editLocation"  wire:click="edit({{$l->id}})" title="Editar {{$l->name}}">
                                        <i class="fa-solid fa-edit"></i>
                                    </button>
                                @endif
                                                               
                            @else
                                @if(helper()->testPermission(Auth::user()->permissions,'restore_locations')== true)
                                    <button class="btn btn-sm " title="Restaruar ubicación" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveLocId({{$cat->id}},'restore')">
                                        <i class="fa-solid fa-trash-arrow-up"></i>
                                    </button>
                                @endif
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="6">{{ $locations->links() }}</td>
                </tr>
                {{--
                @foreach($categories as $cat)
                <tr>
                    <td width="50">
                        {{Form::checkbox($cat->id,"true",null,['class' => 'form-check-input','onclick' =>'selectCheckbox('.$cat->id.',this)','class' => 'checkbox'])}}
                    </td>
                    <td>{{ $cat->id }}</td>
                    <td>
                        @if($cat->image)
                        <img src="{{ url('/storage/'.$cat->image) }}" alt="{{ $cat->file_name }}" width="32">
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
                                @if(helper()->testPermission(Auth::user()->permissions,'edit_categories')== true)
                                <button class="btn btn-sm edit" data-bs-toggle="modal" data-bs-target="#editCategory" wire:click="edit({{$cat->id}})" title="Editar {{$cat->name}}">
                                    <i class="fa-solid fa-edit"></i>
                                </button>
                                @endif
                                @if(helper()->testPermission(Auth::user()->permissions,'delete_categories')== true)
                                    @if($filter_type!=2)
                                        <button class="btn btn-sm delete" title="Eliminar {{$cat->name}}" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveCatId({{$cat->id}},'delete')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    @endif
                                @endif
                            @else
                                @if(helper()->testPermission(Auth::user()->permissions,'restore_categories')== true)
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
                    @if($btn_back)
                        
                    <td colspan="100%">
                        <p>No existen Subcategorías</p>
                    </td>
                    @else
                    <td colspan="3" style="font-size:14px">
                        <label for="status"><strong>Acciones en lote</strong></label>
                    </td>
                    <td colspan="2" style="display:inline-flex;vertical-align:middle;align-items:center">
                        <div class="input-group">                    
                            {{ Form::select('action_selected_ids',get_actionslist($filter_type),null,['class' => 'form-select', 'wire:model' => 'action_selected_ids','style' => 'max-width:300px;margin-right:10px','onchange' => "setActionSelected(this)",'id' => 'indiv_checkbox'])}}
                        </div> 
                        
                        <div>
                            <button class="btn btn-sm btn_primary" onclick="testAnyCheckbox()">Aplicar</button>    
                        </div>
                    </td>
                    @endif
                </tr>
                <tr>
                    <td colspan="6">{{ $categories->links() }}</td>
                </tr>
                --}}         
            </tbody>
        </table>
    </div>
    
</div>
@push('scripts')
<script>
/*
function setList(){
    @this.selected_list = selected_list;
}
function getColor(data){
    @this.color = data;
}
*/
</script>
@endpush