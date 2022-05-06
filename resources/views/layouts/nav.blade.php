<nav class="navtop" style="display:flex">
	<div class="nav_lat nav_left">
		@auth
		<ul>
			<li>
				<a href="{{ route('list_users',['filter_type' => 1]) }}">
					<i class="fa-solid fa-gears"></i> Panel
				</a>
			</li>
		</ul>
		@endauth
	</div>
	<div class="nav_center">
		<ul class="list">
			<li>
				<a href="{{ url('/') }}">
					<i class="fa-solid fa-house"></i> 
					<span class="d-none d-md-flex">Inicio</span>
				</a>
			</li>
			<li>
				<a href="{{ url('/') }}">
					<i class="fa-solid fa-store"></i>
					<span class="d-none d-md-flex">Tienda</span>
				</a>
			</li>
			<li>
				<a href="{{ url('/') }}">
					<i class="fa-solid fa-trophy"></i> 
					<span class="d-none d-md-flex">Ofertas</span>
				</a>
			</li>
			<li>
				<a href="{{ url('/') }}">
					<i class="fa-solid fa-envelope"></i> 
					<span class="d-none d-md-flex">Contacto</span>
				</a>
			</li>
			<li>
				<a href="{{ url('/') }}">
					<i class="fa-solid fa-gears"></i> 
					<span class="d-none d-md-flex">Panel</span>
				</a>
			</li>
		</ul>
	</div>
	<div class=" nav_lat nav_right">
		<ul>
			@auth
			<li>				
				<a href="{{ url('/') }}">
					<i class="fa-solid fa-gears"></i> Mi Cuenta
				</a>
				<ul>
					<li>
						<a href="{{url('/logout')}}">Salir</a>
					</li>
					<li>
						<a href="{{route('list_users',['filter_type' => 1])}}">Admin</a>
					</li>
				</ul>
			</li>
			@else
			<li>
				<a href="{{ url('/login') }}">
					<i class="fa-solid fa-gears"></i> Login
				</a>
			</li>
			@endauth

		</ul>
	</div>
</nav>