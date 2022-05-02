@section('sidebar')
<div class="sidebar">
	<div class="logo">
		<img src="{{ asset('images/bolsas-de-compra.png') }}" alt="">
	</div>
	
	<div class="options mtop16">
		<ul>
			<li>
				<a href="{{ url('/admin') }}">
					<i class="fa-solid fa-chart-line"></i> Principal
				</a>
			</li>
			@if(helper()->testPermission(Auth::user()->permissions,'list_products')== true)
			<li>
				<a href="{{ route('list_products',['filter_type' => 1]) }}">
					<i class="fa-solid fa-box"></i> Productos
				</a>
			</li>
			@endif
			@if(helper()->testPermission(Auth::user()->permissions,'list_categories') == true)
			<li>
				<a href="{{ route('list_categories',['filter_type' => 1]) }}">
					<i class="fa-solid fa-tags"></i> Categorías
				</a>
			</li>
			@endif
			<li>
				<a href="#">
					<i class="fa-solid fa-box"></i> Personalizar
				</a>
			</li>
			@if(helper()->testPermission(Auth::user()->permissions,'list_users')== true)
			<li>
				<a href="{{ route('list_users',['filter_type' => 1]) }}">
					<i class="fa-solid fa-box"></i> Usuarios
				</a>
			</li>
			@endif
			<li>
				<a href="#">
					<i class="fa-solid fa-box"></i> Ajustes
				</a>
			</li>
		</ul>
	</div>
</div>
@endsection