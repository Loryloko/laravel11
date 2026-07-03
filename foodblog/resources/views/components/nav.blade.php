<nav class="navbar navbar-dark bg-dark sticky-top">
  <div class="container-fluid row align-items-center m-0 w-100 py-2">
    
    <div class="dropdown col-auto">
      <button class="navbar-toggler" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-list text-white fs-4"></i> 
      </button>
      <ul class="dropdown-menu">
        <li><a href="{{route('home')}}" class="dropdown-item">Home</a></li>
        <li><a href="{{route('menu')}}" class="dropdown-item">Menu</a></li>
        <li><a href="{{route('contacts')}}" class="dropdown-item">Contatti</a></li>
      </ul>
    </div>

    <div class="col d-flex align-items-center justify-content-center">
      <i class="bi bi-disc text-white me-2 fs-4"></i>
      <h3 class="text-white text-center m-0">Pizzeria Sociale</h3>
    </div>

    <div class="dropdown col-auto">
      <button class="navbar-toggler" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-plus-circle text-white fs-4"></i> 
      </button>
      <ul class="dropdown-menu dropdown-menu-end"> 
        <li><h6 class="dropdown-header">Contribuisci</h6></li>
        <li class="nav-item">
          <a class="dropdown-item" href="{{ route('products.create') }}">Nuovo prodotto</a>
        </li>
        <li class="nav-item">
          <a class="dropdown-item" href="{{ route('allergens.create') }}">Aggiungi allergene</a>
        </li>
      </ul>
    </div>

  </div>
</nav>
