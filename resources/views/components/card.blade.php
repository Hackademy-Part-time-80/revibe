@props(['post'])

<div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
    <!-- Sezione Immagine con Badge sovrapposto -->
    <div class="position-relative">
        <img src="https://picsum.photos/500/350?random={{ $post->id ?? rand(1, 1000) }}" class="card-img-top" alt="Immagine articolo" style="height: 250px; object-fit: cover;">
        <span class="position-absolute top-0 start-0 bg-info text-white px-3 py-1 m-3 rounded-pill small fw-bold shadow-sm" style="opacity: 0.9;">
            {{ $post->category->name ?? 'Categoria' }}
        </span>
    </div>
    
    <!-- Corpo della card -->
    <div class="card-body d-flex flex-column p-4">
        <h5 class="card-title fw-bold text-dark mb-1">{{ $post->title }}</h5>
        <h6 class="fs-5 text-primary fw-bold mb-3">€ {{ number_format($post->price, 2, ',', '.') }}</h6>
        
        <p class="card-text text-muted mb-4 flex-grow-1" style="font-size: 0.95rem;">
            {{ Str::limit($post->description, 100) }}
        </p>

        <!-- Bottoni in basso -->
        <div class="d-grid gap-2 mt-auto">
            <a href="#" class="btn btn-dark rounded-pill py-2 fw-semibold transition-all">
                Scopri i dettagli
            </a>
        </div>
    </div>
</div>
