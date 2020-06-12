<!DOCTYPE html>
<html lang="fr">
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
  <nav class="bg-black border-b border-gray-800" id="app">
      <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-2 py-2">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="{{route('index')}}">
                        <img class="wt-29" src="{{asset('images/logo.png')}}" alt="">
                    </a>
                </li>

                <li class="md:ml-4 mt-3 md:mt-0">
                    <a href="{{route('index')}}" class="text-warning hover:text-gray">
                      <i class="fas fa-home"></i>
                      Page d'accueil
                    </a>
                </li>

                <li class="md:ml-4 ml-3 md:mt-0">
                    <div class="dropdown mt-3">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                          <i class="fas fa-film text-default"></i>
                          Les derniers films critiqués
                        </button>
                        <div class="dropdown-menu" id="latest">
                        </div>
                      </div>
                </li>
                @auth
                <li class="md:ml-4 mt-3 md:mt-0">
                    <a href="{{route('moncompte',Auth::user()->id)}}" class="text-white hover:text-gray">
                      <i class="fas fa-user text-success"></i>
                      Mon compte</a>
                </li>
                <li class="md:ml-4 mt-4 md:mt-0">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-danger">
                      <i class="fas fa-power-off"></i>
                    {{ __('Déconnexion') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="mt-1">
                    @csrf </form>
                </li>
                @else
                <li class="md:ml-4 mt-3 md:mt-0">
                    <a href="{{route('login')}}" class="text-white hover:text-gray">
                      <i class="fas fa-sign-in-alt text-success"></i>
                      Se connecter
                    </a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                  <a href="{{route('register')}}" class="text-white hover:text-gray">
                    <i class="fas fa-user-plus text-info"></i>
                    Créer compte
                  </a>
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
    <div class="footer-copyright text-center py-3">©HRAMCHI-Hamza | Site de référence pour l'API
      <a href="https://www.themoviedb.org/documentation/api" class="text-black"> themoviedb API</a>
    </div>
</footer>
  <!-- Footer -->
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $.ajax({
      url : '/lespluscritiques',
      type : 'GET',
      success : function(data){
        var rows = data.latest;
        var chaine ='';
        if(rows.length == 0){
          chaine = "<p class=dropdown-item> Pas de critiques </p>";
          $("#latest").append(chaine);
        }
        else{
          $.each(rows,function(index,row){
            chaine = "<a class=dropdown-item" + " id = " + row.film_id + " onclick = gotoMovie(" + row.film_id + ")>" + row.film_titre + "</a>";
            $("#latest").append(chaine);
          });
        }
        
      }
    });
  });
</script>