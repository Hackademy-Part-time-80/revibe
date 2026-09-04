<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostCreate extends Component
{
    use WithFileUploads;

    public $title = '';
    public $price = '';
    public $description = '';
    public int $user_id;
    public $category_id = '';
    public $images = [];
    public $temporary_images;



    // MODIFICATORE VALUE DEI REQUIRED//
    protected $rules = [
        'title' => 'required|min:3|max:255',
        'price' => 'required|numeric|min:0.1',
        'description' => 'required|min:10|max:255',
        'category_id' => 'required|exists:categories,id'
    ];

     // MESSAGGI ERROR DEI REQUIRED//
    protected $messages = [
        '*.required' => 'Il campo :attribute è obbligatorio.',
        'title.min' => 'Il titolo deve avere almeno 3 caratteri.',
        'title.max' => 'Il titolo non può superare i 255 caratteri.',
        'price.numeric' => 'Il prezzo deve essere un numero.',
        'price.min' => 'Il prezzo deve essere maggiore di zero.',
        'description.min' => 'La descrizione deve essere di almeno 10 caratteri.',
        'description.max' => 'La descrizione non può superare i 255 caratteri.',
        'category_id.exists' => 'La categoria selezionata non è valida.'
    ];

    public function postStore()
    {



        $this->validate();
        $this->user_id = Auth::user()->id;


        Post::create([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
        ]);

        return redirect()->route('homepage')->with('successMessage', 'Annuncio creato!');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.post-create', compact('categories'));
    }

    //funzione per la validazione delle immagini
    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',

        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }
}
