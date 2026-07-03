<x-layout>
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow p-4 border-0" style="border-radius: 12px;">
          
          <h3 class="text-center mb-4 fw-bold text-dark">
            <i class="bi bi-tag-fill text-warning me-2"></i>Crea Nuovo Allergene
          </h3>

          <form action="{{ route('allergens.store') }}" method="POST">
            @csrf

            <div class="mb-4">
              <label Appended for="name" class="form-label fw-bold">Nome dell'Allergene </label>
              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Es. Crostacei, Sedano, Senape..." >
              @error('name') 
                <div class="invalid-feedback">{{ $message }}</div> 
              @enderror
            </div>

            <div class="d-flex gap-2">
              <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">Salva Allergene</button>
              <a href="{{ route('products.create') }}" class="btn btn-outline-secondary w-50 py-2">Annulla</a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</x-layout>
