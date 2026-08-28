<x-layouts.app>
    <div class="container py-5 mt-5">        
        <div class="row align-items-center">
            <!-- Immagine Prodotto -->
            <div class="col-md-6 mb-4 mb-md-0 text-center">
                <img src="https://picsum.photos/800/600?random={{ $post->id ?? rand(1, 1000) }}" class="img-fluid rounded shadow-sm" alt="Immagine articolo">
            </div>

            <!-- Dettagli Prodotto -->
            <div class="col-md-6">
                <div class="d-flex align-items-center mb-2">
                    <a href="{{ route('categoryView', $post->category) }}" class="text-decoration-none">
                        <span class="badge bg-info text-white px-3 py-2 rounded-pill fw-bold shadow-sm">
                            {{ $post->category->name ?? 'Categoria' }}
                        </span>
                    </a>
                </div>
                
                <h1 class="display-5 fw-bold text-dark mb-3">{{ $post->title }}</h1>
                <div class="mb-4">
                    <span class="badge bg-primary text-white rounded-3 px-4 py-2 fs-4 shadow-sm">
                        € {{ number_format($post->price, 2, ',', '.') }}
                    </span>
                </div>
                
                <div class="mb-4">
                    <p class="text-muted small mb-3 border-bottom pb-3">
                        <i class="bi bi-person-circle me-1"></i> Pubblicato da <strong>{{ $post->user->name ?? 'Utente sconosciuto' }}</strong> 
                        <span class="mx-2">|</span>
                        <i class="bi bi-calendar-event me-1"></i>
                        <span class="local-time" data-timestamp="{{ $post->created_at->toISOString() }}">
                            {{ $post->created_at->format('d/m/Y \a\l\l\e H:i') }}
                        </span>
                    </p>

                    <h5 class="fw-bold mb-2">Descrizione:</h5>
                    <p class="text-muted" style="line-height: 1.6; font-size: 1.1rem;">
                        {{ $post->description }}
                    </p>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="{{ route('index') }}" class="btn btn-outline-secondary btn-lg px-4 rounded-pill fw-semibold">
                        Torna agli Annunci
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>