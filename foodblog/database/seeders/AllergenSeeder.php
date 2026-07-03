<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Allergen; // Importa il tuo modello Allergen

class AllergenSeeder extends Seeder
{
    public function run(): void
    {
        $allergens = [
            ['name' => 'Glutine'],
            ['name' => 'Lattosio / Latte'],
            ['name' => 'Frutta a guscio'],
            ['name' => 'Arachidi'],
            ['name' => 'Uova'],
            ['name' => 'Pesce (es. Acciughe)'],
            ['name' => 'Molluschi (es. Frutti di mare)'],
            ['name' => 'Sedano'],
            ['name' => 'Senape'],
            ['name' => 'Semi di sesamo'],
            ['name' => 'Anidride solforosa e solfiti'],
            ['name' => 'Lupini'],
            ['name' => 'Crostacei'],
            ['name' => 'Soia']
        ];

        foreach ($allergens as $allergen) {
            Allergen::firstOrCreate($allergen);
        }
    }
}
