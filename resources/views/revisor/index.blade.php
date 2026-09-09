 <x-layouts.app>
     <div class="container-fluid">
         <div class="row m-3">

             <div class="rounded shadow bg-body-secondary p-4 text-start">
                 <h1 class="d-inline-block h3 fw-bold mb-0 ">Dashboard Revisore</h1>
                 <span class="badge bg-primary text-white fs-6 shadow-sm px-3 py-2 rounded-pill">
                     Da revisionare: <span class="fw-bold">{{ \App\Models\Post::toBeRevisedCount() }}</span>
                 </span>

             </div>

             <div class="col-md-12">
                 @if (session('message'))
                     <div class="alert alert-success">{{ session('message') }}</div>
                 @endif

                 {{-- Bottone annulla ultima revisione --}}
                 @if (session()->has('last_reviewed_post_id'))
                     <div class="text-muted m-3" id="undoBox">
                         <form action="{{ route('revisor.undo') }}" method="POST" class="d-inline">
                             @csrf
                             @method('PATCH')

                             <button type="submit" class="btn btn-secondary btn-sm">↩️ Annulla ultima
                                 operazione</button>
                         </form>
                     </div>
                 @endif

                 {{-- Post da revisionare --}}
                 @if ($postToCheck)
                     <div class="d-flex justify-content-between">
                         <div class="row m-3">
                             <div class="col-12 col-sm-6 my-3">
                                 <div class="text-center">
                                     {{-- Immagini --}}
                                     @if ($postToCheck->images->count() > 1)
                                         <div id="carouselExampleRevisor" class="carousel slide"
                                             data-bs-ride="carousel">
                                             <div class="carousel-inner shadow-sm rounded">
                                                 @foreach ($postToCheck->images as $key => $image)
                                                     <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                         <img src="{{ $image->getUrl(300, 300) }}"
                                                             class="d-block w-100 img-fluid rounded"
                                                             alt="Immagine articolo">
                                                     </div>
                                                 @endforeach
                                             </div>
                                             <button class="carousel-control-prev" type="button"
                                                 data-bs-target="#carouselExampleRevisor" data-bs-slide="prev">
                                                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                 <span class="visually-hidden">Previous</span>
                                             </button>
                                             <button class="carousel-control-next" type="button"
                                                 data-bs-target="#carouselExampleRevisor" data-bs-slide="next">
                                                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                 <span class="visually-hidden">Next</span>
                                             </button>
                                         </div>
                                     @elseif ($postToCheck->images->count() == 1)
                                         <img src="{{ Storage::url($postToCheck->images->first()->path) }}"
                                             class="img-fluid rounded shadow-sm md-auto mb-2" alt="Immagine articolo">
                                     @else
                                         <img src="https://picsum.photos/800/600?random={{ $postToCheck->id ?? rand(1, 1000) }}"
                                             class="img-fluid rounded shadow-sm md-auto" alt="Immagine articolo">
                                     @endif
                                 </div>
                             </div>


                             {{-- verifica tramite Google vision --}}
                             {{-- @foreach ($postToCheck->images as $key => $image)
                                 <div class="col-6">
                                     <div class="card mb-3">
                                         <div class="row g-0">
                                             <div class="col-md-4">
                                                 <img src="{{ $image->getUrl(300, 300) }}"
                                                     class="img-fluid rounded-start"
                                                     alt="immagine {{ $key + 1 }} dell'articolo {{ $postToCheck->title }}">
                                             </div>
                                             <div class="col-md-5 ps-3">
                                                 <h5>Labels</h5>
                                                 @if ($image->labels)
                                                     @foreach ($iamge->labels as $label)
                                                         #{{ $labels }}
                                                     @endforeach
                                                 @else
                                                     <p class="fst-italic">No labels</p>
                                                 @endif
                                             </div>
                                             <div class="col-md-3">
                                                 <div class="card-body">
                                                     <h5>Ratings</h5>
                                                     <div class="row justify-content-center">
                                                         <div class="col-2">
                                                             <div class="text-center mx-auto {{ $image->adult }}">
                                                             </div>
                                                         </div>
                                                         <div class="col-10">adult</div>
                                                     </div>
                                                     <div class="row justify-content-center">
                                                         <div class="col-2">
                                                             <div class="text-center mx-auto {{ $image->violence }}">
                                                             </div>
                                                         </div>
                                                         <div class="col-10">violence</div>
                                                     </div>
                                                     <div class="row justify-content-center">
                                                         <div class="col-2">
                                                             <div class="text-center mx-auto {{ $image->spoof }}">
                                                             </div>
                                                         </div>
                                                         <div class="col-10">spoof</div>
                                                     </div>
                                                     <div class="row justify-content-center">
                                                         <div class="col-2">
                                                             <div class="text-center mx-auto {{ $image->racy }}">
                                                             </div>
                                                         </div>
                                                         <div class="col-10">racy</div>
                                                     </div>
                                                     <div class="row justify-content-center">
                                                         <div class="col-2">
                                                             <div class="text-center mx-auto {{ $image->medical }}">
                                                             </div>
                                                         </div>
                                                         <div class="col-10">medical</div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             @endforeach --}}

                             {{-- Contenuto --}}
                             <div class="col-12 col-sm-6">
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
