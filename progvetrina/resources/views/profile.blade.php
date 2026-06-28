<x-layout>
  @if (session()->has('successMessage'))
          <div class="alert alert-success">{{ session('successMessage') }}</div>
        @endif
        @if (session()->has('errorMessage'))
          <div class="alert alert-danger">{{ session('errorMessage') }}</div>
        @endif
  <div class="container-fluid pro1 my-5">
    <div class="row justify-content-center">
      
      <div class="col-12 text-center mb-2">
        <h2 class="ul1 m-0">
          Profilo di {{ Auth::user()->name }}
        </h2>
      </div>

      <div class="col-12 text-center mb-5">
        <a href="{{ route('products.create') }}" class="btn btn-dark px-4 py-2 fw-bold shadow-sm">
          <i class="bi bi-plus-circle-fill me-2"></i>Aggiungi un nuovo prodotto
        </a>
      </div>

      @forelse(Auth::user()->products ?? [] as $product)
        <div class="col-12 col-md-4 mb-3">
          <div class="card shadow-sm h-100">
            <div class="card-body d-flex flex-column justify-content-between">
              
              <div>
                <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                <h6 class="card-subtitle mb-2 text-danger fw-bold">{{ $product->price }} €</h6>
                <p class="card-text text-muted small">{{ $product->description }}</p>
                
                <div class="mt-2">
                  @foreach($product->allergens ?? [] as $allergen)
                    <span class="badge bg-warning text-dark me-1 small">
                      <i class="bi bi-exclamation-triangle-fill me-1"></i>{{ $allergen->name }}
                    </span>
                  @endforeach
                </div>
              </div>

              <div class="mt-3 pt-3 border-top d-flex gap-2">
                @if(Auth::id() === $product->user_id)
                  <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-dark w-50 d-flex align-items-center justify-content-center">
                    <i class="bi bi-pencil-square me-1"></i>Modifica
                  </a>

                  <form action="{{ route('products.destroy', $product) }}" method="POST" class="w-50" onsubmit="return confirm('Sei sicuro di voler eliminare questo articolo?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger w-100 d-flex align-items-center justify-content-center">
                      <i class="bi bi-trash me-1"></i>Elimina
                    </button>
                  </form>
                @endif
              </div>

            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center my-4">
          <p class="text-muted fs-5">Non hai ancora inserito nessun prodotto nel tuo menu.</p>
        </div>
      @endforelse

    </div>
  </div>
</x-layout>