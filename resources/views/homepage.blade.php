<x-layouts.app>

    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded">
            {{ session('errorMessage') }}
        </div>
    @endif

    <div class="container-fluid text-center bg-body-tertiary">
        <a href="{{ route('revisor.index') }}" class="btn btn-primary">Sei revisore?</a>

        <div class="row py-5 mt-5 justify-content-center align-items-center">
            <div class="col-12">
                <!-- Contenitore flex per affiancare e centrare i bottoni -->
                <div class="d-flex justify-content-center gap-3 mt-4">


                    <!-- Il nuovo bottone per aprire l'Offcanvas -->
                    <button class="btn btn-outline-primary btn-lg rounded-pill px-4 py-2 shadow-sm" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#searchOffcanvas" aria-controls="searchOffcanvas">
                        Cerca / Filtra
                    </button>

                </div>
                <h1 class="display-3 fw-bold mb-3">ReVibe</h1>
                <p class="lead text-muted">Dai nuova vita ai tuoi articoli preferiti</p>
                <a href="{{ route('post.create') }}"
                    class="btn btn-primary btn-lg rounded-pill px-4 py-2 shadow-sm btn-cta">Crea un nuovo articolo</a>
            </div>
        </div>
    </div>

    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded w-50">
            {{ session('errorMessage') }}
        </div>
    @endif

    <div class="container py-5">
        <div class="row justify-content-start g-4">
            @forelse ($posts as $post)
                <div class="col-11 col-sm-6 col-md-4 col-lg-3">
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
