@extends('layouts.login')

@section('title',"Login")

@section('content')
<div class="back_login">
	<div class="header_login">
		<img src="{{ asset('images/ecomsail_logo.svg') }}" alt="">
	</div>
	<div class="box shadow">
		<h2>Iniciar sesión</h2>
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
		{!! Form::open(['url' => '/login']) !!}
		<div class="mtop16">
			<label for="email">E-Mail</label>
			<div class="input-group">
				<div class="input-group-text"><i class="fa-solid fa-user-lock"></i></div>
				{!! Form::email('email',null,['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="mtop16">
			<label for="pass">Contraseña</label>
			<div class="input-group">
				<div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
				{!! Form::password('pass',['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="mtop16 tcenter">
			{!! Form::submit('Login',['class' => 'btn btn_login']) !!}
		</div>
		<div class="forget_pass mtop16">
			<a href="#">¿Olvidó su contraseña?</a>
		</div>
		
	</div>
	{!! Form::close() !!}
</div>
@endsection