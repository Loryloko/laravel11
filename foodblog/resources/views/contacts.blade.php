<x-layout>
    <div class="container-fluid">
    <div class="row align-items-center justify-content-center text-center my-5">
      <div class="col-auto">
        
        <a href="tel:0123456789" class="text-dark text-decoration-none d-flex align-items-center justify-content-center fs-5">
          <i class="bi bi-telephone fw-bold me-2 text-dark"></i>
          <strong>Telefono: 012 345678</strong>
        </a>
        <a href="tel:0123456789" class="text-dark text-decoration-none d-flex align-items-center justify-content-center fs-5">
          <i class="bi bi-pin-map fw-bold me-2 text-dark"></i>
          <strong>Indirizzo: Via Roma, 12 - Città</strong>
        </a>
        <div class="row h-100 justify-content-center align-items-center">
      <h2 class="display-4 text-center">... scrivici una mail</h2>
    <div class="col-12 col-md-8">
    <form method="post" action="{{route('contactUs')}}">
    @csrf
    <div class="mb-3">
    <label for="user" class="form-label">Inserisci il tuo nome</label>
      <input type="text" name="user" class="form-control" id="user" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
    <label for="email" class="form-label">Inserisci la tua mail</label>
      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
    <label for="message" class="form-label">Inserisci un messaggio</label>
    <textarea name="message" cols="30" rows="10" class="form-control" id="message"></textarea>
    </div>
     <button type="submit" class="btn btn-primary my-5">Submit</button>
    </form>
    </div>
    </div>
</x-layout>