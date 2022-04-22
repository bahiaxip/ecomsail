<div class="content">
	<div class="sectionL">
		@include('layouts.sidebar')
	</div>
	<div class="sectionR">
		<div class="inner">
			<nav class="paths">
				<ul >
					<li>
						<a href="#">
							<i class="fa-solid fa-columns"></i> Panel
						</a>
					</li>
					@section('path')
					@show
				</ul>
			</nav>
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
						
						//document.readystatechange, de forma automática como la siguiente
						//línea puede no ejecutar si se encuentra duplicado en otro lugar
						//document.onreadystatechange=() => {
						// para evitarlos generarlo con EventListener()
						document.addEventListener('readystatechange',()=>{
					//con DOMContentLoaded tb funciona correctamente
						//document.addEventListener('DOMContentLoaded',() => {
							
							if(document.readyState ==  "complete"){
								let div_alert = document.querySelector('.alert');
								console.log(div_alert)
								//let div_alert2 = document.getElementsByClassName('alert');
								//console.log(div_alert2[0])							
								div_alert.classList.toggle('hide');
								//$('.alert').slideDown();
								setTimeout(() => div_alert.classList.toggle('hide'),10000);	
							}
						})					
						
					</script>
				</div>
			</div>
			@endif
			@section('content')

			@show
		</div>

		
	</div>
	@section('extra')

	@show	
</div>