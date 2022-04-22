<div>
    
    {{-- Stop trying to control. --}}




    <!--<li>
        <a href="#">
            <i class="fa-solid fa-box"></i> Categorías
        </a>
    </li>
    -->    

    @include('livewire.admin.products.create')
    @include('livewire.admin.products.edit')
    @include('livewire.admin.products.confirm')
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
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct"><i class="fa-solid fa-plus"></i> Crear Producto</a>    
        </li>
        
    </ul>
    <div class="div_table shadow mtop16">
        <table class="table">
            <thead>
                <tr>
                    <!--<td width="64"></td>-->
                    <td>Nombre</td>
                    <td>Detalle</td>           
                    <td>Categoría</td>
                    <td width="140">Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $prod)
                <tr>
                    <!--<td><img src="{{ url('storage/'.$prod->image) }}" alt="{{ $prod->file_name }}" width="32"></td>-->
                    <td>{{ $prod->name }}</td>
                    <td>{{ $prod->detail }}</td>
                    <td>{{ $prod->id }}</td>
                    <td>
                        <div class="admin_items">
                            <a href="#" title="Editar">
                                <i class="fa-solid fa-edit"></i>
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
            </tbody>
        </table>
    </div>
    
</div>
