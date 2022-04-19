@extends('layouts.login')

@section('title',"Register")

@section('content')
<div class="back_login">
	<div class="header_login">
		<img src="{{ asset('images/bolsas-de-compra.png') }}" alt="">
	</div>

	<div class="box shadow">
		<h2>Crear cuenta</h2>
		@if(Session::has('message'))
		<div class="container">
			<div class="alert alert-{{ Session::get('typealert') }} hide" >
				{{ Session::get('message') }}
				@if($errors->any())
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
				@endif
				<script>
					document.onreadystatechange=() => {						
						if(document.readyState ==  "complete"){
						let div_alert = document.querySelector('.alert');
						console.log(div_alert)
						//let div_alert2 = document.getElementsByClassName('alert');
						//console.log(div_alert2[0])							
						div_alert.classList.toggle('hide');
						//$('.alert').slideDown();
						setTimeout(function(){div_alert.classList.toggle('hide');},10000);	
						}
					}					
				</script>
			</div>
		</div>
		@endif
		{!! Form::open(['url' => '/register']) !!}

		<div class="mtop16">
			<label for="nick">Nick</label>
			<div class="input-group">
				<div class="input-group-text"><i class="fa-solid fa-user-tag"></i></div>
				{!! Form::text('nick',null,['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="mtop16">
			<label for="email">Nombre</label>
			<div class="input-group">
				<div class="input-group-text"><i class="fa-solid fa-user"></i></div>
				{!! Form::text('name',null,['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="mtop16">
			<label for="email">Apellidos</label>
			<div class="input-group">
				<div class="input-group-text"><i class="fa-solid fa-user"></i></div>
				{!! Form::text('lastname',null,['class' => 'form-control','required']) !!}
			</div>
		</div>

		<div class="mtop16">
			<label for="email">E-Mail</label>
			<div class="input-group">
				<div class="input-group-text"><i class="fa-solid fa-envelope"></i></div>
				{!! Form::email('email',null,['class' => 'form-control','required']) !!}
			</div>
		</div>
		<div class="mtop16">
			<label for="pass">Contraseña</label>
			<div class="input-group">
				<div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
				{!! Form::password('pass',['class' => 'form-control','required']) !!}
			</div>
		</div>

		<div class="mtop16">
			<label for="pass">Confirmar contraseña</label>
			<div class="input-group">
				<div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
				{!! Form::password('pass2',['class' => 'form-control','required']) !!}
			</div>
		</div>

		<div class="mtop16 tcenter">
			{!! Form::submit('Registrarse',['class' => 'btn btn_login']) !!}
		</div>


		{!! Form::close() !!}

		<div class="forget_pass mtop16">
			<a href="{{ url('/login') }}">Ir a login</a>
		</div>
		
		
	</div>
	


</div>
@endsection