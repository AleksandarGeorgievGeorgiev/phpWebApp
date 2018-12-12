<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LSAPP') }}</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
    <body>    
        @include('inc.navbar')  
        <div class="container">
            @include('inc.messages')            
            @yield('content')           
        </div>    
        
        <script src="../../vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>
        <script> 
                $(document).ready(function(){
                    $("#slide").click(function(){
                        $(".content").hide(2500);
                        $(".editable").show(2500);
                    });
                    $("#back").click(function(){
                        $(".editable").hide(2500);
                        $(".content").show(2500);
                    })                    
                });
        </script> 
        
    </body>
</html>
