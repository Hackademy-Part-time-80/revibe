<x-layouts.app>
    <div class="container-fluid text-center bg-body-tertiary">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-12">
                <h1 class="display-3 fw-bold mb-3">ReVibe</h1>
                <p class="lead text-muted">Dai nuova vita ai tuoi articoli preferiti</p>
                <button class="btn btn-primary btn-lg rounded-pill px-4 py-2 shadow-sm btn-cta">
                    <i class="bi bi-plus-lg me-2"></i>Crea il tuo Annuncio
                </button>
            </div>

        </div>

        <div class="row justify-content-center py-5 g-4">
            {{-- @forelse ($articles as $article) --}}
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                {{-- <x-card :article="$article" class="h-100 shadow-sm border-0 rounded-4 hover-lift" /> --}}
            </div>
            {{-- @empty --}}
            <div class="col-12 py-5">
                <i class="bi bi-inbox display-1 text-muted d-block mb-3"></i>
                <h3 class="text-muted">Non sono ancora stati creati articoli</h3>
            </div>
            {{-- @endforelse --}}
        </div>
    </div>
</x-layouts.app>
