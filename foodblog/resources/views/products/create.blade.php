<x-layout>

@if ($errors->any())
    <div class="container mt-3">
        <div class="alert alert-danger">
            <h5 class="fw-bold">Attenzione! Ci sono errori nel form:</h5>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow p-4">
          <!-- MODIFICATO: Titolo più in linea con un foodblog di piatti -->
          <h3 class="text-center mb-4 fw-bold text-dark">Condividi un Piatto</h3>

          <div class="position-relative overflow-hidden mb-4" style="height: 200px; border-radius: var(--bs-card-inner-border-radius);">
            <img src="https://picsum.photos/200/300" class="w-100 h-100" alt="Nuovo articolo" style="object-fit: cover;">
          </div>

          <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
              <label for="name" class="form-label fw-bold">Nome del piatto o ricetta</label>
              <!-- MODIFICATO: Placeholder più generici (es. Lasagna, Carbonara...) rispetto a Margherita/Diavola -->
              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Es. Lasagna alla Bolognese, Carbonara..." >
              @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
              <label for="price" class="form-label fw-bold">Prezzo stimato (€)</label>
              <input type="number" step="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="Es. 6.50" >
              @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
              <label for="description" class="form-label fw-bold">Descrizione / Ingredienti base</label>
              <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror" placeholder="Es. Uova, guanciale, pecorino romano, pepe..."></textarea>
              @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
              <label for="category_id" class="form-label fw-bold">Categoria</label>
              <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" >
                  <option value="" selected disabled>Scegli una categoria...</option>
                  @foreach($categories ?? [] as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                  @endforeach
              </select>
              @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
              <label for="image" class="form-label fw-bold">Immagine del piatto</label>
              <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
              <div class="form-text">I formati accettati sono PNG, JPG, JPEG, WEBP.</div>
              @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <label class="form-label fw-bold mb-0">Seleziona Allergeni</label>
                <a href="{{ route('allergens.create') }}" class="btn btn-sm btn-outline-danger py-1 px-2 fw-bold" style="font-size: 0.75rem; border-radius: 6px;">
                  <i class="bi bi-plus-lg me-1"></i> Nuovo
                </a>
              </div>    
              <div class="row">
                @forelse($allergens ?? [] as $allergen)
                  <div class="col-6 col-sm-4 mb-2">
                    <div class="form-check">                      
                      <input class="form-check-input" type="checkbox" name="allergens[]" value="{{ $allergen->id }}" id="allergen-{{ $allergen->id }}"
                        {{ is_array(old('allergens')) && in_array($allergen->id, old('allergens')) ? 'checked' : '' }}>
                      <label class="form-check-label" for="allergen-{{ $allergen->id }}">
                        {{ $allergen->name }}
                      </label>
                    </div>
                  </div>
                @empty
                  <div class="col-12">
                    <p class="text-muted small">Nessun allergene censito nel sistema. Puoi salvare l'articolo senza associazioni.</p>
                  </div>
                @endforelse
              </div>
              @error('allergens') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex gap-2">
              <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">Pubblica nel Menu</button>
              <a href="{{ route('menu') }}" class="btn btn-outline-secondary w-50 py-2">Annulla</a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</x-layout>
