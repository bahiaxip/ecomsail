<div>
    @section('title','Notificaciones')

    @section('path')
    &nbsp;>&nbsp;
    <li class="list_name">
        <a href="{{ url('admin/notifications/1') }}">
            <div class="icon icon_attr"></div>
            <!--<i class="fa-solid fa-columns"></i>--> 
             <span>Notificaciones</span>
        </a>
    </li>    
    @endsection

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
    @include('livewire.admin.notifications.confirm')
    @if(!$notifications)
    <div class="loading" id="loading"  >
      <img src="{{url('ics/loading/dualball.svg')}}" alt="" style="margin:auto" width="80">
    </div>
    @else
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
                <button class="btn btn-sm btn_sail btn_pry dropdown-toggle" type="button" id="dropdownMenu2" onclick="showMenuFilters()" aria-expanded="false">
                    <span class="d-none d-md-inline">Filtros</span>
                    <span class="d-inline d-md-none">
                        <i class="fa-solid fa-bars-staggered"></i>
                    </span>
                </button>            
                <ul class="dropdown-menu" id="dropdownMenuFilters" aria-labelledby="dropdownMenu2">                
                    <li>
                        <a href="{{ route('list_notifications',['filter_type' => 1]) }}" class="dropdown-item">
                            &#x2714; Público
                        </a>
                    </li>
                    <li>
                        <a  href="{{ route('list_notifications',['filter_type' => 0]) }}" class="dropdown-item">
                                &#x2716; Borrador
                            </a>
                    </li>
                    <li>
                        <a href="{{ route('list_notifications',['filter_type' => 2]) }}" class="dropdown-item">
                            <i class="fa-solid fa-trash"></i> Reciclaje
                        </a>
                    </li>
                    <li>
                        <a href=" {{ route('list_notifications',['filter_type' => 3]) }}" class="dropdown-item">
                            &#x2714;&#x2716; Todos
                        </a>
                    </li>
                </ul>            
            </li>
        </ul>
    </div>

    <div class="div_table shadow mtop16">
<!-- div loading -->

        <table class="table table-hover">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Título</td>
                    <td>Descripción</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach($notifications as $not)
                <tr>
                    <td>{{$not->id}}</td>
                    <td>{{$not->title}}</td>
                    <td>{{$not->description}}</td>
                    <td>
                        <div class="admin_items">
                            @if($filter_type != 2)
                                <button class="btn btn-sm delete" title="Eliminar {{$not->title}}" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveNotId({{$not->id}},'delete')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            @else
                                <button class="btn btn-sm back_livewire2" title="Restaruar {{$not->title}}" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveNotId({{$not->id}},'restore')">
                                    <i class="fa-solid fa-trash-arrow-up"></i>
                                </button>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach

                @if($notifications && $notifications->count() > 0 )
                <tr>
                    <td colspan="6">{{ $notifications->links() }}</td>
                </tr>
                @endif
            </tbody>
            
        </table>
    </div>
    @endif
</div>
