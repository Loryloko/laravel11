<x-layout>
  <div class="container my-5">
    
    <div class="row mb-4">
      <div class="col-12 col-md-8 offset-md-2">
        <a href="{{ route('menu') }}" class="btn btn-outline-dark d-inline-flex align-items-center gap-2 fw-bold px-3 py-2 rounded shadow-sm">
          <i class="bi bi-arrow-left"></i> Torna al Menu
        </a>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-12 col-md-8">
        <div class="card border-0 shadow p-0 bg-white" style="border-radius: 16px; overflow: hidden;">
          <div class="position-relative" style="height: 350px;">
            @if($product->image)
              <img src="{{ Storage::url($product->image) }}" 
                   class="w-100 h-100" 
                   alt="{{ $product->name }}"
                   style="object-fit: cover;">
            @else
              <img src="https://picsum.photos/800/500" 
                   class="w-100 h-100" 
                   alt="Immagine di default"
                   style="object-fit: cover;">
            @endif
            
            <span class="position-absolute bottom-0 end-0 bg-danger text-white fw-bold fs-4 px-4 py-2 m-4 rounded-pill shadow">
              {{ number_format($product->price, 2) }} €
            </span>
          </div>

          <div class="card-body p-4 p-md-5 text-start">
            
            <span class="badge bg-secondary text-uppercase mb-2 px-3 py-2" style="font-size: 0.75rem; letter-spacing: 0.05em; border-radius: 6px;">
              <i class="bi bi-tag-fill me-1"></i> {{ $product->category->name ?? 'Senza Categoria' }}
            </span>

            <h1 class="text-dark fw-bold display-5 mb-3">{{ $product->name }}</h1>

            <div class="mb-4">
              <h5 class="fw-bold text-muted text-uppercase mb-2" style="font-size: 0.85rem; letter-spacing: 0.05em;">Descrizione & Ingredienti:</h5>
              <p class="text-dark fs-5 lh-base">
                {{ $product->description ?? 'Ingredienti di prima scelta selezionati con cura dal nostro pizzaiolo per garantirti un sapore autentico.' }}
              </p>
            </div>

            <div class="pt-4 border-top border-light">
              <h5 class="fw-bold text-muted text-uppercase mb-3" style="font-size: 0.85rem; letter-spacing: 0.05em;">Presenza Allergeni:</h5>
              <div class="d-flex flex-wrap gap-2">
                @forelse($product->allergens as $allergen)
                  <span class="badge bg-warning-subtle text-warning-emphasis border border-warning px-3 py-2 rounded fs-6 fw-semibold d-inline-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ $allergen->name }}
                  </span>
                @empty
                  <div class="alert alert-success d-flex align-items-center w-100 mb-0 py-2 px-3 border-0 rounded" style="font-size: 0.95rem;">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i> 
                    <span>Nessun allergene o rischio di contaminazione rilevato per questo piatto.</span>
                  </div>
                @endforelse
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</x-layout>
