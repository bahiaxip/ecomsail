<div>
    
    {{-- Stop trying to control. --}}




    <!--<li>
        <a href="#">
            <i class="fa-solid fa-box"></i> Categorías
        </a>
    </li>
    -->    

    
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
            <a href="{{ url('/admin/category') }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i> Agregar Categoría</a>    
        </li>
        
    </ul>
    <div class="div_table shadow mtop16">
        <table class="table">
            <thead>
                <tr>
                    <td width="64"></td>                
                    <td>Nombre</td>
                    <td>Slug</td>           
                    <td>Descripción</td>
                    <td width="140">Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                <tr>
                    <td><img src="{{ url('storage/'.$cat->image) }}" alt="{{ $cat->file_name }}" width="32"></td>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->slug }}</td>
                    <td>{{ $cat->description }}</td>
                    <td>
                        <div class="admin_items">
                            <a href="{{ url('admin/category/'.$cat->id.'/edit') }}" title="Editar">
                                <i class="fa-solid fa-edit"></i>
                            </a>
                            <a href="#">
                                <i class="fa-solid fa-edit"></i>
                            </a>
                            <a href="{{ url('admin/category/'.$cat->id.'/delete') }}">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach         
            </tbody>
        </table>
    </div>
    
</div>
