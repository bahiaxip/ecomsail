<div style="position:relative" class="contact">
	@section('title','Contacto')

	<div class="message_modal" >
        <div class="message {{$typealert}} " >
            {{--
            <div>
                @switch($typealert)
                    @case('success')
                        <span class="success">
                            <i class="fa-solid fa-circle-check"></i>
                        </span>
                        @break
                    @case('danger')
                        <span class="danger">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </span>
                        @break
                    @case('info')
                        <span class="info">
                            <i class="fa-solid fa-circle-info"></i>
                        </span>
                        @break
                @endswitch
            </div>
            --}}
            <div>
                <span class="success @if($typealert != 'success') {{'dnone'}} @endif">
                    <i class="fa-solid fa-circle-check"></i>
                </span>
                <span class="danger @if($typealert != 'danger') {{'dnone'}} @endif">
                    <i class="fa-solid fa-circle-xmark"></i>
                </span>
                <span class="info @if($typealert != 'info') {{'dnone'}} @endif">
                    <i class="fa-solid fa-circle-info"></i>
                </span>
                <span class="warning @if($typealert != 'warning') {{'dnone'}} @endif">
                    <i class="fa-solid fa-circle-exclamation"></i>
                </span>
                <span class="question @if($typealert != 'question') {{'dnone'}} @endif">
                    <i class="fa-solid fa-circle-question"></i>
                </span>
            </div>
            <div>
                <h2>
                    
                    {{session('message.title')}}                        
                    
                </h2>
            </div>
            <div>
                <h3>{{ session('message.message') }}</h3>
            </div>
            
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <script>
                
            </script>
        </div>
    </div>
    @include('layouts.nav_user')
    @include('livewire.contact.modal_ticket')
	
    <div class="container">
        <div class="row div_title">
            <div class="col title">
                <h2>Contacto</h2>
            </div>
        </div>
        <div class="row boxes" >
            @if(config('ecomsail.email_site'))
            <div class="col-md-6">
                <div class="div_type shadow">
                    <div class="icon">
                        <i class="fa-solid fa-ticket"></i>
                    </div>
                    <div class="text">
                        <p class="title">Ticket</p>
                        <p>Consulta mediante ticket</p>
                    </div>
                    <div class="div_centered">
                        <button class="btn btn_pry" data-bs-toggle="modal" data-bs-target="#addTicket">
                            Ticket
                        </button>
                    </div>
                </div>
            </div>
            @endif
            @if(config('ecomsail.phone_site'))
            <div class="col-md-6 mauto">
                <div class="div_type">
                    <div class="icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="text">
                        <p class="title">Teléfono</p>
                        <p>Consulta mediante llamada telefónica</p>
                    </div>
                    <div class="div_centered">
                        <p>{{config('ecomsail.phone_site')}}</p>
                        
                    </div>
                    @if(config('ecomsail.whatsapp'))
                    <div class="div_centered">
                        <p>
                            <i class="fa-brands fa-whatsapp"></i>
                            {{config('ecomsail.whatsapp')}}
                        </p>
                    </div>
                    @endif
                </div>
            </div>
            
            @endif
            
        </div>
        
        <div class="row mtop32 questions">
            <div class="col">
                <button class="btn btn-light btn_collapse_questions parent collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapse_parent" aria-expanded="false" aria-controls="collapse_parent">
                    Preguntas frecuentes
                    <span style="position:absolute;right:10px">
                        <i class="fa-solid"></i>
                    </span>
                </button>
                <div class="collapse collapse_parent" id="collapse_parent">
                  <button class="btn btn-light btn_collapse_questions" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                    ¿Como realizar un pedido?
                  </button>
                  <div class="collapse collapse_child" id="collapseExample2">
                        <div class="content">
                            Pasos para realizar un pedido:
                            <ol>
                                <li>Regístrate o inicia sesión en EcomSail</li>
                                <li>Añade los productos deseados al carrito de compras</li>
                                <li>Selecciona tu dirección y tu forma de pago</li>
                                <li>Finaliza tu compra</li>
                                <li>Recibe tu compra</li>
                            </ol>
                        </div>
                  </div>
                  <button class="btn btn-light btn_collapse_questions" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                        ¿Como devolver un pedido?
                  </button>
                  <div class="collapse collapse_child" id="collapseExample3">
                        <div class="content">
                            Pasos para realizar una devolución:
                            <ol>
                                <li>Crea un ticket indicando el asunto "devolver pedido" indicando el motivo de la devolución y el número de pedido</li>
                                <li>Embala tu pedido incluyendo la etiqueta de forma visible</li>
                                <li>Envía el paquete</li>
                                <li>Recibe la devolución o reemplazo</li>
                            </ol>
                        </div>
                  </div>
                  <button class="btn btn-light btn_collapse_questions" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample">
                    ¿Como generar un ticket?
                  </button>
                  
                  <div class="collapse collapse_child" id="collapseExample4">
                    <div class="content">
                        Pasos para generar un ticket
                        <ol>
                            <li>Accede a Contacto desde la parte inferior de la web</li>
                            <li>Pulsa en el botón Ticket para acceder al formulario</li>
                            <li>Introduce los datos solicitados del formulario y pulsa en Enviar</li>
                        </ol>                        
                    </div>
                  </div>
                  <button class="btn btn-light btn_collapse_questions" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample5" aria-expanded="false" aria-controls="collapseExample">
                    ¿Garantía?
                  </button>
                  <div class="collapse collapse_child" id="collapseExample5">
                    <div class="content">
                        Todos los productos mantienen 3 años de garantía desde la última normativa actualizada el 01/01/2022.
                    </div>
                  </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>