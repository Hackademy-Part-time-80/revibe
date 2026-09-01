@use('App\Models\Post')

<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('homepage') }}">
            <img src="{{ Vite::asset('resources/images/revibe-logo.svg') }}" alt="ReVibe" height="36">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Link centrali -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}">Annunci</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post.create') }}">Crea Annuncio</a>
                </li>

                {{-- Dropdown categorie --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Categorie Prodotti
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item" href="{{ route('categoryView', ['category' => $category]) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>

            <!-- Area Utente -->
            <div class="d-flex align-items-center gap-2">
                {{-- Cosa vedono gli ospiti (non loggati) --}}
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill px-4">Accedi</a>
                    <a href="{{ route('register') }}" class="btn btn-primary rounded-pill px-4">Registrati</a>
                @endguest

                {{-- Cosa vede l'utente loggato --}}
                <div class="d-flex align-items-center gap-3">
                    @auth
                        @if (Auth::user()->isRevisor)
                            <a href="{{ route('revisor.index') }}" class="btn btn-primary position-relative">
                                Revisiona
                                @if (Post::toBeRevisedCount() > 0 && Post::toBeRevisedCount() < 100)
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ Post::toBeRevisedCount() }}
                                    </span>
                                @elseif (Post::toBeRevisedCount() >= 100)
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        99+
                                    </span>
                                @endif
                            </a>
                        @endif

                        <button class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center"
                            type="button" style="width: 40px; height: 40px;" data-bs-toggle="offcanvas"
                            data-bs-target="#searchOffcanvas" aria-controls="searchOffcanvas"
                            aria-label="Cerca o filtra annunci" title="Cerca / Filtra">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </button>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle d-flex align-items-center rounded-pill px-3 border"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-2 fs-5 text-primary"></i>
                            <span class="fw-semibold">{{ Auth::user()->name }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
                            <li>
                                <!-- Il logout in Laravel deve essere fatto tramite un form (POST) per sicurezza -->
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger d-flex align-items-center">
                                        <i class="bi bi-box-arrow-right me-2"></i> Esci
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Pannello Offcanvas che compare da destra -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="searchOffcanvas" aria-labelledby="searchOffcanvasLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="searchOffcanvasLabel">Ricerca Avanzata</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('posts.search') }}" method="GET">
            <!-- Campo Testo -->
            <div class="mb-4">
                <label for="searchInput" class="form-label fw-bold">Cosa stai cercando?</label>
                <input type="search" class="form-control" id="searchInput" name="query"
                    placeholder="Es. programmatore, divano..." value="{{ request('query') }}">
            </div>

            <!-- Bottone Submit -->
            <button type="submit" class="btn btn-success w-100">Mostra Risultati</button>
        </form>
    </div>
</div>
