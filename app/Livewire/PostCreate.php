<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostCreate extends Component
{
    use WithFileUploads;

    public string $title;
    public float $price;
    public string $description;
    public int $user_id;
    public int $category_id;

    protected $rules = [
        'title' => 'required',
        'price' => 'required',
        'description' => 'required'
    ];

    protected $messages = [
        '*.required' => 'il campo :attribute è richiesto'
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
        return view('livewire.post-create');
    }
}
