<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="route_name" content={{ Route::currentRouteName() }}>
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{url('images/favicon_ecomsail.svg')}}">
    <!-- bootstrap csss -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <link rel="stylesheet" href="{{url('lib/bootstrap-5.1_dist/css/bootstrap.min.css')}}">

    <!-- slick (slider) -->
    <link rel="stylesheet" href="{{url('js/slick/slick.css')}}">
    <link rel="stylesheet" href="{{url('js/slick/slick-theme.css')}}">


    <!--nav top -->
    <link rel="stylesheet" href="{{url('css/nav.css') }}" >
    <link rel="stylesheet" href="{{url('css/nav_user.css')}}" >
    <link rel="stylesheet" href="{{url('css/slider.css') }}" >
    <link rel="stylesheet" href="{{url('css/styles.css')}}" >
    <link rel="stylesheet" href="{{url('css/footer.css')}}" >
    <link rel="stylesheet" href="{{url('css/offers.css')}}" >
    <!-- 
    necesarios estilos de tailwind para paginación de bootstrap, aunque se puede 
    solucionar añadiendo el string 'pagination::bootstrap-4' como parámetro:
    ....->links('pagination::bootstrap-4') 
    -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" integrity="sha512-l7qZAq1JcXdHei6h2z8h8sMe3NbMrmowhOl+QkP3UhifPpCW2MC4M0i26Y8wYpbz1xD9t61MLT9L1N773dzlOA==" crossorigin="anonymous" />
    <!-- CSS librería AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!--<link rel="stylesheet" href="css/main.css" > -->
    <!-- font.awesome -->
    <script src="https://kit.fontawesome.com/8588bc45a2.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- bootstrap js (sustituido a local)-->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script src="{{ url('lib/bootstrap-5.1_dist/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{url('/js/mdslider.js')}}"></script>
    
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
      
    @livewireStyles
    <style>
    [x-cloak] { 
      display: none !important;
   }
   
   /*:root{
        --blue : #FFFFFF;

   }*/
    </style>
</head>
<body>
    @auth
        @if(helper()->testPermission(Auth::user()->permissions,'admin_panel')== true)
        <div class="header">            
            @include('layouts.nav')
        </div>
        @endif
    @endauth
    <div class="btn_floatup" onclick="up()">        
        <i class="fa-solid fa-circle-arrow-up"></i>
    </div>
    @if(session()->has('message') && !session()->has('only_component'))
    <div class="container">
        <div class="alert alert-@isset($typealert){{$typealert}}@else{{'success'}} @endisset hide" >
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
    <!--
    <div x-data = "main()">
        <p x-text="open"></p>
        <button x-on:click="open = !open">CAMBIA</button>
        <p x-show="open">HOLA MUNDO ALPINE</p>
        <p x-bind:class="{ 'active':open}">sdfasdfsdf</p>
        
    </div>
-->
    {{--{{$slot ?? ''}}--}}
    @yield('content')    
    @livewireScripts
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!--<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>-->
    <script src="{{url('/js/slick/slick.min.js')}}"></script>
    <script src="{{url('/js/functions.js')}}"></script>

    <script>

    console.log("arrr")
    function main(){
        return{
            open: true
        }
    }
    function cart(){
        return {
            show2:false,
            show3:false,
            open2(){
                this.show2=true;
            },

            start:function(){
                setTimeout(()=>{                    
                    this.open2();
                    //establecemos aquí la llamada al carousel slick para que funcione correctamente
                    if(route == 'product'){
                        $('.product_slick').slick({
                          dots:true,
                          infinite:true,
                          autoplay:true,
                          autoplaySpeed:4000,
                        });
                        $('.product_slick').slick('init');
                    }
                },100)
            }
        }
    }

    //Inicio de librería AOS
    AOS.init();

/* configuración de carousel en CSS */    
    const r = document.querySelector(':root');
    //obtenemos los datos del slider personalizado del archivo de configuración
    //establecemos valores CSS a Stylus    
    let backPanel = '{{config('ecomsail.background_panel')}}';
    let customHeight = '{{config('ecomsail.slider_height')}}';
    if(backPanel){        
        r.style.setProperty('--backgroundslider',backPanel);
    }
    if(customHeight){
        r.style.setProperty('--minheight',customHeight+'px');    
    }
    
    
    
    /*
    let div_img =  document.querySelector('.slider_auto img');
    let md_slider_item =  document.querySelector('.md-slider-item');
    let text =  document.querySelector('.text');
    window.addEventListener('resize',()=>{
        console.log("height_div_img: ",div_img.clientHeight);
        console.log("height_md_slider_item: ",md_slider_item.clientHeight);
        if(md_slider_item.clientHeight < div_img.clientHeight){
            let resta = (div_img.clientHeight - md_slider_item.clientHeight)/2;
            if(window.innerWidth < 993){
                //text.style.bottom = resta+'px';    
            }
        }
    })
    */
    </script>
</body>

</html>