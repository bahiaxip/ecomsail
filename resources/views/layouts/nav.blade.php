<nav class="navtop" style="display:flex">
	<div class="nav_lat nav_left">
		@auth
		<ul>
			<li>
				<a href="{{ route('show_analysis') }}">
					<i class="fa-solid fa-user-shield"></i> Admin
				</a>
			</li>
		</ul>
		@endauth
	</div>
	<!--
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
-->
	<div class=" nav_lat nav_right">
		<ul>					
			<li style="margin:auto 50px" >				
				<a href="{{ route('home') }}" >
					<div class="position-relative">
						<i class="fa-solid fa-bell"></i>
						<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
	    					99+
	    					<span class="visually-hidden">unread messages</span>
	  					</span>
	  				</div>
				</a>
			</li>
			<li>				
				<a href="{{ route('home') }}">
					<i class="fa-solid fa-eye"></i> Ver Tienda
				</a>
				
			</li>
		</ul>
	</div>
</nav>