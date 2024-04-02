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
    <!-- Logotipo no início -->
    <div>
      <a href="/" class="navbar-brand">
        <h1 style="text-shadow: 2px 2px 4px #ff7f00;">LearnHub</h1>
      </a>
    </div>

    <!-- Formulário centralizado -->
    <div class="mx-auto">
      <form action="/" method="GET" class="form-inline">
        <div class="input-group">
          <input type="text" id="search" name="search" class="form-control form-control-lg" placeholder="&#xf002; Procurar por curso" style="width: 400px;">
        </div>
      </form>
    </div>



    <!-- Lista de navegação no fim -->
    <div class="nav-item">
      <div class="collapse navbar-collapse nav-item" id="navbar">
        <ul class="navbar-nav ml-auto nav-item">
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
