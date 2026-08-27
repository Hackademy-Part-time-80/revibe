<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; 

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categorie = [
            'Elettronica',
            'Motori e Veicoli',
            'Immobili',
            'Abbigliamento',
            'Casa e Giardino',
            'Sport e Tempo Libero',
            'Libri, Film e Musica',
            'Lavoro e Corsi',
            'Servizi',
            'Animali'
        ];

        foreach ($categorie as $categoria) {
            Category::create([
                'name' => $categoria
            ]);
        }
    }
}