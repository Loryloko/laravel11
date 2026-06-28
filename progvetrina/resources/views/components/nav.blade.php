<nav class="navbar navbar-dark bg-dark sticky-top">
  <div class="container-fluid row align-items-center m-0 w-100 py-2">
    
    <div class="dropdown col-auto">
      <button class="navbar-toggler" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-list text-white fs-4"></i> 
      </button>
      <ul class="dropdown-menu">
        <li><a href="{{route('home')}}" class="dropdown-item">Home</a></li>
        <li><a href="{{route('menu')}}" class="dropdown-item">Menu</a></li>
        <li><a href="{{route('contacts')}}" class="dropdown-item">Contacts</a></li>
      </ul>
    </div>

    <div class="col d-flex align-items-center justify-content-center">
      <i class="bi bi-disc text-white me-2 fs-4"></i>
      <h3 class="text-white text-center m-0">Nome Pizzeria</h3>
    </div>

    <div class="dropdown col-auto">
      <button class="navbar-toggler" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-person-circle text-white fs-4"></i> 
      </button>
      <ul class="dropdown-menu dropdown-menu-end"> 
        @auth
          <li><h6 class="dropdown-header">Ciao, {{Auth::user()->name}}</h6></li>
          <li><a href="{{route('user.profile')}}" class="dropdown-item">Profilo personale</a></li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('form-logout').submit();" class="dropdown-item text-danger">Logout</a>
            <form action="{{route('logout')}}" method="POST" style="display: none;" id="form-logout"> @csrf </form>
          </li>
        @else
          <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
          <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
        @endauth
      </ul>
    </div>

  </div>
</nav>
