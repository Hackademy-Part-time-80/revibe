 <x-layouts.app>
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="rounded shadow bg-body-secondary p-4 text-center">
                    <h1 class="h3 fw-bold mb-0">Revisore di ReVibe</h1>
                    <p class="text-muted mb-2">Dashboard</p>
                    <span class="badge bg-primary text-white fs-6 shadow-sm px-3 py-2 rounded-pill">
                        Da revisionare: <span class="fw-bold">{{ \App\Models\Post::toBeRevisedCount() }}</span>
                    </span>
                </div>
            </div>
            
            <div class="col-lg-9 col-md-8">
                @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                
                @if (session()->has('last_reviewed_post_id'))
                <div class="text-muted mb-3" id="undoBox">
                    <form action="{{ route('revisor.undo') }}" method="POST" class="d-inline">
                        @csrf
                        @method('PATCH')
                        
                        <button type="submit" class="btn btn-secondary btn-sm">↩️ Annulla ultima operazione</button>
                    </form>
                </div>
                @endif
                
                @if ($postToCheck)
                <div class="row g-4">
                    <div class="col-md-7">
                        <div class="text-center">
                            <img src="https://picsum.photos/800/600?random={{ $postToCheck->id ?? rand(1, 1000) }}" class="img-fluid rounded shadow-sm"
                            alt="Immagine articolo">
                        </div>
                    </div>
                    
                    <div class="col-md-5">
                        <div
                        class="bg-body-secondary rounded shadow p-4 h-100 d-flex flex-column justify-content-between">
                        <div>
                            <h2 class="fw-bold">{{ $postToCheck->title }}</h2>
                            <h4 class="text-primary mb-2">{{ $postToCheck->price }} €</h4>
                            <p class="fst-italic text-muted mb-3">di {{ $postToCheck->user->name }}</p>
                            <p class="mb-4">{{ $postToCheck->description }}</p>
                        </div>
                        <div class="d-flex gap-2">
                            <form action="{{ route('revisor.reject', $postToCheck) }}" method="POST"
                            class="w-100">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-outline-danger w-100 fw-bold">Rifiuta</button>
                        </form>
                        <form action="{{ route('revisor.accept', $postToCheck) }}" method="POST"
                        class="w-100">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success w-100 fw-bold">Accetta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row justify-content-center align-items-center text-center" style="min-height: 60vh;">
        <div class="col-12">
            <h1 class="fst-italic display-4 text-muted mb-4">
                Nessun articolo da revisionare
            </h1>
            <a href="{{ route('homepage') }}" class="btn btn-success btn-lg rounded-pill px-4">
                Torna all'homepage
            </a>
        </div>
    </div>
    @endif
</div>
</div>
</div>


</x-layouts.app>
