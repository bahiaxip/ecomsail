<div>

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
</div>
