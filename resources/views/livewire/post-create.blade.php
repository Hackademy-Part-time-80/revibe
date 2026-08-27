<form class="bg-body-tertiary shadow rounded p-5 my-5" wire:submit="postStore">
    <h2 class="text-center fw-bold mb-4">Crea il tuo annuncio</h2>

    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" wire:model="title"
            placeholder="Es. Divano in pelle usato" required minlength="3" maxlength="255">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="6"
            wire:model.blur="description" placeholder="Descrivi il tuo articolo..." required minlength="10"></textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" step="0.01" min="0.1" class="form-control @error('price') is-invalid @enderror" id="price"
                wire:model.blur="price" placeholder="0.00" required>
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

    <div class="d-flex justify-content-center mt-4">
        <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill">Crea</button>
    </div>
</form>
