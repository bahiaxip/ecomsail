<div class="mdslider">
	<ul class="navigation">
		<li><a href="javascript:void(0)" id="md_slider_nav_prev"><i class="fas fa-chevron-left"></i></a></li>
		<li><a href="javascript:void(0)" id="md_slider_nav_next"><i class="fas fa-chevron-right"></i></a></li>
	</ul>
	{{--@foreach($sliders as $slider)--}}
	<div class="md-slider-item" >
		<div class="row">
			<div class="col-md-7 col-sm-12 slider_left">
				<div class="content">
					<div class="cinside">
						<h2>Las mejores marcas en ropa deportiva</h2>
						<p>Descuentos hasta un 40%</p>
					</div>					
				</div>
			</div>
			<div class="col-md-5 col-sm-12">
				<img src="{{ url('/images/ropa_deportiva.jpg')}}" alt="" class="img-fluid">
			</div>
		</div>		
	</div>
	<div class="md-slider-item" >
		<div class="row">
			<div class="col-md-7 col-sm-12 slider_left">
				<div class="content">
					<div class="cinside">
						<h2>Novedades para toda la familia</h2>
						<p>Descubre la tendencia en ropa infantil </p>
					</div>					
				</div>
			</div>
			<div class="col-md-5 col-sm-12">
				<img src="{{ url('/images/kids.jpg')}}" alt="" class="img-fluid">
			</div>
		</div>		
	</div>
	<div class="md-slider-item" >
		<div class="row">
			<div class="col-md-7 col-sm-12 slider_left">
				<div class="content">
					<div class="cinside">
						<h2>Electrohogar</h2>
						<p>Tus electrodómesticos ahora con envío gratis</p>
					</div>					
				</div>
			</div>
			<div class="col-md-5 col-sm-12">
				<img src="{{ url('/images/appliance_2.jpg')}}" alt="" class="img-fluid">
			</div>
		</div>		
	</div>	
	{{--@endforeach--}}
	
</div>