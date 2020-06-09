<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>App N Digital | Films</title>
</head>
<body class="font-sans bg-gray-700 text-white">
  <nav class="border-b border-gray-800" id="app">
      <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
          <ul class="flex flex-col md:flex-row items-center">
              <li>
                  <a href="">
                      <img class="wt-32" src="{{asset('images/logo.png')}}" alt="">
                  </a>
              </li>
              <li class="md:ml-4 mt-3 md:mt-0">
                  <a href="" class="text-white hover:text-gray">Se connecter</a>
              </li>
              <li class="md:ml-6 mt-3 md:mt-0">
                  <a href="" class="text-white hover:text-gray">Créer compte</a>
              </li>
          </ul>
          <div class="flex flex-col md:flex-row items-center">
            <!--  <livewire:search-dropdown> -->
          </div>
      </div>
  </nav>
  @yield('content')

</body>
</html>