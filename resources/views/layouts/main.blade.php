<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
    </head>
    <body>
      <header>
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #d1ecf1;">
        <div class="container-fluid">
          <!-- Logotipo -->
          <a href="/" class="navbar-brand mr-auto">
            <h1>Lh</h1>
          </a>

          <!-- Lista de navegação -->
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a href="/" class="nav-link">Cursos</a>
              </li>
              <li class="nav-item">
                <a href="/courses/create" class="nav-link">Criar Cursos</a>
              </li>
              @auth
              <li class="nav-item">
                <a href="/dashboard" class="nav-link">Meus Cursos</a>
              </li>
              <li class="nav-item">
                <form action="/logout" method="POST">
                  @csrf
                  <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                </form>
              </li>
              @endauth
              @guest
              <li class="nav-item">
                <a href="/login" class="nav-link">Entrar</a>
              </li>
              <li class="nav-item">
                <a href="/register" class="nav-link">Cadastrar</a>
              </li>
              @endguest
            </ul>
          </div>
        </div>
      </nav>
      </header>
      <main>
        <div class="container-fluid mb-5">
          <div class="row">
            @if(session('msg'))
              <p class="msg">{{ session('msg') }}</p>
            @endif
            @yield('content')
          </div>
        </div>
      </main>
      <footer class="footer bg-dark text-light text-center py-3 fixed-bottom">
        <p>Learn Hub &copy; 2024</p>
      </footer>

      <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    </body>
</html>
