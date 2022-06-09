<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="route_name" content={{ Route::currentRouteName() }}>
    <title>@yield('title')</title>
    <!-- bootstrap csss -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <link rel="stylesheet" href="{{url('lib/bootstrap-5.1_dist/css/bootstrap.min.css')}}">

    <!-- slick (slider) -->
    <link rel="stylesheet" href="{{url('js/slick/slick.css')}}">
    <link rel="stylesheet" href="{{url('js/slick/slick-theme.css')}}">


    <!--nav top -->
    <link rel="stylesheet" href="{{url('css/nav.css') }}" >
    <link rel="stylesheet" href="{{url('css/slider.css') }}" >
    <link rel="stylesheet" href="{{url('css/styles.css')}}" >
    
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
    

    @livewireStyles

</head>
<body>
    <div class="header">            
        @include('layouts.nav')
    </div>
    {{--{{$slot ?? ''}}--}}
    @yield('content')
    @livewireScripts
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="{{url('/js/slick/slick.min.js')}}"></script>
    <script src="{{url('/js/functions.js')}}"></script>

    <script>

    console.log("arrr")
    
    </script>
</body>

</html>