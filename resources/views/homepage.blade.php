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
    <style>
        @keyframes fade-in-left {
            0% { opacity: 0; transform: translateX(-50px); }
            100% { opacity: 1; transform: translateX(0); }
        }
        @keyframes fade-in-right {
            0% { opacity: 0; transform: translateX(50px); }
            100% { opacity: 1; transform: translateX(0); }
        }
        .animate-fade-left {
            opacity: 0;
            animation: fade-in-left 0.8s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }
        .animate-fade-right {
            opacity: 0;
            animation: fade-in-right 0.8s cubic-bezier(0.22, 1, 0.36, 1) forwards;
            animation-delay: 0.2s;
        }
    </style>

    <div class="container-fluid mb-5" style="background: linear-gradient(90deg, #ffffff 25%, var(--bs-primary) 120%); overflow-x: hidden;">
        <div class="container text-center text-lg-start">
            <div class="row py-3 py-lg-5 justify-content-center align-items-center">
                <div class="col-12 col-lg-6 jumbotron py-4 animate-fade-left">
                    <!-- Contenitore flex per affiancare e centrare i bottoni -->
                    <h1 class="display-3 fw-bold mb-3 text-dark">Re<span class="text-primary">Vibe</span></h1>
                    <p class="lead text-dark">Dai nuova vita ai tuoi articoli preferiti</p>
                    <a href="{{ route('post.create') }}"
                        class="btn btn-dark btn-lg rounded-pill px-4 py-2 shadow-sm btn-cta">Crea annuncio</a>
                </div>
                <div class="col-12 col-lg-6 jumbotron py-4 animate-fade-right">
                    <picture>
                        <img src="https://images.unsplash.com/photo-1555529771-835f59fc5efe?auto=format&fit=crop&w=1000&q=80"
                            class="img-fluid rounded shadow-lg"
                            style="max-height: 400px; width: 100%; object-fit: cover; object-position: center;"
                            alt="Negozio e-commerce ReVibe">
                    </picture>
                </div>
            </div>
        </div>
    </div>


    <div class="container py-5">
        <div class="row justify-content-center justify-content-md-start g-4">
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
