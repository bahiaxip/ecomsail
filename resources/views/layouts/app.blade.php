<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- bootstrap csss -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--nav top -->
    <!--<link rel="stylesheet" href="css/nav.css" > 
    <link rel="stylesheet" href="css/main.css" >    -->
    <!-- font.awesome -->
    
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">    
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <script src="https://kit.fontawesome.com/8588bc45a2.js" crossorigin="anonymous"></script>
    
    
    <!-- bootstrap.bundle para dropdown menu de bootstrap -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @livewireStyles
</head>
<body>
    <div class="header">            
        @include('layouts.nav')
    </div>
    @if(Route::is(['users','categories']))
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
                {{$slot ?? ''}}
            </div>
        </div>
    </div>
    @else   
    {{$slot ?? ''}}
    @endif
    @livewireScripts
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{url('js/functions.js')}}"></script>
    <script>
    
    
        

    </script>
</body>

</html>