<form class="mt-5" wire:submit='postStore'>
    @csrf

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <div class="mb-3">
        <label for="title" class="form-label">Titolo:</label>
        <input type="text" id="title" wire:model="title" class="form-control">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Prezzo:</label>
        <input type="number" step="0.01" min="0" id="price" wire:model="price" class="form-control">
    </div>

    <div class="mb-3">
        <label for="body" class="form-label">Descrizione:</label>
        <textarea id="body" cols="20" rows="10" wire:model="description" class="form-control"></textarea>
    </div>

    <div class="mb-5 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Crea</button>
    </div>

</form>
