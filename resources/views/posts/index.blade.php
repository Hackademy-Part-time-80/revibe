
<x-layouts.app>
    <div class="container">
        <div class="row py-5 justify-content-center align-items-center text-center">
            <div class="col-12 pt-5">
                <h1 class="display-3 fw-bold">Tutti gli Annunci</h1>
                <p class="text-muted fs-5 mt-2">{{ $posts->total() }} annunci disponibili su ReVibe</p>
            </div>
        </div>
        <div class="row g-4 justify-content-start py-4">
            @forelse ($posts as $post)
                <div class="col-11 col-sm-6 col-md-4 col-lg-3">
                    <x-card :post="$post" />
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <h3 class="text-muted">Non sono ancora stati creati annunci!</h3>
                    @auth
                        <a href="{{ route('post.create') }}" class="btn btn-primary btn-lg my-4">
                            Pubblica un annuncio
                        </a>
                    @endauth
                </div>
            @endforelse
        </div>
        
        <div class="mt-5 mb-5">
            {{ $posts->links('components.pagination') }}
        </div>
    </div>
</x-layouts.app>