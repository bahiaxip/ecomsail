<nav class="navtop" style="display:flex">
	<div class="nav_lat nav_left">
		@auth
		<ul>
			<li>
				<a href="{{ url('/admin/users') }}">
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
					<i class="fa-solid fa-house"></i> Inicio
				</a>
			</li>
			<li>
				<a href="{{ url('/') }}">
					<i class="fa-solid fa-store"></i>
					Tienda
				</a>
			</li>
			<li>
				<a href="{{ url('/') }}">
					<i class="fa-solid fa-trophy"></i> Ofertas
				</a>
			</li>
			<li>
				<a href="{{ url('/') }}">
					<i class="fa-solid fa-envelope"></i> Contacto
				</a>
			</li>
			<li>
				<a href="{{ url('/') }}">
					<i class="fa-solid fa-gears"></i> Panel
				</a>
			</li>
		</ul>
	</div>
	<div class="nav_lat nav_right">
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
						<a href="{{url('/admin/users')}}">Admin</a>
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