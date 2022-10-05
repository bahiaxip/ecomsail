<div>
	@section('title', 'Roles')

	@section('path')
	&nbsp;>&nbsp;
    <li class="list_name">
        <a href="{{ url('admin/roles') }}">
            <div class="icon icon_cat"></div>
            <!--<i class="fa-solid fa-columns"></i>--> 
            <span>Roles</span>
        </a>
    </li>
	@endsection

	@include('livewire.admin.roles.create')

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
        		<button class="btn btn-sm btn_sail btn_pry" data-bs-toggle="modal" data-bs-target="#addRol" >
                    <i class="fa-solid fa-plus"></i> 
                    <span class="d-none d-md-inline">Crear Rol</span>
                </a>
            </li>
        </ul>
    </div>
	<div class="div_table shadow mtop16">
		<table class="table">
            <thead>
                <tr>
                    {{--
                    <td>
                        {{Form::checkbox('box',true,null,['class' => 'form-check-input','id'=>'allcheckbox','onclick' => 'selectAllCheckbox()'])}}
                    </td>
                    --}}
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
                            Slug    
                        </a>
                    </td>
                    
                    <td class="max d-none d-md-table-cell">
                        {{--
                        <a href="#" wire:click="setColAndOrder('description')">
                            Descripción
                        </a>
                        --}}
                        Descripción
                    </td>
                    <td width="140">Acciones</td>
                </tr>
            </thead>
            <tbody>
            	@if($roles->count() == 0)
            	<tr class="empty" style="text-align:center;height:50px">
	                
	                <td colspan="4" rowspan="4" style="margin:15px 0px">Aun no existen roles</td>
	                
                </tr>

                @else

                @foreach($roles as $role)
                <tr>
                    {{--
                    <td width="50">
                        {{Form::checkbox($cat->id,"true",null,['class' => 'form-check-input','onclick' =>'selectCheckbox('.$cat->id.',this)','class' => 'checkbox'])}}
                    </td>
                    --}}
                    <td>{{ $role->id }}</td>
                    
                    <td>{{$role->name}}</td>
                    <td>{{$role->slug}}</td>
                    
                    <!--
                    usamos la sintaxis laravel con !! para limpiar los 
                    tags añadidos del textarea en lugar de doble corchete
                    -->
                    <td class="max d-none d-md-table-cell">{!! $role->description !!}</td>
                    <td>
                        <div class="admin_items">
                        {{--
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
                        --}}
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
                {{--
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
                --}}
                @if($roles->count() > 0)
                <tr>
                    <td colspan="6">{{ $roles->links() }}</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>