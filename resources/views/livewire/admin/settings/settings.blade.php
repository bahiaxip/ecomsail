<div>
	{{-- establecemos title si subcatlist['name'] contiene valor --}}
    @section('title','Ajustes')
    
    
    @section('path')
    &nbsp;>&nbsp;
    <li class="list_name">
        <a href="{{ url('admin/settings') }}">
            <div class="icon icon_cat"></div>
            <!--<i class="fa-solid fa-columns"></i>--> 
            <span>Ajustes</span>
        </a>
    </li>
    @endsection

    @if(session()->has('message'))
    <div class="container ">
        <div class="alert alert-{{$typealert}}">            
            <h2 >{{session('message') }}</h2>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <script>
                $('.alert').slideDown();
                setTimeout(()=>{ $('.alert').slideUp(); }, 10000);
            </script>
        </div>
    </div>
    @endif
    <div class="admin_settings mtop32" style="width:100%">
    	<form wire:submit.prevent="save_settings(Object.fromEntries(new FormData($event.target)))">
    		<div class="admin_panels" >
    		
	    		<div class="panel_settings">
	    			<div class="card">
	                    <div class="card-header">
	                    	<i class="fa-solid fa-screwdriver-wrench"></i>
	                        AJUSTES
	                    </div>
	                    <div class="card-body">
	                    	<div class="">
	                    		{{Form::label('owner_name','Nombre')}}
	                    		<div class="input-group">
	                    			<span class="input-group-text">
	                    				<i class="fa-solid fa-keyboard"></i>
	                    			</span>
	                		    	{{Form::text('owner_name',Config::get('ecomsail.owner_name'),['class' => 'form-control'])}}
	                			</div>
	                    	</div>
	                    	<div class="mtop16">
	                    		{{Form::label('title_site','Título del sitio')}}
	                    		<div class="input-group">
	                    			<span class="input-group-text">
	                    				<i class="fa-solid fa-keyboard"></i>
	                    			</span>
	                		    	{{Form::text('title_site',Config::get('ecomsail.title_site'),['class' => 'form-control'])}}
	                			</div>
	                    	</div>
	                    	<div class="mtop16">
	                    		{{Form::label('url_site','URL')}}
	                    		<div class="input-group">
	                    			<span class="input-group-text">
	                    				<i class="fa-solid fa-link"></i>
	                    			</span>
	                		    	{{Form::text('url_site',Config::get('ecomsail.url_site'),['class' => 'form-control'])}}
	                			</div>
	                    	</div>
	                    	<div class="mtop16">
	                    		{{Form::label('email_site','Correo electrónico')}}
	                    		<div class="input-group">
	                    			<span class="input-group-text">
	                    				<i class="fa-solid fa-at"></i>
	                    			</span>
	                		    	{{Form::text('email_site',Config::get('ecomsail.email_site'),['class' => 'form-control'])}}
	                			</div>
	                    	</div>
	                    	<div class="mtop16">
	                    		{{Form::label('phone_site','Teléfono')}}
	                    		<div class="input-group">
	                    			<span class="input-group-text">
	                    				<i class="fa-solid fa-keyboard"></i>
	                    			</span>
	                		    	{{Form::text('phone_site',Config::get('ecomsail.phone_site'),['class' => 'form-control'])}}
	                			</div>
	                    	</div>
	                    </div>
	                </div>
	    		</div>

	    		<div class="panel_settings" >
	    			<div class="card">
	                    <div class="card-header">
	                    	<i class="fa-solid fa-envelope"></i>
	                        RRSS 
	                    </div>
	                    <div class="card-body">
	                        <div class="">
	                    		{{Form::label('whatsapp','WhatsApp')}}
	                    		<div class="input-group">
	                    			<span class="input-group-text">
	                    				<i class="fa-brands fa-whatsapp"></i>
	                    			</span>
	                		    	{{Form::text('whatsapp',Config::get('ecomsail.whatsapp'),['class' => 'form-control'])}}
	                			</div>
	                    	</div>
	                    	<div class="mtop16">
	                    		{{Form::label('facebook','Facebook')}}
	                    		<div class="input-group">
	                    			<span class="input-group-text">
	                    				<i class="fa-brands fa-facebook"></i>
	                    			</span>
	                		    	{{Form::text('facebook',Config::get('ecomsail.facebook'),['class' => 'form-control'])}}
	                			</div>
	                    	</div>
	                    	<div class="mtop16">
	                    		{{Form::label('twitter','Twitter')}}
	                    		<div class="input-group">
	                    			<span class="input-group-text">
	                    				<i class="fa-brands fa-twitter"></i>
	                    			</span>
	                		    	{{Form::text('twitter',Config::get('ecomsail.twitter'),['class' => 'form-control'])}}
	                			</div>
	                    	</div>
	                    	<div class="mtop16">
	                    		{{Form::label('instagram','Instagram')}}
	                    		<div class="input-group">
	                    			<span class="input-group-text">
	                    				<i class="fa-brands fa-instagram"></i>
	                    			</span>
	                		    	{{Form::text('instagram',Config::get('ecomsail.instagram'),['class' => 'form-control'])}}
	                			</div>
	                    	</div>
	                    	<div class="mtop16">
	                    		{{Form::label('youtube','Youtube')}}
	                    		<div class="input-group">
	                    			<span class="input-group-text">
	                    				<i class="fa-brands fa-youtube"></i>
	                    			</span>
	                		    	{{Form::text('youtube',Config::get('ecomsail.youtube'),['class' => 'form-control'])}}
	                			</div>
	                    	</div>
	                    </div>
	                </div>
	    		</div>

	    		<div class="panel_settings" >
	    			<div class="card">
	                    <div class="card-header">
	                    	<i class="fa-solid fa-eye"></i>
	                        APARIENCIA
	                    </div>
	                    <div class="card-body">
	                    	<div class="row">
	                    		<div class="col-md-12">
	                    			{{Form::label('main_slider','Slider principal')}}
		                		    <div class="form-check form-switch">
		                                <input name="main_slider" class="form-check-input mtop10" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width:2.4em;padding:7px" @if(Config::get('ecomsail.main_slider') == 'on') checked @endif>
		                            </div>	
	                    		</div>
	                    	</div>
	                    	<div class="row mtop16">
	                    		<div class="col-md-12">
	                    			{{Form::label('products_slider','Slider de productos')}}
		                		    <div class="form-check form-switch">
		                                <input name="products_slider" class="form-check-input mtop10" type="checkbox" role="switch" id="products_slider" style="width:2.4em;padding:7px" @if(Config::get('ecomsail.products_slider') == 'on') checked @endif>
		                            </div>	
	                    		</div>
	                        	
	                    	</div>
	                        
	                    	{{--<div class="row mtop16">
	                    		<div class="col-12">
	                    			{{Form::label('redirect_adding_product','Redirigir al añadir producto')}}
		                        	<div class="form-check form-switch">
		                                <input class="form-check-input mtop12 type="checkbox" role="switch" id="redirect_add_product">
		                            </div>
	                    		</div>                    		
	                    	</div>--}}
	                    	<div class="row mtop26">
	                    		<div class="col-12">
	                    	
		                            {{Form::label('button_adding_product','Mostrar botón al añadir producto')}}
		                        	<div class="form-check form-switch">
		                                <input name="button_adding_product" class="form-check-input mtop12" type="checkbox" role="switch" id="button_adding_product" @if(Config::get('ecomsail.button_adding_product') == 'on') checked @endif>
		                            </div>
		                        </div>
	                    	</div>
	                    	
	                    	<div class="row mtop16">
	                    		<div class="col-12">
	                    			{{Form::label('items_per_page','Productos por página')}}
	                        		{{Form::number('items_per_page',Config::get('ecomsail.items_per_page'),['class' => 'form-control'])}}	
	                    		</div>
	                    	</div>

	                    	<div class="row mtop16">
	                    		<div class="col-12">
	                    			{{Form::label('position_coin','Posición de la moneda')}}
	                		    	{{ Form::select('position_coin',[0=>'Derecha',1=>'Izquierda'],Config::get('ecomsail.position_coin'),['class' => 'form-select'])}}
	                    		</div>
	                    	</div>

	                    </div>
	                </div>
	    		</div>
	    		<div class="panel_settings" >
	    			<div class="card">
	                    <div class="card-header">
	                    	<i class="fa-solid fa-envelope"></i>
	                        Pagos
	                    </div>
	                    <div class="card-body">
	                    	<div class="row">
	                    		<div class="col-12">
		                    		{{Form::label('payment_target','Pago con tarjeta')}}
		                        	<div class="form-check form-switch">
		                                <input name="payment_target" class="form-check-input mtop10" type="checkbox" role="switch" id="payment_target" @if(Config::get('ecomsail.payment_target') == 'on') checked @endif>
		                            </div>
		                    	</div>
	                    	</div>
	                    	<div class="row mtop16">
	                    		<div class="col-12">
	                    			{{Form::label('payment_transfer','Pago por transferencia')}}
		                        	<div class="form-check form-switch">
		                                <input name="payment_transfer" class="form-check-input mtop10" type="checkbox" role="switch" id="payment_transfer" @if(Config::get('ecomsail.payment_transfer') == 'on') checked @endif>
		                            </div>
	                    		</div>
	                    	</div>
	                    	
	                		<div class="row mtop16">
	                			<div class="col-12">
	                				{{Form::label('payment_paypal','Pago con Paypal')}}
		                        	<div class="form-check form-switch">
		                                <input name="payment_paypal" class="form-check-input mtop10" type="checkbox" role="switch" id="payment_paypal" @if(Config::get('ecomsail.payment_paypal') == 'on') checked @endif>
		                            </div>
	                			</div>
	                		</div>
	                    	
	                    	<div class="row mtop16">
	                    		<div class="col-12">
	                    			{{Form::label('send_email','Enviar correo electrónico')}}
		                        	<div class="form-check form-switch">
		                                <input name="send_email" class="form-check-input mtop10" type="checkbox" role="switch" id="send_email" @if(Config::get('ecomsail.send_email') == 'on') checked @endif>
		                    		</div>
	                    		</div>
	                    	</div>
	                    	
	                    	<div class="row mtop16">
	                    		<div class="col-12">
	                    			{{Form::label('send_not','Enviar notificaciones')}}
		                        	<div class="form-check form-switch">
		                                <input name="send_not" class="form-check-input mtop10" type="checkbox" role="switch" id="send_not" @if(Config::get('ecomsail.send_not') == 'on') checked @endif>
		                            </div>
	                    		</div>
	                    	</div>

	                    </div>
	                </div>
	    		</div>
	    	</div>
	    	<div class="buttons mtop16">
	    		<button type="submit" class="btn btn_pry">
	    			Guardar
	    		</button>
	    	</div>
    	</form>
    </div>

</div>