<div>
    {{-- establecemos title si subcatlist['name'] contiene valor --}}
    @section('title', 'Inicio')

    @section('path')
    {{--
    &nbsp;>&nbsp;
    <li class="list_name">
        <a href="{{ url('admin/categories/1') }}">
            <div class="icon icon_cat"></div>
            <!--<i class="fa-solid fa-columns"></i>--> 
            <span>Categorías</span>
        </a>
    </li>
    <!-- elemento li que será rellenado al pulsar el botón subcategorías de algún 
        elemento del listado categorías -->
    <li class="sublist_name" id="sublist_name">
        
    </li>
    <!-- elemento li que será mostrado al recargar la página en una subcategoría, 
        este elemento li sustituye al anterior al recargar la página -->
    @if($subcatlist['name'])
    &nbsp;>&nbsp;
    <li class="sublist_name">
        <a href="{{ url('admin/categories/'.$filter_type.'/'.$subcatlist['id']) }}" id="subcat">
            <div class="icon icon_subcat"></div>
            <span>{{$subcatlist['name']}}</span>
        </a>
    </li>
    @endif
    --}}
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

    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
                <div class="card">
                    <div class="card-header">
                        Pedidos hoy
                    </div>
                    <div class="card-body">
                        {{$count_orderstoday}}
                    </div>
                </div>
                
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Visitas hoy
                    </div>
                    <div class="card-body">
                        {{$visitors_today}}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Valor medio del carrito
                    </div>
                    <div class="card-body">
                        10
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Pedidos hoy
                    </div>
                    <div class="card-body">
                        10
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
