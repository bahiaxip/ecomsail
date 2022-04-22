<div>
    <div class="add">
    <a href="{{ url('/admin/product') }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i> Agregar Producto</a>  
</div>
<div class="div_table shadow mtop16">
    <table class="table">
        <thead>
            <tr>                
                <td></td>
                <td>Nombre</td>
                <td>Detalle</td>
                <td>Categoría</td>
                <td width="140">Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $prod)
            <tr>                
                <td>
                    <img src="{{  asset('storage/'.$prod->thumb) }}" alt="" width="32">
                </td>
                <td>{{$prod->name}}</td>
                <td>{{$prod->detail}}</td>
                <td>{{ $prod->cat->name }}</td>
                <td>
                    <div class="admin_items">
                        <a href="{{ url('admin/product/'.$prod->id.'/edit') }}" title="Editar">
                            <i class="fa-solid fa-edit"></i>
                        </a>
                        <a href="#">
                            <i class="fa-solid fa-edit"></i>
                        </a>
                        <a href="{{ url('admin/product/'.$prod->id.'/delete') }}">
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
