<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Image;

class Post extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['title', 'price', 'description', 'isAccepted', 'user_id', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function toBeRevisedCount()
    {
        return Post::whereNull('isAccepted')->where('user_id', '!=', Auth::id())->count();;
    }

    public function setAccepted($value)
    {
        $this->isAccepted = $value;
        $this->save();
        return true;
    }


    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'category' => $this->category ? $this->category->name : null,
            'isAccepted' => $this->isAccepted,
            'created_at' => $this->created_at,
        ];
    }
    //funzione per la relazione con le immagini
    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}
