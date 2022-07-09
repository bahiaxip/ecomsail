<div style="width:100%" class="footer" x-show="show2"
            x-transition:enter.duration.1000ms>
	<div class="first">
		<div class="row" >
            <div class="col-12 col_offers" >
                <div class="container" style="">
                    <div class="row title" >
                        <h5>Descubre nuestras ofertas</h5>
                    </div>
                    <div class="row offers"  >

                        <div data-aos="fade-up-right" data-aos-offset="100" class="col-md-6 col-lg-3 div_box_image">
                            <div class="box_image">
                                <img src="{{url('images/products/video/lg_oled.jpg')}}" alt="" >    
                            </div>
                            
                            <p >Televisores</p>
                        </div>
                        <div data-aos="fade-right" data-aos-offset="300" class="col-md-6 col-lg-3 div_box_image">
                            <div class="box_image">
                                <img src="{{url('images/products/video/headphones.jpg')}}" alt="" >
                            </div>
                            <p>Auriculares</p>
                        </div>
                        <div data-aos="fade-left" data-aos-offset="300" class="col-md-6 col-lg-3 div_box_image">
                            <div class="box_image">
                                <img src="{{url('images/products/video/garden2.jpg')}}" alt="">
                            </div>
                            <p>Jardín</p>
                        </div>
                        <div data-aos="fade-up-left" data-aos-offset="100" class="col-md-6 col-lg-3 div_box_image">
                            <div class="box_image">
                                <img src="{{url('images/products/video/furniture.jpg')}}" alt="">
                            </div>
                            <p>Limpieza</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		@if(Route::is('home'))
		<div class="row background" >
			<div  style="width:100%;display:flex;justify-content: center;align-items:center;position:relative;margin-bottom:10px">
				<h2 data-aos="fade-right" data-aos-offset="100" data-aos-duration="1000" style="font-size:60px;color:#E3E3E3;font-family:QuicksandB">Las mejores marcas en ropa deportiva</h2>
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
						<i class="fa-solid fa-percent"></i>
					</div>
					<div class="text">
						<p class="mtop10">Grandes descuentos</p>
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
			<div data-aos="fade-up" data-aos-offset="150" class="column">
				
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

			<div data-aos="fade-up" data-aos-offset="200" data-aos-delay="200" class="column">
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
