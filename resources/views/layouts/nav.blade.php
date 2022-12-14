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
				<a href="{{ route('list_notifications',['filter_type' => 1]) }}" title="Notificaciones">
					@php
						$unseen = \App\Models\User::find(Auth::id())->unseen_notifications;
					@endphp
					<div class="position-relative div_notification">
						<i class="fa-solid fa-bell {{$unseen}}" ></i>
						
								
						<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger @if($unseen == 0) dnone @endif" id="notification">
							{{-- necesitamos User en lugar de Auth para que actualice en tiempo real--}}
							@if($unseen > 0)
								<span class="unseen_not">{{$unseen}}+</span>
    						
	    						<span class="visually-hidden">unread messages</span>
    						@endif
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

<script>
	var notifications;
	console.log('{{Route::currentRouteName()}}')
	setInterval(()=>{
		let div_not = document.querySelector('.div_notification');
		let not = document.querySelector('#notification');
		let unseen_not;
		if(not)
			unseen_not =  not.querySelector('.unseen_not');

	    $.ajax({
	    //opción1: token con headers
	    	//headers:{'X-CSRF-TOKEN': "{{csrf_token()}}"},	    	
	    	type:'POST',
	    	url:"/ajax",
    	//opción2: token con data
	    	data:{
	    		"_token": "{{ csrf_token() }}"
    		},
	    	success:function(data){
	    		console.log("data: ",data)
	    		console.log("unseen_not: ",unseen_not)
	    		//solo si es número actualiza
	    		if(typeof(data) =='number' && !unseen_not){
	    			console.log("es número y el unseen_not es null")
	    			not.classList.remove('dnone');
	    			not.innerHTML = `
	    				<span class="unseen_not">${data}+</span>
						<span class="visually-hidden">unread messages</span>
	    			`;
	    		}else if(typeof(data) =='number'){

	    			console.log("es número y el unseen_not es número también")
    			//si el valor de data es distinto al valor del span notification 
	    		//actualizamos
	    			if(parseInt(unseen_not.innerHTML) != data){
	    				
	    			
		    			not.classList.remove('dnone');
			    		if(unseen_not){
			    			console.log("no es el primero")
		    				unseen_not.innerHTML = ` ${data}+ `;
			    		}else{
    			//eliminar!! nunca llega aquí
			    			console.log("Es el primero")
			    			not.innerHTML = `
			    				<span class="unseen_not">${data}+</span>
								<span class="visually-hidden">unread messages</span>
			    			`;
			    		}
			    	}else{
			    		console.log("no actualiza")
			    	}
	    		}else{
			    	console.log("no hay ninguno")
		    	}
	    	}
	    });
	},20000)
	
</script>