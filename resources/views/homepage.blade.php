<x-layouts.app>
    <div class="container-fluid text-center bg-body-tertiary">
        <div class="row py-5 mt-5 justify-content-center align-items-center">
            <div class="col-12">
                <h1 class="display-3 fw-bold mb-3">ReVibe</h1>
                <p class="lead text-muted">Dai nuova vita ai tuoi articoli preferiti</p>
                <a href="{{ route('post.create') }}"
                    class="btn btn-primary btn-lg rounded-pill px-4 py-2 shadow-sm btn-cta">Crea un nuovo articolo</a>
            </div>
        </div>

        <div class="row justify-content-center py-5 g-4">
            @forelse ($posts as $post)
                <div class="col-12 col-md-6 col-lg-4">
                    <x-card :post="$post" />
                </div>
            @empty
                <div class="col-12 py-5 text-center">
                    <i class="bi bi-inbox display-1 text-muted d-block mb-3"></i>
                    <h3 class="text-muted">Non sono ancora stati creati articoli</h3>
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.app>
