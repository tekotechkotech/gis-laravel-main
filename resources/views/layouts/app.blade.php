<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Laravel-GIS' }}</title>

        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" >
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
        <link rel="stylesheet" href="/style.css">

    </head>
    <body>
        <div class="sticky-top">

            @include('layouts.navbar')
            @auth
            @include('layouts.header')
            @endauth
        </div>
        <div class=""
        @if (Route::is('maps') || Route::is('maps.detail'))
        id='map'
        @endif style="height:100vh">

            <div class="container">
                {{ $slot }}
            </div>
            
        </div>

        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" ></script>

        <!-- Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

        @stack('scripts')
    </body>
</html>
