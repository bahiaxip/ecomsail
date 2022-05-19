<div>

    @section('title','Usuarios')

    @section('path')
    &nbsp;>&nbsp;
    <li>
        <a href="{{ route('list_users',['filter_type' => 1]) }}">
            <i class="fa-solid fa-columns"></i> Usuarios
        </a>
    </li>
    @endsection
    <!-- modals -->

    <!-- los usuario se creand en register -->
    {{--@include('livewire.admin.users.create')--}}
    @if(helper()->testPermission(Auth::user()->permissions,'edit_users')== true)
        @include('livewire.admin.users.edit')
    @endif
    <!-- los usuarios no se pueden eliminar -->
    {{--@include('livewire.admin.users.confirm')--}}
    @if(helper()->testPermission(Auth::user()->permissions,'admin_permissions')== true)
        @include('livewire.admin.users.edit_permissions')
    @endif
    @include('livewire.admin.users.sendmail')

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
                <button class="btn btn-sm btn_primary dropdown-toggle" id="dropdownMenuUsers" data-bs-toggle="dropdown" aria-expanded="false" >
                    <span class="d-none d-md-inline">Exportar</span>
                    <span class="d-inline d-md-none">
                        <i class="fa-solid fa-file-export"></i>
                    </span>

                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuUsers">                
                    <li>
                        <a href="#" class="dropdown-item" wire:click="exportPDF">
                            <i class="fa-solid fa-file-pdf"></i> PDF
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item" wire:click="exportExcel">
                            <i class="fa-solid fa-file-excel"></i> Excel
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#sendModal2" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa-solid fa-envelope"></i> E-Mail
                        </a>
                    </li>
                </ul>
            </li>

            <li>            
                <button class="btn btn-sm btn_primary dropdown-toggle" type="button" id="dropdownMenuFilterUsers" data-bs-toggle="dropdown" aria-expanded="false">
                    Filtros
                </button>            
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuFilterUsers">                
                    <li>
                        <a href="{{ route('list_users',['filter_type' => 1]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Público</a>
                    </li>
                    <li>
                        <a href="{{ route('list_users',['filter_type' => 0]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Borrador</a>
                    </li>
                    <!-- //no mostramos ya que puede haber ususarios eliminados -->
                    <!--
                    <li>
                        <a href="{{ route('list_users',['filter_type' => 2]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Reciclaje</a>
                    </li>
                    -->
                    <li>
                        <a href=" {{ route('list_users',['filter_type' => 3]) }}" class="dropdown-item"><i class="fa-solid fa-globe-americas"></i> Todos</a>
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
                            <button class="btn btn-sm " data-bs-toggle="modal" data-bs-target="#editUser" wire:click="edit({{$user->id}})">
                                <i class="fa-solid fa-pencil-alt"></i>
                            </button>
                            @if(helper()->testPermission(Auth::user()->permissions,'edit_users')== true)
                            <button class="btn btn-sm edit" @if(!$user_id) data-bs-toggle="modal" data-bs-target="#editUser"  wire:click="edit({{$user->id}})"@else wire:click="edit(0)" @endif>
                                <i class="fa-solid fa-edit"></i>
                            </button>
                            @endif
                            @if(helper()->testPermission(Auth::user()->permissions,'admin_permissions')== true)
                            <button class="btn btn-sm scat" title="Editar permisos de usuario" data-bs-toggle="modal" data-bs-target="#editPermissions" wire:click.prevent = 'edit_permissions({{$user->id}})'>
                                <i class="fa-solid fa-list-check"></i>
                            </button>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="6">{{ $users->links() }}</td>
                </tr>
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
