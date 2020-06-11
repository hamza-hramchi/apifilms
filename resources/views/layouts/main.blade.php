<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>App N Digital | Films</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <livewire:styles>
    <!--/ Styles -->
</head>

<body class="font-sans bg-gray-600 text-white">
  <nav class="bg-gray-900 border-b border-gray-800" id="app">
      <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-2 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="{{route('index')}}">
                        <img class="wt-29" src="{{asset('images/logo.png')}}" alt="">
                    </a>
                </li>

                <li class="md:ml-4 mt-3 md:mt-0">
                    <a href="{{route('index')}}" class="text-white hover:text-gray">Page d'accueil</a>
                </li>
                @auth
                <li class="md:ml-4 mt-3 md:mt-0">
                    <a href="{{route('moncompte',Auth::user()->id)}}" class="text-white hover:text-gray">Mon compte</a>
                </li>
                <li class="md:ml-4 mt-3 md:mt-0">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-white hover:text-gray">
                    {{ __('Déconnexion') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    </form>
                </li>
                @else
                <li class="md:ml-4 mt-3 md:mt-0">
                    <a href="{{route('login')}}" class="text-white hover:text-gray">Se connecter</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                  <a href="{{route('register')}}" class="text-white hover:text-gray">Créer compte</a>
                </li>
                @endauth
            </ul>
            <div class="flex flex-col md:flex-row items-center text-black">
                    <livewire:search-dropdown>
            </div>
        </div>
  </nav>

  @yield('content')



<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <livewire:scripts>
<!--/ Scripts -->

</body>
  <!-- Footer -->
  <footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">©HRAMCHI-Hamza
      <a href="https://www.themoviedb.org/documentation/api" class="text-black"> themoviedb API</a>
    </div>
</footer>
  <!-- Footer -->
</html>