<div>
    @section('title','Productos')

    @section('path')
    &nbsp;>&nbsp;
    <li>
        <a href="{{ route('products',1) }}">
            <i class="fa-solid fa-columns"></i> Productos
        </a>
    </li>
    @endsection
    @include('livewire.admin.products.create')
    @include('livewire.admin.products.edit')
    @include('livewire.admin.products.confirm')

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
            <div class="dropdown">
            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-bs-toggle="dropdown" aria-expanded="false">
                Filtros
            </button>            
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="{{ route('products',['filter_type' => 1]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Públicos</a></li>
                <li><a href="{{ route('products',['filter_type' => 0]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Borrador</a></li>
                <li><a href="{{ route('products',['filter_type' => 2]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Reciclaje</a></li>
                <li><a href=" {{ route('products',['filter_type' => 3]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Todos</a></li>
            </ul>
            </div>
        </li>
        <li>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct" wire:click="setckeditor()"><i class="fa-solid fa-plus"></i> Crear Producto</a>    
        </li>
        
    </ul>
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
                            <a href="#" title="Inventario">
                                <i class="fa-solid fa-list-check"></i>
                            </a>
                            <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#editProduct" wire:click="edit({{$prod->id}})">
                                <i class="fa-solid fa-edit"></i>
                            </button>
                            <button class="btn btn-sm back_livewire2" title="Eliminar producto" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveProdId({{$prod->id}})">
                                <i class="fa-solid fa-trash"></i>
                            </button>
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
