 <x-layouts.app>

     <div class="container-fluid py-3">
         <div class="row justify-content-center">
             <div class="col-12 col-xl-10">

                 {{-- Titolo Dashboard --}}
                 <div class="rounded shadow bg-body-secondary p-4 text-start mb-4">
                     <h1 class="d-inline-block h3 fw-bold mb-0">Dashboard Revisore</h1>
                     <span class="badge bg-primary text-white fs-6 shadow-sm px-3 py-2 rounded-pill ms-2">
                         Da revisionare: <span class="fw-bold">{{ \App\Models\Post::toBeRevisedCount() }}</span>
                     </span>
                 </div>

                 @if (session('message'))
                     <div class="alert alert-success shadow-sm">{{ session('message') }}</div>
                 @endif

                 {{-- Annulla operazione --}}
                 @if (session()->has('last_reviewed_post_id'))
                     <div class="text-muted mb-3" id="undoBox">
                         <form action="{{ route('revisor.undo') }}" method="POST" class="d-inline">
                             @csrf
                             @method('PATCH')
                             <button type="submit" class="btn btn-secondary btn-sm">↩️ Annulla ultima
                                 operazione</button>
                         </form>
                     </div>
                 @endif

                 @if ($postToCheck)
                     {{-- RIGA 1: Immagini e Google Vision (Sincronizzati) --}}
                     <div class="row g-3 mb-4 align-items-stretch">

                         {{-- Colonna Sinistra: Carousel Immagini --}}
                         <div class="col-12 col-md-6">
                             <div class="card shadow-sm border-0 h-100">
                                 <div class="card-body p-3 d-flex align-items-center justify-content-center">
                                     @if ($postToCheck->images->count() > 0)
                                         {{-- Contenitore Flex per affiancare Bottone Sinistro + Carousel + Bottone Destro --}}
                                         <div class="d-flex align-items-center justify-content-between w-100 gap-2">

                                             @if ($postToCheck->images->count() > 1)
                                                 {{-- Bottone PREV staccato dall'immagine --}}
                                                 <button class="btn btn-outline-dark rounded-circle p-2 flex-shrink-0"
                                                     type="button" data-bs-target="#carouselImages, #carouselVision"
                                                     data-bs-slide="prev"
                                                     style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                                     ❮
                                                 </button>
                                             @endif

                                             {{-- Carousel Immagine --}}
                                             <div id="carouselImages"
                                                 class="carousel slide flex-grow-1 ratio ratio-4x3">
                                                 <div class="carousel-inner rounded">
                                                     @foreach ($postToCheck->images as $key => $image)
                                                         <div
                                                             class="carousel-item h-100 {{ $loop->first ? 'active' : '' }}">
                                                             <img src="{{ $image->getUrl(300, 300) }}"
                                                                 class="w-100 h-100 object-fit-contain rounded"
                                                                 alt="Immagine {{ $key + 1 }}">
                                                         </div>
                                                     @endforeach
                                                 </div>
                                             </div>

                                             @if ($postToCheck->images->count() > 1)
                                                 {{-- Bottone NEXT staccato dall'immagine --}}
                                                 <button class="btn btn-outline-dark rounded-circle p-2 flex-shrink-0"
                                                     type="button" data-bs-target="#carouselImages, #carouselVision"
                                                     data-bs-slide="next"
                                                     style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                                     ❯
                                                 </button>
                                             @endif

                                         </div>
                                     @else
                                         <div class="ratio ratio-4x3 w-100">
                                             <img src="https://picsum.photos/800/600?random={{ $postToCheck->id ?? rand(1, 1000) }}"
                                                 class="rounded object-fit-contain" alt="Immagine placeholder">
                                         </div>
                                     @endif
                                 </div>
                             </div>
                         </div>

                         {{-- Colonna Destra: Carousel Dati Google Vision --}}
                         <div class="col-12 col-md-6">
                             <div class="card shadow-sm border-0 h-100 bg-body-secondary">
                                 <div class="card-body p-4 d-flex flex-column justify-content-center">
                                     <h5 class="fw-bold mb-3 text-secondary">Analisi Google Vision</h5>

                                     @if ($postToCheck->images->count() > 0)
                                         <div id="carouselVision" class="carousel slide">
                                             <div class="carousel-inner">
                                                 @foreach ($postToCheck->images as $key => $image)
                                                     <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                         <div class="row g-3">
                                                             {{-- Labels --}}
                                                             <div class="col-12 col-sm-6">
                                                                 <h6 class="fw-bold border-bottom pb-1">Labels</h6>
                                                                 @if ($image->labels)
                                                                     <div class="d-flex flex-wrap gap-1">
                                                                         @foreach ($image->labels as $label)
                                                                             <span
                                                                                 class="badge bg-secondary-subtle text-dark border">{{ $label }}</span>
                                                                         @endforeach
                                                                     </div>
                                                                 @else
                                                                     <p class="fst-italic text-muted">Nessuna label
                                                                         rilevata</p>
                                                                 @endif
                                                             </div>

                                                             {{-- Ratings --}}
                                                             <div class="col-12 col-sm-6">
                                                                 <h6 class="fw-bold border-bottom pb-1">Ratings</h6>
                                                                 <div class="d-flex flex-column gap-1">
                                                                     <div
                                                                         class="d-flex justify-content-between align-items-center">
                                                                         <span>Adult</span>
                                                                         <span
                                                                             class="badge {{ $image->adult }}">●</span>
                                                                     </div>
                                                                     <div
                                                                         class="d-flex justify-content-between align-items-center">
                                                                         <span>Violence</span>
                                                                         <span
                                                                             class="badge {{ $image->violence }}">●</span>
                                                                     </div>
                                                                     <div
                                                                         class="d-flex justify-content-between align-items-center">
                                                                         <span>Spoof</span>
                                                                         <span
                                                                             class="badge {{ $image->spoof }}">●</span>
                                                                     </div>
                                                                     <div
                                                                         class="d-flex justify-content-between align-items-center">
                                                                         <span>Racy</span>
                                                                         <span
                                                                             class="badge {{ $image->racy }}">●</span>
                                                                     </div>
                                                                     <div
                                                                         class="d-flex justify-content-between align-items-center">
                                                                         <span>Medical</span>
                                                                         <span
                                                                             class="badge {{ $image->medical }}">●</span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 @endforeach
                                             </div>
                                         </div>
                                     @else
                                         <p class="fst-italic text-muted mb-0">Nessuna immagine presente da analizzare.
                                         </p>
                                     @endif
                                 </div>
                             </div>
                         </div>

                     </div>

                     {{-- RIGA 2: Dettagli del Post e Pulsanti Azione --}}
                     <div class="row">
                         <div class="col-12">
                             <div class="card shadow-sm border-0 bg-body-secondary p-4">
                                 <div class="row align-items-center g-3">
                                     <div class="col-12 col-md-8">
                                         <h2 class="fw-bold mb-1">{{ $postToCheck->title }}</h2>
                                         <h4 class="text-primary mb-2">{{ $postToCheck->price }} €</h4>
                                         <p class="fst-italic text-muted mb-2">Inserito da:
                                             <strong>{{ $postToCheck->user->name }}</strong>
                                         </p>
                                         <p class="mb-0">{{ $postToCheck->description }}</p>
                                     </div>
                                     <div class="col-12 col-md-4">
                                         <div class="d-flex flex-column flex-sm-row gap-2">
                                             <form action="{{ route('revisor.reject', $postToCheck) }}" method="POST"
                                                 class="w-100">
                                                 @csrf
                                                 @method('PATCH')
                                                 <button
                                                     class="btn btn-outline-danger btn-lg w-100 fw-bold">Rifiuta</button>
                                             </form>
                                             <form action="{{ route('revisor.accept', $postToCheck) }}" method="POST"
                                                 class="w-100">
                                                 @csrf
                                                 @method('PATCH')
                                                 <button class="btn btn-success btn-lg w-100 fw-bold">Accetta</button>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 @else
                     {{-- Nessun articolo --}}
                     <div class="row justify-content-center align-items-center text-center" style="min-height: 50vh;">
                         <div class="col-12">
                             <h1 class="fst-italic display-5 text-muted mb-4">
                                 Nessun articolo da revisionare
                             </h1>
                             <a href="{{ route('homepage') }}"
                                 class="btn btn-success btn-lg rounded-pill px-4 shadow-sm">
                                 Torna all'homepage
                             </a>
                         </div>
                     </div>
                 @endif

             </div>
         </div>
     </div>

 </x-layouts.app>
