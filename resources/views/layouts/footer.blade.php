<div style="width:100%" class="footer" 
{{--x-show="show2"
x-transition:enter.duration.1000ms--}}
>
    @include('layouts.methods_payment')
	<div class="first">
		
		@if(Route::is('home'))
		<div class="row background" >
			<div  style="width:100%;display:flex;justify-content: center;align-items:center;position:relative;margin-bottom:10px">
				<h2 data-aos="fade-right" data-aos-offset="100" data-aos-duration="1000" style="font-size:60px;color:#E3E3E3;font-family:QuicksandB">Las mejores marcas en ropa deportiva</h2>
			</div>
		</div>
		@endif
		<div class="div_icons">
			<div class="container info">
				<div class="row">
					<div class="col-md-4 col-4" >
						<div class="header" style="display:flex;justify-content: center;">
							<i class="fa-solid fa-credit-card"></i>
						</div>
						<div class="text">
							<p class="mtop10">Tarjeta</p>					
						</div>
					</div>
					<div class="col-md-4 col-4">
						<div class="header">
							<i class="fa-solid fa-truck"></i>
						</div>
						<div class="text">
							<p class="mtop10" >Envío a domicilio </p>					
						</div>
					</div>
					<div class="col-md-4 col-4" >
						<div class="header">
							<i class="fa-solid fa-percent"></i>
						</div>
						<div class="text">
							<p class="mtop10">Grandes descuentos</p>
						</div>
					</div>
					
					{{--
					<div class="col-md-3 col-12" >
						
						<div class="images" style="display:flex;justify-content: space-around;">						
							<img src="{{url('icons/payment/mastercard.svg')}}" alt="" style="width:48px" >
							<img src="{{url('icons/payment/visa.svg')}}" alt="" style="width:70px" >
							@if(config('ecomsail.payment_paypal'))
							<img src="{{url('icons/payment/paypal.svg')}}" alt="" style="width:110px">
							@endif
						</div>
					</div>
					--}}
				</div>
			</div>
		</div>
		{{--
		<div class="row" style="min-height:100px">
			<div class="col-md-12" style="margin:auto">
				<div class="images" style="display:flex;justify-content: space-around;">
					<img src="{{url('icons/payment/mastercard.svg')}}" alt="" style="width:48px" >
					<img src="{{url('icons/payment/visa.svg')}}" alt="" style="width:64px" >
					<img src="{{url('icons/payment/paypal.svg')}}" alt="" style="width:75px">
				</div>
			</div>
		</div>
		--}}
	</div>
	<div class="end">
		<div class="options">
			<div class="otrodiv">
				<div class="div_links">
					<div data-aos="fade-up" data-aos-offset="100" class="column">				
						<div class="links">
							<div>
								<i class="fa-solid fa-circle-question"></i>
								EcomSail
								<p class="mtop10">Guía de compra</p>
								<p class="mtop10">Unirse a EcomSail</p>
							</div>
						</div>
					</div>
					<div data-aos="fade-up" data-aos-offset="100" class="column">
						
						<div class="links">
							<div>
								<i class="fa-solid fa-circle-question"></i>
								Atención al cliente
								<p class="mtop10" >
									<a href="{{route('contact')}}">Contacto</a>
								</p>
								<p class="mtop10">
									<button data-bs-toggle="modal" data-bs-target="#payment">Métodos de pago</button>
								</p>
								<!--
								<p class="mtop10" >Envíos y entregas</p>
								<p class="mtop10">Devoluciones</p>
								-->
							</div>
						</div>
					</div>
				</div>
				{{--
				<div data-aos="fade-up" data-aos-offset="180" data-aos-delay="150" class="column">
					<div class="links">
						<div>
							<i class="fa-solid fa-trophy"></i>
							Promociones
							<p class="mtop10">Cupones y Ofertas</p>
						</div>
					</div>
				</div>
				--}}
				<div class="div_payment">
					<div data-aos="fade-up" data-aos-offset="100" data-aos-delay="150" class="column" >
						<div class="title_payment_icons" >
							Pago seguro					
						</div>
						<div class="images">

							<img src="{{url('ics/payment/mastercard.svg')}}" alt="" style="width:50px" >
							<img src="{{url('ics/payment/visa.svg')}}" alt="" style="width:80px" >
							@if(config('ecomsail.payment_paypal'))
							<img src="{{url('ics/payment/paypal.svg')}}" alt="" style="width:100px">
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="comunity" data-aos="fade-up" data-aos-offset="100" data-aos-delay="200">			
			<div class="header rrss">
				<p>SÍGUENOS</p>
			</div>
			<div class="links rrss" >
				@if(config('ecomsail.linkedin'))
				<a href="{{url(config('ecomsail.linkedin'))}}" target="_blank">
					<img src="{{url('ics/rrss/linkedin.svg')}}" alt="" class="uptop5">
				</a>
				@endif
				@if(config('ecomsail.instagram'))
				<a href="{{url(config('ecomsail.instagram'))}}" target="_blank">
					<img src="{{url('ics/rrss/instagram.svg')}}" alt="">
				</a>
				@endif
				@if(config('ecomsail.twitter'))
				<a href="{{url(config('ecomsail.twitter'))}}" target="_blank">
					<img src="{{url('ics/rrss/twitter.svg')}}" alt="">
				</a>
				@endif
				@if(config('ecomsail.whatsapp'))
				<a href="{{route('contact')}}" target="_blank">
					<img src="{{url('ics/rrss/whatsapp.svg')}}" alt="">
				</a>
				@endif

				@if(config('ecomsail.facebook'))
				<a href="{{url(config('ecomsail.facebook'))}}" target="_blank">
					<img src="{{url('ics/rrss/facebook.svg')}}" alt="">
				</a>
				@endif
			</div>			
		</div>
	</div>
	<div class="copy">
		<p>Desarrollado por <a href="bahiaxip.com">bahiaxip.com</a> &copy; 2022 EcomSail S.L. </p>
	</div>

</div>
