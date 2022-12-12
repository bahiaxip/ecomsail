<div>
	@section('title','Carousel')

	@section('path')
    &nbsp;>&nbsp;
    <li class="list_name">
        <a href="{{ route('list_carousel',['filter_type' => 1]) }}">            
            <i class="fa-solid fa-images"></i>
            <span>Carousel</span>
        </a>
    </li>
    <!-- elemento li que será rellenado al pulsar el botón subcategorías de algún 
        elemento del listado categorías -->
    <li class="sublist_name" id="sublist_name">
        
    </li>
    <!-- elemento li que será mostrado al recargar la página en una subcategoría, 
        este elemento li sustituye al anterior al recargar la página -->
    
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
    @if(helper()->testRole($role_user,'create_carousel') == true 
            || Auth::user()->roles->special == 'all')
        @include('livewire.admin.carousel.create')
    @endif
    @include('livewire.admin.carousel.edit')
    @include('livewire.admin.carousel.confirm')
    @if(!$sliders)
    <div class="loading" id="loading"  >
      <img src="{{url('ics/loading/dualball.svg')}}" alt="" style="margin:auto" width="80">
    </div>
    @else
    <div class="filters mtop16">
        <ul class="add">
            <li>            
                <button class="btn btn-sm btn_sail btn_pry dropdown-toggle" type="button" id="dropdownMenu2" onclick="showMenuFilters()"  aria-expanded="false" >
                    <span class="d-none d-md-inline">Filtros</span>
                    <span class="d-inline d-md-none">
                        <i class="fa-solid fa-bars-staggered"></i>
                    </span>
                </button>            
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" id="dropdownMenuFilters">
                    <li>
                        <a href="{{ route('list_carousel',['filter_type' => 1]) }}" class="dropdown-item">
                            &#x2714; Público
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('list_carousel',['filter_type' => 0]) }}" class="dropdown-item">
                            &#x2716; Borrador
                        </a>
                    </li>
                    <li>
                        <a href=" {{ route('list_carousel',['filter_type' => 3]) }}" class="dropdown-item">
                            &#x2714;&#x2716; Todos
                        </a>
                    </li>
                </ul>            
            </li>            
            @if(helper()->testRole($role_user,'create_carousel') == true 
            || Auth::user()->roles->special == 'all')
            <li>
                <button class="btn btn-sm btn_sail btn_pry" data-bs-toggle="modal" data-bs-target="#addSlider" >
                    <i class="fa-solid fa-plus"></i> 
                    <span class="d-none d-md-inline">Crear Slider</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
    <div class="sliders mtop16">
        @foreach($sliders as $slider)
    	<div class="row mtop16 box_slider" >
    		<div class="slider">
                <div class="mid left">
                    <div class="col_arrows">
                        @if(helper()->testRole($role_user,'edit_carousel') == true 
                            || Auth::user()->roles->special == 'all')
                        <div class="div_arrows" >
                            <div class="arrow" wire:click="set_position({{$slider->id}},'up')">
                                <a href="javascript:void(0)">
                                    <i class="fa-solid fa-arrow-up"></i>
                                </a>
                            </div>
                            <div class="arrow" wire:click="set_position({{$slider->id}},'down')">
                                <a href="javascript:void(0)">
                                    <i class="fa-solid fa-arrow-down"></i>
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="div_image" >
                    @if($slider->image)                
                        <img  src="{{url($slider->path_tag.$slider->image)}}" alt="" class="image">
                    @endif
                    </div>
                    <div class="actions_hidden">
                        @if(helper()->testRole($role_user,'edit_carousel') == true 
                            || Auth::user()->roles->special == 'all')
                        <div class="mtop16">
                            <button class="btn btn-sm btn_sry"  data-bs-toggle="modal" data-bs-target="#editSlider" wire:click="edit({{$slider->id}})">
                                <span class="title_hidden">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    
                                </span>
                                <span class="title">
                                    &nbsp;
                                    Editar
                                </span>
                                
                                
                            </button>
                        </div>
                        @endif
                        @if(helper()->testRole($role_user,'delete_carousel') == true 
                            || Auth::user()->roles->special == 'all')
                        <div class="mtop16">
                            <button class="btn btn-sm btn_red" style="display:flex;margin:auto" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveSliderId({{$slider->id}})">
                                <span class="title_hidden">
                                    <i class="fa-solid fa-trash"></i>
                                       
                                </span>
                                <span class="title">
                                    &nbsp;
                                    Eliminar    
                                </span>
                                
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="mid right">
                    <div class="body" >
                        <div class="main_title mtop16">
                            <label for="" >Título</label>
                            <h2>{{$slider->title}}</h2>    
                        </div>
                        <div class="second_title mtop16">
                            <label for="" >Subtítulo</label>
                            <p>{{$slider->text}}</p>
                        </div>
                        
                    </div>
                    <div class="actions" >
                        @if(helper()->testRole($role_user,'edit_carousel') == true 
                            || Auth::user()->roles->special == 'all')
                        <div class="mtop16">
                            <button class="btn btn-sm btn_sry"  data-bs-toggle="modal" data-bs-target="#editSlider" wire:click="edit({{$slider->id}})">
                                Editar
                            </button>
                        </div>
                        @endif
                        @if(helper()->testRole($role_user,'delete_carousel') == true 
                            || Auth::user()->roles->special == 'all')
                        <div class="mtop16">
                            <button class="btn btn-sm btn_red" style="display:flex;margin:auto" data-bs-toggle="modal" data-bs-target="#confirmDel" wire:click="saveSliderId({{$slider->id}})">
                                Eliminar
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
    			
    		</div>
    	</div>
        @endforeach
    </div>
    @endif
</div>