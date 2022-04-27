<div>
    
    @section('title','Categorías')

    @section('path')
    &nbsp;>&nbsp;
    <li>
        <a href="{{ url('admin/categories/1') }}">
            <i class="fa-solid fa-columns"></i> Categorías
        </a>
    </li>    
    <li class="subcat">
        <a href="{{ url('admin/categories/1/') }}" id="subcat">
            <i class="fa-solid fa-columns"></i> Subcategorías
        </a>
    </li>
    @endsection

    @include('livewire.admin.categories.create')
    @include('livewire.admin.categories.edit')
    @include('livewire.admin.categories.confirm')

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
    
    <ul class="add">
        <li>            
            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                Filtros
            </button>            
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <li>
                    <a href="{{ route('categories',['filter_type' => 1]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Público</a>
                </li>
                <li>
                    <a href="{{ route('categories',['filter_type' => 0]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Borrador</a>
                </li>
                <li>
                    <a href="{{ route('categories',['filter_type' => 2]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Reciclaje</a>
                </li>
                <li>
                    <a href=" {{ route('categories',['filter_type' => 3]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Todos</a>
                </li>
            </ul>            
        </li>
        <li>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory" wire:click="setckeditor()"><i class="fa-solid fa-plus"></i> Agregar Categoría</a>    
        </li>
        
    </ul>

    <div class="div_table shadow mtop16">
        <table class="table">
            <thead>
                <tr>
                    <td width="64"></td>                    
                    <td>Nombre</td>           
                    <td>Descripción</td>
                    <td width="140">Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                <tr>

                    <td>
                        @if($cat->image)
                        <img src="{{ url('/storage/'.$cat->image) }}" alt="{{ $cat->file_name }}" width="32">
                        @else
                        <img src="{{ url('/images/bolsas-de-compra.png') }}" alt="{{ $cat->file_name }}" width="32">
                        @endif
                    </td>                    
                    <td>{{ $cat->name }}</td>
                    <!--
                    usamos la sintaxis laravel con !! para limpiar los 
                    tags añadidos del textarea en lugar de doble corchete
                    -->
                    <td>{!! $cat->description !!}</td>
                    <td>
                        <div class="admin_items">
                            @if(!$subcat)
                            <button class="btn btn-sm"  title="Subcategorías" wire:click="renderSubCat({{ $cat->id }},'{{trim($cat->name)}}')">
                                <i class="fa-solid fa-edit"></i>
                            </button>
                            @endif
                            <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#editCategory" wire:click="edit({{$cat->id}})">
                                <i class="fa-solid fa-edit"></i>
                            </button>
                            @if($filter_type!=2)
                            <button class="btn btn-sm back_livewire2" title="Eliminar usuario" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveCatId({{$cat->id}})">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="6">{{ $categories->links() }}</td>
                </tr>         
            </tbody>
        </table>
    </div>
    
</div>
