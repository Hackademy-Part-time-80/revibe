<x-layouts.app>

    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded">
            {{ session('errorMessage') }}
        </div>
    @endif

    @if (session()->has('message'))
        <div class="alert alert-success text-center shadow rounded">
            {{ session('message') }}
        </div>
    @endif


    {{-- hero section --}}

    <div class="container text-center text-lg-start">
        <div class="row py-3 my-3 py-lg-5 my-lg-5 justify-content-center align-items-center">
            <div class="col-12 col-lg-6 jumbotron">
                <!-- Contenitore flex per affiancare e centrare i bottoni -->
                <h1 class="display-3 fw-bold mb-3">ReVibe</h1>
                <p class="lead text-muted">Dai nuova vita ai tuoi articoli preferiti</p>
                <a href="{{ route('post.create') }}"
                    class="btn btn-primary btn-lg rounded-pill px-4 py-2 shadow-sm btn-cta">Crea annuncio</a>
            </div>
            <div class="col-12 col-lg-6 jumbotron">
                <!-- contenito immagine -->
                <picture>
                    <img src="" alt="Immagine di revibe">
                </picture>

            </div>
        </div>
    </div>


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
