<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Aplicação</title>
    <!-- Inclua o Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="min-height: 100vh; position: relative;">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Super 8</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('clients.index') }}">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('movies.index') }}">Filmes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="{{ route('rentals.index') }}">Aluguéis</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container mt-4" style="flex: 1;">
        @yield('content')
    </div>

    <footer class="footer py-3 bg-light" style="position: absolute; bottom: 0; width: 100%;">
        <div class="container">
            <span class="text-muted">© {{ date('Y') }} Minha Aplicação. Todos os direitos reservados.</span>
        </div>
    </footer>

    <!-- Inclua o Bootstrap JS (opcional, apenas se precisar de componentes interativos do Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
