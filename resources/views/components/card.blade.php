@props(['post'])

<div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
    <!-- Sezione Immagine con Badge sovrapposto -->
    <div class="position-relative">
        <img src="https://picsum.photos/500/350?random={{ $post->id ?? rand(1, 1000) }}" class="card-img-top" alt="Immagine articolo" style="height: 250px; object-fit: cover;">
        <a href="{{ route('categoryView', $post->category) }}" class="position-absolute top-0 start-0 text-decoration-none">
            <span class="bg-info text-white px-3 py-1 m-3 rounded-pill small fw-bold shadow-sm d-inline-block hover-opacity" style="opacity: 0.9;">
                {{ $post->category->name ?? 'Categoria' }}
            </span>
        </a>
    </div>
    
    <!-- Corpo della card -->
    <div class="card-body d-flex flex-column p-4">
        <h5 class="card-title fw-bold text-dark mb-1">{{ $post->title }}</h5>
        <div class="mb-3">
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-2 fs-6 shadow-sm">
                € {{ number_format($post->price, 2, ',', '.') }}
            </span>
        </div>
        
        <p class="card-text text-muted mb-4 flex-grow-1" style="font-size: 0.95rem;">
            {{ Str::limit($post->description, 100) }}
        </p>

        <!-- Bottoni in basso -->
        <div class="d-grid gap-2 mt-auto">
            <a href="{{ route('posts.show', $post) }}" class="btn btn-primary rounded-pill py-2 fw-semibold transition-all">
                Scopri i dettagli
            </a>
        </div>
    </div>
</div>
