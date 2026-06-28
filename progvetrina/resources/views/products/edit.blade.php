<x-layout>
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow p-4">
          <h3 class="text-center mb-4 fw-bold">Modifica Prodotto: {{ $product->name }}</h3>

          <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="name" class="form-label fw-bold">Nome prodotto</label>
              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" required>
              @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
              <label for="price" class="form-label fw-bold">Prezzo (€)</label>
              <input type="number" step="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" required>
              @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
              <label for="category_id" class="form-label fw-bold">Categoria</label>
              <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                  </option>
                @endforeach
              </select>
              @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
              <label for="description" class="form-label fw-bold">Descrizione</label>
              <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $product->description) }}</textarea>
              @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
              <label for="image" class="form-label fw-bold">Modifica Immagine (Opzionale)</label>
              <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
              <div class="form-text">Lascia vuoto questo campo se vuoi mantenere l'immagine attuale.</div>
              @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
              <label class="form-label fw-bold d-block">Modifica Allergeni</label>
              <div class="row">
                @foreach($allergens as $allergen)
                  <div class="col-6 col-sm-4 mb-2">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="allergens[]" value="{{ $allergen->id }}" id="allergen-{{ $allergen->id }}"
                        {{ in_array($allergen->id, old('allergens', $product->allergens->pluck('id')->toArray())) ? 'checked' : '' }}>
                      <label class="form-check-label" for="allergen-{{ $allergen->id }}">
                        {{ $allergen->name }}
                      </label>
                    </div>
                  </div>
                @endforeach
              </div>
              @error('allergens') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex gap-2">
              <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">Salva Modifiche</button>
              <a href="{{ route('user.profile') }}" class="btn btn-outline-secondary w-50 py-2">Annulla</a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</x-layout>
