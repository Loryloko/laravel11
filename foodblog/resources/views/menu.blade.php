<x-layout>
   @if (session()->has('successMessage'))
          <div class="alert alert-success">{{ session('successMessage') }}</div>
        @endif
        @if (session()->has('errorMessage'))
          <div class="alert alert-danger">{{ session('errorMessage') }}</div>
        @endif
  <div class="container my-5">
    
    <div class="row justify-content-center align-items-center mb-5">
      <div class="col-12">
        <h1 class="text-dark text-center fw-bold display-4">Le specialità della community</h1>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-12">

        @forelse($categories ?? [] as $category)
          @if($category->products->count() > 0)
            
            <details class="mb-4 border-0 shadow-sm rounded overflow-hidden bg-white decoration-none">
              
              <summary class="fw-bold fs-4 text-dark py-3 px-4 bg-white d-flex align-items-center justify-content-between cursor-pointer user-select-none list-none" style="outline: none;">
                <div class="d-flex align-items-center">
                  <i class="bi bi-egg-fried me-3 text-danger"></i> {{ $category->name }}
                  <span class="badge bg-secondary ms-3 fs-6 rounded-pill">{{ $category->products->count() }}</span>
                </div>
                <i class="bi bi-chevron-down fs-5 text-muted freccia-stato"></i>
              </summary>

              <div class="position-relative px-2 px-md-4 py-5 bg-light border-top border-light">
                
                <button class="btn btn-dark position-absolute top-50 start-0 translate-middle-y ms-1 ms-md-2 rounded-circle shadow d-flex align-items-center justify-content-center" 
                        style="width: 35px; height: 35px; z-index: 10;" 
                        onclick="scrollMenu('carousel-{{ $category->id }}', 'left')">
                  <i class="bi bi-chevron-left fs-6 fs-md-5 text-white"></i>
                </button>

                <div id="carousel-{{ $category->id }}" class="d-flex flex-nowrap overflow-x-auto gap-3 gap-md-4 pb-3 px-4 w-100" style="scroll-behavior: smooth; scroll-snap-type: x mandatory; -webkit-overflow-scrolling: touch; scrollbar-width: none; -ms-overflow-style: none;">
                  
                  @foreach($category->products as $product)
                    <div class="card border-0 shadow-sm flex-shrink-0 product-card" style="width: calc(100vw - 4.5rem); max-width: 19rem; scroll-snap-align: center; transition: transform 0.2s, box-shadow 0.2s; border-radius: 12px; overflow: hidden; vertical-align: top;">
                      
                      <div class="position-relative overflow-hidden" style="height: 180px;">
                        @if($product->image)
                          <img src="{{ Storage::url($product->image) }}" 
                               class="w-100 h-100" 
                               alt="{{ $product->name }}"
                               style="object-fit: cover;">
                        @else
                          <img src="https://picsum.photos/400/300" 
                               class="w-100 h-100" 
                               alt="Immagine di default"
                               style="object-fit: cover;">
                        @endif

                        <span class="position-absolute top-0 end-0 bg-danger text-white fw-bold px-3 py-1 m-3 rounded-pill shadow-sm">
                          {{ number_format($product->price, 2) }} €
                        </span>
                      </div>

                      <div class="card-body d-flex flex-column justify-content-between p-4 bg-white text-start">
                        <div>
                          <h5 class="card-title fw-bold text-dark mb-2 text-truncate" title="{{ $product->name }}">{{ $product->name }}</h5>
                          <p class="card-text text-muted small text-wrap descrizione-tagliata" style="min-height: 3rem; overflow: hidden; margin-bottom: 1rem;">
                            {{ $product->description ?? 'Ingredienti di prima scelta selezionati con cura dalla nostra community.' }}
                          </p>
                        </div>

                        <div class="pt-3 border-top border-light mb-3">
                          <small class="text-muted d-block mb-1 fw-bold" >ALLERGENI:</small>
                          <div class="d-flex flex-wrap gap-1">
                            @forelse($product->allergens as $allergen)
                              <span class="badge bg-warning text-dark px-2 py-1" style="font-size: 0.65rem; border-radius: 4px;">
                                <i class="bi bi-exclamation-triangle-fill me-1"></i>{{ $allergen->name }}
                              </span>
                            @empty
                              <span class="text-success small" style="font-size: 0.7rem;"><i class="bi bi-check-circle-fill me-1"></i>Nessuno</span>
                            @endforelse
                          </div>
                        </div>

                        <div class="pt-3 border-top border-light">
                          <a href="{{ route('products.show', $product) }}" class="btn btn-outline-dark btn-sm w-100 py-2 fw-bold rounded d-flex align-items-center justify-content-center gap-2">
                            <i class="bi bi-eye-fill"></i> Vedi Dettaglio
                          </a>
                        </div>

                      </div>
                    </div>
                  @endforeach

                </div>

                <button class="btn btn-dark position-absolute top-50 end-0 translate-middle-y me-1 me-md-2 rounded-circle shadow d-flex align-items-center justify-content-center" 
                  style="width: 35px; height: 35px; z-index: 10;" 
                  onclick="scrollMenu('carousel-{{ $category->id }}', 'right')">
                  <i class="bi bi-chevron-right fs-6 fs-md-5 text-white"></i>
                </button>

              </div>
            </details>

          @endif
        @empty
          <div class="text-center py-5">
            <i class="bi bi-journal-x display-1 text-muted"></i>
            <h3 class="text-muted mt-3">Il menu è momentaneamente vuoto</h3>
          </div>
        @endforelse

      </div>
    </div>
  </div>
</x-layout>
