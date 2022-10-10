@section('sidebar')
<div class="sidebar" style="position:relative">
	<!--
	<div id="menu_sidebar" class="arrow" style="width:100%;display:flex;justify-content:end">
		<span class="active"  style="display: none;color:white;margin-right:3px;padding:10px;cursor:pointer;" >
			<i class="fa-solid fa-angles-left"></i>
		</span>
		<span class=""  style="display: none;color:white;margin:auto;padding:10px;cursor:pointer;" >
			<i class="fa-solid fa-angles-right"></i>
		</span>
	</div>
	-->
	
	<div class="logo">
		{{--<img src="{{ asset('images/favicon_ecomsail.svg') }}" alt="" style="padding:5px">--}}
		<img src="{{ asset('images/logo/favicon_ecomsail.svg') }}" alt="" style="padding:5px">
	</div>
	
	<div class="options mtop16">
		<ul>
			{{-- anterior método de permisos sustituido por nuevo--}}
			{{--
			@if(helper()->testPermission(Auth::user()->permissions,'list_home')== true)--}}
			@if(helper()->testRole(Auth::user()->role,'show_analysis') == true
				|| Auth::user()->roles->special == 'all')
			<li>
				<a href="{{ route('show_analysis') }}">
					<i class="fa-solid fa-chart-line"></i> 
					<span class="d-none d-lg-inline-flex">
						Análisis
					</span>
				</a>
			</li>
			@endif
			@if(helper()->testRole(Auth::user()->role,'list_products') == true
				|| Auth::user()->roles->special == 'all')
			<li>
				<a href="{{ route('list_products',['filter_type' => 1]) }}">
					<i class="fa-solid fa-box"></i> <span class="d-none d-lg-inline-flex">Productos</span>
				</a>
			</li>
			@endif
			@if(helper()->testRole(Auth::user()->role,'list_orders') == true
				|| Auth::user()->roles->special == 'all')
			<li>
				<a href="{{ route('list_orders',['filter_type' => 1]) }}">
					<i class="fa-solid fa-bag-shopping"></i> 
					<span class="d-none d-lg-inline-flex">
						Pedidos
					</span>
				</a>
			</li>
			@endif
			@if(helper()->testRole(Auth::user()->role,'list_invoices') == true
				|| Auth::user()->roles->special == 'all')
			<li>
				<a href="{{ route('list_invoices',['filter_type' => 1]) }}">
					<i class="fa-solid fa-file-invoice"></i> 
					<span class="d-none d-lg-inline-flex">
						Facturas
					</span>
				</a>
			</li>
			@endif
			@if(helper()->testRole(Auth::user()->role,'list_categories') == true
				|| Auth::user()->roles->special == 'all')
			<li style="position:relative;right:1px">
				<a href="{{ route('list_categories',['filter_type' => 1]) }}" style="display:inline-flex;justify-content:start;">
					<!--<i class="fa-solid fa-tags"></i> Categorías-->
					<div class="icon icon_cat"></div>
					<!--<img src="{{url('ics/grid_cat_D3D3D3.svg')}}" alt="" width="16" height="20" style="margin-right:2px;box-sizing:border-box"> -->
					<span style="width:100%" class="d-none d-lg-inline-flex">Categorías</span>
				</a>
			</li>
			@endif
			@if(helper()->testRole(Auth::user()->role,'list_attributes') == true
				|| Auth::user()->roles->special == 'all')
			<li>
				<a href="{{ route('list_attributes',['filter_type' => 1]) }}" style="display:inline-flex;justify-content:start;">
					<div class="icon icon_value"></div> <span class="d-none d-lg-inline-flex">
						Atributos
					</span>
				</a>
			</li>
			@endif
			@if(helper()->testRole(Auth::user()->role,'list_users') == true
				|| Auth::user()->roles->special == 'all')
			<li>
				<a href="{{ route('list_users',['filter_type' => 1]) }}">
					<i class="fa-solid fa-users"></i> 
					<span class="d-none d-lg-inline-flex">
						Usuarios
					</span>
				</a>
			</li>
			@endif
			@if(helper()->testRole(Auth::user()->role,'list_locations') == true
				|| Auth::user()->roles->special == 'all')
			<li>
				<a href="{{ route('list_locations',['filter_type' => 1]) }}">
					<i class="fa-solid fa-location-dot"></i> 
					<span class="d-none d-lg-inline-flex">
						Ubicaciones
					</span>
				</a>
			</li>
			@endif
			@if(helper()->testRole(Auth::user()->role,'list_carousel') == true
				|| Auth::user()->roles->special == 'all')
			<li>
				<a href="{{route('list_carousel',['filter_type' => 1])}}">
					<i class="fa-solid fa-images"></i> 
					<span class="d-none d-lg-inline-flex">
						Carousel
					</span>
				</a>
			</li>
			@endif
			@if(helper()->testRole(Auth::user()->role,'list_permissions') == true
				|| Auth::user()->roles->special == 'all')
			<li>
				<a href="{{route('list_permissions',['filter_type' => 1])}}">
					<i class="fa-solid fa-shield"></i>
					<span class="d-none d-lg-inline-flex">
						Permisos
					</span>
				</a>
			</li>
			@endif
			@if(helper()->testRole(Auth::user()->role,'list_roles') == true
				|| Auth::user()->roles->special == 'all')
			<li>
				<a href="{{route('list_roles',['filter_type' => 1])}}">
					<i class="fa-solid fa-shield-halved"></i>
					<span class="d-none d-lg-inline-flex">
						Roles
					</span>
				</a>
			</li>
			@endif

			<li>
				<a href="{{route('list_notifications',['filter_type' => 1])}}">
					<i class="fa-solid fa-shield-halved"></i>
					<span class="d-none d-lg-inline-flex">
						Notificaciones
					</span>
				</a>
			</li>

			@if(helper()->testRole(Auth::user()->role,'list_settings') == true
				|| Auth::user()->roles->special == 'all')
			<li>
				<a href="{{route('list_settings')}}">
					<i class="fa-solid fa-gear"></i> 
					<span class="d-none d-lg-inline-flex">
						Ajustes
					</span>
				</a>
			</li>
			@endif
		</ul>
	</div>
</div>
@endsection
@push('scripts')
<script>
	/*
	let menuL = document.querySelector('#menu_sidebar');
	let sectionL = document.querySelector('.sectionL');
	if(menuL){
		//if(sectionL)
		menuL.addEventListener('click',()=>{
			console.log(sectionL.style.width);
			if(sectionL){
				if(sectionL.style.width =='12%'){
					menuL.firstElementChild.classList.remove('active');
					menuL.lastElementChild.classList.add('active');
					sectionL.style.width='5%';
				}else{
					console.log('no tiene 12$')
					menuL.lastElementChild.classList.remove('active');
					menuL.firstElementChild.classList.add('active');
					sectionL.style.width='12%';
				}
			}
		})
	}
	*/
</script>
@endpush