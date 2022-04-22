<div>
    
    {{-- Stop trying to control. --}}




    <!--<li>
        <a href="#">
            <i class="fa-solid fa-box"></i> Categorías
        </a>
    </li>
    -->    

    @include('livewire.admin.categories.create')
    @include('livewire.admin.categories.edit')
    @include('livewire.admin.categories.confirm')
    <ul class="add">
        <li>
            <a href="#" class="btn btn-sm btn-primary" class="filter"><i class="fa-solid fa-plus"></i> Filtros</a>  
            <ul >
                <li><a href="#"><i class="fa-solid fa-globe-americas"></i> Públicos</a></li>
                <li><a href="#"><i class="fa-solid fa-globe-americas"></i> Borrador</a></li>
                <li><a href="#"><i class="fa-solid fa-globe-americas"></i> Reciclaje</a></li>
                <li><a href="#"><i class="fa-solid fa-globe-americas"></i> Todos</a></li>
            </ul>
        </li>
        <li>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory"><i class="fa-solid fa-plus"></i> Agregar Categoría</a>    
        </li>
        
    </ul>
    <div class="div_table shadow mtop16">
        <table class="table">
            <thead>
                <tr>
                    <!--<td width="64"></td>-->
                    <td>Nombre</td>
                    <td>Slug</td>           
                    <td>Descripción</td>
                    <td width="140">Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                <tr>
                    <!--<td><img src="{{ url('storage/'.$cat->image) }}" alt="{{ $cat->file_name }}" width="32"></td>-->
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->slug }}</td>
                    <td>{{ $cat->description }}</td>
                    <td>
                        <div class="admin_items">
                            <a href="{{ url('admin/category/'.$cat->id.'/edit') }}" title="Editar">
                                <i class="fa-solid fa-edit"></i>
                            </a>
                            <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#editCategory" wire:click="edit({{$cat->id}})">
                                <i class="fa-solid fa-edit"></i>
                            </button>
                            <button class="btn btn-sm back_livewire2" title="Eliminar usuario" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveCatId({{$cat->id}})">
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
