@foreach ($postToCheck->images as $key => $image)
    <div class="col-6">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid rounded-start"
                        alt="immagine {{ $key + 1 }} dell'articolo {{ $postToCheck->title }}">
                </div>
                <div class="col-md-8 ps-3">
                    <div class="card-body">
                        <h5>Ratings</h5>
                        <div class="row justify-content-center">
                            <div class="col-2">
                                <div class="text-center mx-auto {{ $image->adult }}"></div>
                            </div>
                            <div class="col-10">adult</div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-2">
                                <div class="text-center mx-auto {{ $image->violence }}"></div>
                            </div>
                            <div class="col-10">violence</div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-2">
                                <div class="text-center mx-auto {{ $image->spoof }}"></div>
                            </div>
                            <div class="col-10">spoof</div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-2">
                                <div class="text-center mx-auto {{ $image->racy }}"></div>
                            </div>
                            <div class="col-10">racy</div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-2">
                                <div class="text-center mx-auto {{ $image->medical }}"></div>
                            </div>
                            <div class="col-10">medical</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
