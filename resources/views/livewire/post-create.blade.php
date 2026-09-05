<form class="container bg-body-tertiary shadow rounded p-5 my-5" wire:submit="postStore">
    <h2 class="text-center fw-bold mb-4">Crea il tuo annuncio</h2>

    <div class="mb-3" x-data="{ count: 0 }" x-init="count = $refs.titleInput.value.length">
        <div class="d-flex justify-content-between align-items-end">
            <label for="title" class="form-label">Titolo</label>
            <small class="text-muted"><span x-text="count"></span>/255 caratteri</small>
        </div>
        <input type="text" x-ref="titleInput" x-on:input="count = $event.target.value.length"
            class="form-control @error('title') is-invalid @enderror" id="title" wire:model="title"
            placeholder="Es. Divano in pelle usato" required minlength="3" maxlength="255">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3" x-data="{ count: 0 }" x-init="count = $refs.descInput.value.length">
        <div class="d-flex justify-content-between align-items-end">
            <label for="description" class="form-label">Descrizione</label>
            <small class="text-muted"><span x-text="count"></span>/255 caratteri</small>
        </div>
        <textarea x-ref="descInput" x-on:input="count = $event.target.value.length"
            class="form-control @error('description') is-invalid @enderror" id="description" rows="6"
            wire:model.blur="description" placeholder="Descrivi il tuo articolo..." required minlength="10" maxlength="255"></textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" step="0.01" min="0.1"
                class="form-control @error('price') is-invalid @enderror" id="price" wire:model.blur="price"
                placeholder="0.00" required>
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="category" class="form-label">Categoria</label>
            <select id="category" wire:model.blur="category_id"
                class="form-select @error('category_id') is-invalid @enderror" required>
                <option value="" selected disabled>Seleziona una Categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Inserimento delle immagini -->
    <!-- Inserimento delle immagini -->
    <div class="mb-3">
        <label for="temporary_images" class="form-label">Immagini</label>
        <input type="file" id="temporary_images" wire:model="temporary_images" multiple
            class="form-control shadow @error('temporary_images.*') is-invalid @enderror">
        @error('temporary_images.*')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        @error('temporary_images')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    @if (!empty($images))
        <div class="row">
            <div class="col-12">
                <p class="fw-bold">Immagini caricate:</p>
                <div class="row border border-4 border-success rounded shadow py-4">
                    @foreach ($images as $key => $image)
                        <div class="col d-flex flex-column align-items-center my-3">
                            <div class="img-preview mx-auto shadow rounded"
                                style="background-image: url({{ $image->temporaryUrl() }});"></div>
                            <button type="button" class="btn mt-1 btn-danger"
                                wire:click="removeImage({{ $key }})">X</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="d-flex justify-content-center mt-4">
        <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill">Crea</button>
    </div>
</form>
