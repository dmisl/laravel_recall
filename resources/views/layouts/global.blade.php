<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
     @vite(['resources/css/global.css'])
     @yield('styles')
</head>
<body class="flex flex-col h-screen">
     
     <header>
          <h1 class="logotype">Laravel Recall</h1>
          <div class="menu">
               @if(Auth::check())
                    <a href="{{ route('logout') }}" class="menu-element">
                         Log out
                    </a>
               @endif
          </div>
     </header>

     <div class="flex-grow">
          @yield('content')
     </div>

</body>
</html>