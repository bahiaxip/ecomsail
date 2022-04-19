<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- bootstrap csss -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--nav top -->
    <!--<link rel="stylesheet" href="css/nav.css" > 
    <link rel="stylesheet" href="css/main.css" >    -->
    <!-- font.awesome -->
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">    

    <script src="https://kit.fontawesome.com/8588bc45a2.js" crossorigin="anonymous"></script>
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</head>
<body>
    <div class="header">            
        @include('layouts.nav')
    </div>
    <!--
    <div class="back_nav">          
        
    </div>
    <div class="back">      
        <div class="container">
        
        </div>
    </div>
-->
    {{$slot ?? ''}}
    <script>
    console.log("assdf")

    </script>
</body>

</html>