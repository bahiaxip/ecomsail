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
			<li>
				<a href="{{ route('products',['filter_type' => 1]) }}">
					<i class="fa-solid fa-box"></i> Productos
				</a>
			</li>
			<li>
				<a href="{{ route('categories',['filter_type' => 1]) }}">
					<i class="fa-solid fa-tags"></i> Categorías
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa-solid fa-box"></i> Personalizar
				</a>
			</li>
			<li>
				<a href="{{ route('users') }}">
					<i class="fa-solid fa-box"></i> Usuarios
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa-solid fa-box"></i> Ajustes
				</a>
			</li>
		</ul>
	</div>
</div>