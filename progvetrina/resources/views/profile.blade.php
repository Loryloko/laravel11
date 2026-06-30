<x-layout>
  <div class="container my-5">
    
    <h2 class="fw-bold mb-4">Profilo di {{ Auth::user()->name }}</h2>

    <!-- Messaggi di successo/errore coordinati con l'AuthController -->
    @if (session()->has('successMessage'))
      <div class="alert alert-success">{{ session('successMessage') }}</div>
    @endif

    <div class="card shadow p-4 border-0 bg-white">
      <h4 class="fw-bold mb-3 text-secondary">I miei articoli inseriti nel Menu</h4>
      
      @if($myProducts->isEmpty())
        <p class="text-muted">Non hai ancora inserito nessun articolo <a href="{{ route('products.create') }}">Inserisci la tua prima specialità!</a></p>
      @else
        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead class="table-dark">
              <tr>
                <th>Immagine</th>
                <th>Nome</th>
                <th>Prezzo</th>
                <th>Categoria</th>
                <th class="text-end">Azioni</th>
              </tr>
            </thead>
            <tbody>
              @foreach($myProducts as $product)
                <tr>
                  <td>
                    @if($product->image)
                      <img src="{{ Storage::url($product->image) }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                    @else
                      <img src="https://picsum.photos/50/50" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                    @endif
                  </td>
                  <td class="fw-bold">{{ $product->name }}</td>
                  <td>{{ number_format($product->price, 2) }} €</td>
                  <td><span class="badge bg-secondary">{{ $product->category->name ?? 'Nessuna' }}</span></td>
                  <td class="text-end">
                    <div class="d-flex justify-content-end gap-2">
                      <!-- Tasto Vedi Dettaglio -->
                      <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-dark"><i class="bi bi-eye"></i></a>
                      
                      <!-- Tasto Modifica -->
                      <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                      
                      <!-- Form per Eliminare -->
                      <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Vuoi davvero eliminare questo articolo?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>

  </div>
</x-layout>
