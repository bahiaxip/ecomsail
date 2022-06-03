<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="route_name" content={{ Route::currentRouteName() }}>
    <title>EcomSail - @yield('title')</title>
    <!-- bootstrap csss -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--nav top -->
    <!--<link rel="stylesheet" href="css/nav.css" > 
    <link rel="stylesheet" href="css/main.css" >    -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">    
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" integrity="sha512-l7qZAq1JcXdHei6h2z8h8sMe3NbMrmowhOl+QkP3UhifPpCW2MC4M0i26Y8wYpbz1xD9t61MLT9L1N773dzlOA==" crossorigin="anonymous" />
    <!-- font.awesome -->
    <script src="https://kit.fontawesome.com/8588bc45a2.js" crossorigin="anonymous"></script>
    
    
    <!-- bootstrap.bundle para dropdown menu de bootstrap -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="{{ url('ckeditor/ckeditor.js') }}"></script>
    <script src="{{url('js/function_editor.js')}}"></script>


    
    
    @livewireStyles
</head>
<body>
    <div class="header">            
        @include('layouts.nav')
    </div>
    @if(Route::is(['list_users','list_categories','list_products','list_attributes','list_locations','list_cities']))
    <div class="content">
        <div class="sectionL">
            {{--@include('layouts.sidebar')--}}
            @section('sidebar')
                @include('layouts.sidebar')
            @show
        </div>
        <div class="sectionR">
            <div class="inner">
                <nav class="paths">
                    <ul >
                        <li>
                            <a href="{{ route('list_users',['filter_type' => 1]) }}">
                                <i class="fa-solid fa-columns"></i> Admin
                            </a>
                        </li>
                        @yield('path')
                    </ul>
                </nav>
                {{--@if(Session::has('message'))--}}
                <!-- añadimos una variable para que solo se muestre el message en el component y no en los 2 -->
                @if(session()->has('message') && !session()->has('only_component'))
                <h2>Hola</h2>
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
                {{$slot ?? ''}}
            </div>
            
        </div>
        <div class="sectionE">
            
        </div>
    </div>
    @else   
    {{$slot ?? ''}}
    @endif

    @livewireScripts
    <!--version 3 da error con tooltip-->    
    
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    @stack('scripts')
    <!-- versión 2.7 -->
    <!--<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>-->


{{--mover arriba--}}
    
    <script src="{{url('js/functions.js')}}"></script>
    <script>
    
        
    
        

    </script>
    
</body>
    
</html>