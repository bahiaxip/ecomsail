<div>

    @section('title','Usuarios')

    @section('path')
    &nbsp;>&nbsp;
    <li>
        <a href="{{ route('users') }}">
            <i class="fa-solid fa-columns"></i> Usuarios
        </a>
    </li>
    @endsection
    <!-- modals -->
    @include('livewire.admin.users.create')
    @include('livewire.admin.users.edit')
    @include('livewire.admin.users.confirm')
    @include('livewire.admin.users.edit_permissions')

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
                <div class="input-group">
                    
                    <input type="text" id="searchData" class="form-control form-control-sm">
                    
                </div>
            </li>
        </ul>
        <ul class="add">
           
            <li>
                <button class="btn btn-sm btn-primary">Exportar</button>
            </li>

            <li>            
                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                    Filtros
                </button>            
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">                
                    <li>
                        <a href="{{ route('users',['filter_type' => 1]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Público</a>
                    </li>
                    <li>
                        <a href="{{ route('users',['filter_type' => 0]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Borrador</a>
                    </li>
                    <li>
                        <a href="{{ route('users',['filter_type' => 2]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Reciclaje</a>
                    </li>
                    <li>
                        <a href=" {{ route('users',['filter_type' => 3]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Todos</a>
                    </li>
                </ul>            
            </li>
        </ul>
    </div>

    <div class="div_table shadow mtop16">
        <table class="table table-hover">
            <thead>
                <th width="64"></th>
                <th>Nick</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>E-Mail</th>                            
                <th width="140"></th>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>
                        @if($user->image)
                        <img src="{{ url('/storage/'.$user->image) }}" alt="" width="32">
                        @else
                        <img src="{{ url('/images/bolsas-de-compra.png') }}" alt="" width="32">
                        @endif
                    </td>
                    <td>{{$user->nick}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->lastname}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <div class="admin_items">
                            <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#editUser" wire:click="edit({{$user->id}})">
                                <i class="fa-solid fa-pencil-alt"></i>
                            </button>
                            <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#editUser" wire:click="edit({{$user->id}})">
                                <i class="fa-solid fa-edit"></i>
                            </button>
                            <button class="btn btn-sm" title="Editar permisos de usuario" data-bs-toggle="modal" data-bs-target="#editPermissions" wire:click.prevent = 'edit_permissions({{$user->id}})'>
                                <i class="fa-solid fa-list-check"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!--
    <div class="container">
        <div class="row">
            <div class="col">
                
                <div class="container">
                    @if(session()->has('message'))
                    <div class="alert alert-success ">{{session('message')}}</div>
                @endif

                <div>
                    <div class="row">
                        <div class="col-3 col-sm-4">
                            <div class="form-group">
                                <span class="d-none d-sm-flex"></span>
                                <input type="text" id="searchData">
                                <span class="d-none d-md-flex"></span>
                            </div>                            
                        </div>
                        <div class="col-6 col-sm-4">
                            <button class="btn btn-sm">Exportar</button>
                            <button type="button" class="btn btn-sm c_grad_green mx-1" data-bs-toggle="modal" data-bs-target="#addUser">
                                        Crear
                                    </button>
                        </div>
                        <div class="col-3 col-sm-4">
                            
                        </div>
                    </div>
                </div>
                <div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th>Nick</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>E-Mail</th>                            
                            <th width="140"></th>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->nick}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->lastname}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <div class="admin_items">
                                        <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#editUser" wire:click="edit({{$user->id}})">
                                            <i class="fa-solid fa-pencil-alt"></i>
                                        </button>
                                        <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#editUser" wire:click="edit({{$user->id}})">
                                            <i class="fa-solid fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm back_livewire2" title="Eliminar usuario" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveUserId({{$user->id}})">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{--{{$users->Links()}}--}}
                </div>
                </div>
            </div>
        </div>
    </div>
    -->
</div>
