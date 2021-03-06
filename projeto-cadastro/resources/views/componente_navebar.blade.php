<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
    <div class="container-fluid">
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a @if($current =="home") class="nav-link active" @else class="nav-link" @endif href="/">Home</a>
          </li>
          <li class="nav-item">
            <a @if($current =="produtos") class="nav-link active" @else class="nav-link" @endif  href="/produtos">Produtos</a>
          </li>
          <li class="nav-item">
            <a @if($current =="categorias") class="nav-link active" @else class="nav-link" @endif  href="/categorias">Categorias</a>
          </li>
        </ul>        
      </div>
    </div>
  </nav>