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
		<img src="{{ asset('images/bolsa.png') }}" alt="">
	</div>
	
	<div class="options mtop16">
		<ul>
			<li>
				<a href="{{ url('/admin') }}">
					<i class="fa-solid fa-chart-line"></i> 
					<span class="d-none d-lg-inline-flex">
						Inicio
					</span>
				</a>
			</li>
			@if(helper()->testPermission(Auth::user()->permissions,'list_products')== true)
			<li>
				<a href="{{ route('list_products',['filter_type' => 1]) }}">
					<i class="fa-solid fa-box"></i> <span class="d-none d-lg-inline-flex">Productos</span>
				</a>
			</li>
			@endif
			@if(helper()->testPermission(Auth::user()->permissions,'list_categories') == true)
			<li style="position:relative;right:1px">
				<a href="{{ route('list_categories',['filter_type' => 1]) }}" style="display:inline-flex;justify-content:start;">
					<!--<i class="fa-solid fa-tags"></i> Categorías-->
					<div class="icon icon_cat"></div>
					<!--<img src="{{url('icons/grid_cat_D3D3D3.svg')}}" alt="" width="16" height="20" style="margin-right:2px;box-sizing:border-box"> -->
					<span style="width:100%" class="d-none d-lg-inline-flex">Categorías</span>
				</a>
			</li>
			@endif
			@if(helper()->testPermission(Auth::user()->permissions,'list_attributes') == true)
			<li>
				<a href="{{ route('list_attributes',['filter_type' => 1]) }}" style="display:inline-flex;justify-content:start;">
					<div class="icon icon_value"></div> <span class="d-none d-lg-inline-flex">
						Atributos
					</span>
				</a>
			</li>
			@endif
			@if(helper()->testPermission(Auth::user()->permissions,'list_users')== true)
			<li>
				<a href="{{ route('list_users',['filter_type' => 1]) }}">
					<i class="fa-solid fa-users"></i> 
					<span class="d-none d-lg-inline-flex">
						Usuarios
					</span>
				</a>
			</li>
			@endif
			@if(helper()->testPermission(Auth::user()->permissions,'list_locations')== true)
			<li>
				<a href="{{ route('list_locations',['filter_type' => 1]) }}">
					<i class="fa-solid fa-location-dot"></i> 
					<span class="d-none d-lg-inline-flex">
						Ubicaciones
					</span>
				</a>
			</li>
			@endif
			<li>
				<a href="#">
					<i class="fa-solid fa-gears"></i> 
					<span class="d-none d-lg-inline-flex">
						Ajustes
					</span>
				</a>
			</li>
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