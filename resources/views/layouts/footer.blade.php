<div style="width:100%" class="footer" x-show="show2"
            x-transition:enter.duration.1000ms>
	<div class="first">
		@if(Route::is('home'))
		<div class="row background" >
			<div style="width:100%;display:flex;justify-content: center;align-items:center;position:relative">
				<h2 style="font-size:60px;color:darkorange">Las mejores marcas en ropa deportiva</h2>
			</div>
		</div>
		@endif
		
		<div class="container info">
			
			<div class="row">
				<div class="col-md-3 col-4" >
					<div class="header" style="display:flex;justify-content: center;">
						<i class="fa-solid fa-credit-card"></i>
					</div>
					<div class="text">
						<p class="mtop10">Pago seguro</p>					
					</div>
				</div>
				<div class="col-md-3 col-4">
					<div class="header">
						<i class="fa-solid fa-truck"></i>
					</div>
					<div class="text">
						<p class="mtop10" >Envío a domicilio </p>					
					</div>
				</div>
				<div class="col-md-3 col-4" >
					<div class="header">
						<i class="fa-solid fa-certificate"></i>
					</div>
					<div class="text">
						<p class="mtop10">Protección del comprador</p>						
					</div>
				</div>
				
				<div class="col-md-3 col-12" >
					
					<div class="images" style="display:flex;justify-content: space-around;">
						<img src="{{url('icons/payment/mastercard.svg')}}" alt="" width="32">
						<img src="{{url('icons/payment/visa.svg')}}" alt="" >
						<img src="{{url('icons/payment/paypal.svg')}}" alt="" >
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="end">
		<div class="options">
			<div class="column">				
				<div class="links">
					<div>
						<i class="fa-solid fa-circle-question"></i>
						EcomSail
						<p class="mtop10">Guía de compra</p>
						<p class="mtop10">Unirse a EcomSail</p>
					</div>
				</div>
			</div>
			<div class="column">
				
				<div class="links">
					<div>
						<i class="fa-solid fa-circle-question"></i>
						Atención al cliente
						<p class="mtop10" >Contacto</p>
						<p class="mtop10" >Envíos y entregas</p>
						<p class="mtop10">Devoluciones</p>
					</div>
				</div>
			</div>

			<div class="column">
				<div class="links">
					<div>
						<i class="fa-solid fa-trophy"></i>
						Promociones
						<p class="mtop10">Cupones y Ofertas</p>
					</div>
				</div>
			</div>
			
		</div>
		<div class="comunity">			
			<div class="header rrss">
				<p>SÍGUENOS</p>
			</div>
			<div class="links rrss" >
				<img src="{{url('icons/rrss/linkedin.svg')}}" alt="" class="uptop5">
				<img src="{{url('icons/rrss/instagram.svg')}}" alt="">
				<img src="{{url('icons/rrss/twitter.svg')}}" alt="">
				<img src="{{url('icons/rrss/whatsapp.svg')}}" alt="">
				<img src="{{url('icons/rrss/facebook.svg')}}" alt="">
			</div>			
		</div>
	</div>
	<div class="copy">
		<p>&copy; 2022 EcomSail S.L. Todos los derechos reservados</p>
	</div>

</div>