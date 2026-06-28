<div class="d-flex flex-nowrap overflow-x-auto gap-4 pb-3" style="scroll-snap-type: x mandatory; -webkit-overflow-scrolling: touch;">
  
  @foreach($category->products as $product)
    <div class="card border-0 shadow-sm flex-shrink-0 product-card" style="width: 19rem; scroll-snap-align: start; transition: transform 0.2s, box-shadow 0.2s;">
      
      <div class="position-relative overflow-hidden" style="height: 200px; border-top-left-radius: var(--bs-card-inner-border-radius); border-top-right-radius: var(--bs-card-inner-border-radius);">
        @if($product->image)
          <img src="{{ Storage::url($product->image) }}" 
               class="w-100 h-100 object-cover" 
               alt="{{ $product->name }}"
               style="object-fit: cover;">
        @else
          <img src="https://picsum.photos/400/300" 
               class="w-100 h-100 object-cover" 
               alt="Immagine di default"
               style="object-fit: cover;">
        @endif
        
        <span class="position-absolute top-0 end-0 bg-danger text-white fw-bold px-3 py-1 m-3 rounded-pill shadow-sm fs-6">
          {{ number_format($product->price, 2) }} €
        </span>
      </div>

      <div class="card-body d-flex flex-column justify-content-between p-4 bg-white">
        <div>
          <h5 class="card-title fw-bold text-dark mb-2 text-truncate" title="{{ $product->name }}">
            {{ $product->name }}
          </h5>
          
          <p class="card-text text-muted small line-clamp-3 mb-3" style="min-height: 3.5rem;">
            {{ $product->description ?? 'Ingredienti di prima scelta selezionati con cura.' }}
          </p>
        </div>

        <div class="pt-3 border-top border-light">
          <span class="text-muted d-block mb-2 fw-bold text-uppercase" style="font-size: 0.65rem; letter-spacing: 0.05em;">Allergeni</span>
          <div class="d-flex flex-wrap gap-1 mb-3">
            @forelse($product->allergens as $allergen)
              <span class="badge bg-warning-subtle text-warning-emphasis border border-warning px-2 py-1 rounded" style="font-size: 0.65rem;">
                <i class="bi bi-exclamation-triangle-fill me-1"></i>{{ $allergen->name }}
              </span>
            @empty
              <span class="text-success small d-flex align-items-center" style="font-size: 0.7rem;">
                <i class="bi bi-check-circle-fill me-1"></i>Nessuno
              </span>
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
