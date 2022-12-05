<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title ?? 'А где тайтл?' }}</title>                
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>
    <body class="overflow-hidden">
      <div class="row" style="height: 100vh;">          
          <div class="col-2 bg-secondary">
            @include('layouts.navigation')            
          </div>            
          <main class="col-10 bg-light">              
              {{ $slot }}
          </main>                       
      </div>         
    </body>
</html>
