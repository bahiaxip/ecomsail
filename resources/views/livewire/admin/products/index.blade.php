<div>
    @section('title','Productos')

    @section('path')
    &nbsp;>&nbsp;
    <li>
        <a href="{{ route('list_products',1) }}">
            <i class="fa-solid fa-columns"></i> Productos
        </a>
    </li>
    @endsection
    @if(helper()->testPermission(Auth::user()->permissions,'add_products')== true)
        @include('livewire.admin.products.create')
    @endif
    @if(helper()->testPermission(Auth::user()->permissions,'edit_products')== true)
        @include('livewire.admin.products.edit')
    @endif
    @if(helper()->testPermission(Auth::user()->permissions,'delete_products')== true)
        @include('livewire.admin.products.confirm')
    @endif

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
                <button class="btn btn-sm btn-primary">Exportar</button>
            </li>

            <li>
                <div class="dropdown">
                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-bs-toggle="dropdown" aria-expanded="false">
                        Filtros
                    </button>            
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="{{ route('list_products',['filter_type' => 1]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Públicos</a></li>
                        <li><a href="{{ route('list_products',['filter_type' => 0]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Borrador</a></li>
                        <li><a href="{{ route('list_products',['filter_type' => 2]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Reciclaje</a></li>
                        <li><a href=" {{ route('list_products',['filter_type' => 3]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Todos</a></li>
                    </ul>
                </div>
            </li>
            @if(helper()->testPermission(Auth::user()->permissions,'add_products')== true)
                <li>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct" wire:click="setckeditor()"><i class="fa-solid fa-plus"></i> Crear Producto</a>    
                </li>
            @endif
            
        </ul>
    </div>
    <div class="div_table shadow mtop16">
        <table class="table table-hover">
            <thead>
                <tr>
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
                    <td><a href="#">{{ $prod->id }}</a></td>
                    <td>
                        @if($prod->image)
                        <img src="{{ url('/storage/'.$prod->image) }}" alt="{{ $prod->file_name }}" width="32">
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
                                <a href="#" title="Inventario">
                                    <i class="fa-solid fa-list-check"></i>
                                </a>
                                @if(helper()->testPermission(Auth::user()->permissions,'edit_products')== true)
                                    <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#editProduct" wire:click="edit({{$prod->id}})">
                                        <i class="fa-solid fa-edit"></i>
                                    </button>
                                @endif
                                @if(helper()->testPermission(Auth::user()->permissions,'delete_products')== true)
                                    <button class="btn btn-sm back_livewire2" title="Eliminar producto" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveProdId({{$prod->id}})">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                @endif
                            @else
                                @if(helper()->testPermission(Auth::user()->permissions,'restore_products')== true)
                                    <button class="btn btn-sm back_livewire2" title="Restaruar producto" wire:click="restore({{$prod->id}})">
                                        <i class="fa-solid fa-trash-arrow-up"></i>
                                    </button>
                                @endif
                            @endif

                        </div>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="6">{{ $products->links() }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
</div>
