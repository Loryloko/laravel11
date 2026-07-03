<x-layout>
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-12 text-center mb-5">
        @if(session()->has('emailSent'))
          <div class="alert alert-success">{{ session('emailSent') }}</div>
        @endif
        @if(session()->has('emailError'))
          <div class="alert alert-danger">{{ session('emailError') }}</div>
        @endif
        @if (session()->has('successMessage'))
          <div class="alert alert-success">{{ session('successMessage') }}</div>
        @endif
        @if (session()->has('errorMessage'))
          <div class="alert alert-danger">{{ session('errorMessage') }}</div>
        @endif

        <h1 class="text-dark fw-bold display-4 mb-4">Benvenuti</h1>
        <p class="lead text-muted mx-auto" style="max-width: 800px;">
          Scopri le nostre specialità preparate ogni giorno con ingredienti freschi e selezionati. Lasciati ispirare dalle nostre pizze del giorno proposte dai membri della nostra community!
        </p>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8">
        
        <div id="homeCarousel" class="carousel slide shadow rounded overflow-hidden" data-bs-ride="carousel">
          <div class="carousel-inner">
            
            @forelse($randomProducts ?? [] as $product)
              <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="height: 400px;">
                
                @if($product->image)
                  <img src="{{ Storage::url($product->image) }}" class="d-block w-100 h-100" alt="{{ $product->name }}" style="object-fit: cover;">
                @else
                  <img src="https://picsum.photos/1200/450" class="d-block w-100 h-100" alt="Immagine di default" style="object-fit: cover;">
                @endif

                <div class="carousel-caption d-flex flex-column justify-content-end h-100 pb-4">
                  <div class="bg-dark bg-opacity-75 rounded p-3 mx-auto" style="max-width: 80%;">
                    <h3 class="fw-bold text-white mb-1">{{ $product->name }}</h3>
                    <p class="small text-light text-truncate mb-2">{{ $product->description ?? 'Scoprila subito nel nostro menu!' }}</p>
                    <span class="badge bg-danger fs-6 px-3 py-2">{{ number_format($product->price, 2) }} €</span>
                  </div>
                </div>

              </div>
            @empty
              <div class="carousel-item active" style="height: 400px;">
                <img src="https://picsum.photos/1200/450" class="d-block w-100 h-100" alt="Nessun prodotto disponibile" style="object-fit: cover;">
                <div class="carousel-caption d-flex flex-column justify-content-end h-100 pb-4">
                  <div class="bg-dark bg-opacity-75 rounded p-3 mx-auto">
                    <h3 class="fw-bold text-white">Nessun prodotto disponibile</h3>
                    <p class="small text-light mb-0">Inizia ad aggiungere le tue pizze dal pannello di controllo.</p>
                  </div>
                </div>
              </div>
            @endforelse

          </div>

          @if(count($randomProducts ?? []) > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Precedente</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Successivo</span>
            </button>
          @endif

        </div>

      </div>
    </div>
  </div>
</x-layout>
