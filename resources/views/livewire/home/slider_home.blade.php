<div class="mdslider">
	<ul class="navigation">
		<li><a href="javascript:void(0)" id="md_slider_nav_prev"><i class="fas fa-chevron-left"></i></a></li>
		<li><a href="javascript:void(0)" id="md_slider_nav_next"><i class="fas fa-chevron-right"></i></a></li>
	</ul>
	@foreach($sliders as $slider)
	<div class="md-slider-item" >
		@if(config('ecomsail.full_slider') && config('ecomsail.full_slider') == 'on')
		<div class="box_slider full_slider">
			<div class="slider" style="position:relative">
				@if(config('ecomsail.full_slider') && $slider->aux_image)
				
				<picture>
					<source srcset="{{ url($slider->path_tag.$slider->image)}}" media="(min-width: 900px)">
					<img src="{{ url($slider->aux_path_tag.$slider->aux_image)}}" alt="" class="img-fluid">
				</picture>
				@else
				<img src="{{ url($slider->path_tag.$slider->image)}}" alt="" class="img-fluid">
				@endif
				@if(config('ecomsail.main_title') == 'on' 
						|| config('ecomsail.aditional_title') == 'on' )
				<div class="div_text">
					<div class="text">
						@if(config('ecomsail.main_title') == 'on')
						<h2>{{$slider->title}}</h2>
						@endif
						@if(config('ecomsail.aditional_title') == 'on')
						<p>{{$slider->text}}</p>
						@endif
					</div>
				</div>
				@endif
			</div>
		</div>
		@elseif(config('ecomsail.double_panel') && config('ecomsail.double_panel') == 'on')
		<div class="row double_panel">
			<div class="col-lg-7 col-sm-12 slider_left">
				<div class="content">
					<div class="cinside">
						<!--<h2>Las mejores marcas en ropa deportiva</h2>
						<p>Descuentos hasta un 40%</p>
						-->
						@if(config('ecomsail.main_title') == 'on')
						<h2>{{$slider->title}}</h2>
						@endif
						@if(config('ecomsail.aditional_title') == 'on')
						<p>{{$slider->text}}</p>
						@endif
					</div>					
				</div>
			</div>
			<div class="col-lg-5 col-sm-12 dp_img">
				<div class="img">
					<img src="{{ url($slider->path_tag.$slider->image)}}" alt="" class="img-fluid">
					
					<div class="div_text">
						<div class="text">
							@if(config('ecomsail.main_title') == 'on')
							<h2>{{$slider->title}}</h2>
							@endif
							@if(config('ecomsail.aditional_title') == 'on')
							<p>{{$slider->text}}</p>
							@endif
						</div>
					</div>
					
				</div>
			</div>
		</div>
		@else
		<div class="box_slider">
			<div class="slider slider_auto">
				<img src="{{ url($slider->path_tag.$slider->image)}}" alt="" class="img-fluid">
				@if(config()->has('ecomsail.main_title') && config('ecomsail.main_title') == 'on' || config()->has('ecomsail.aditional_title') && config('ecomsail.aditional_title') == 'on')
				<div class="div_text">
					<div class="text">
						@if(!config('ecomsail.main_title') || !config('ecomsail.aditional_title'))
						<h2 style="width:100%;height:10px"></h2>
						@endif
						@if(config('ecomsail.main_title') == 'on')
						<h2>{{$slider->title}}</h2>
						@endif
						
						@if(config('ecomsail.aditional_title') == 'on')
						<p>{{$slider->text}}</p>						
						@endif
					</div>
				</div>
				@endif
			</div>
		</div>
		@endif
	</div>
	{{--
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
	<div class="md-slider-item" >
		<div class="row">
			<div class="col-md-7 col-sm-12 slider_left">
				<div class="content">
					<div class="cinside">
						<h2>Decora tu estancia</h2>
						<p>Aprovecha nuestros descuentos en decoración</p>
					</div>					
				</div>
			</div>
			<div class="col-md-5 col-sm-12">
				<img src="{{ url('/images/products/video/furniture.jpg')}}" alt="" class="img-fluid">
			</div>
		</div>		
	</div>
	--}}	
	@endforeach
	<script>
		
	</script>
</div>