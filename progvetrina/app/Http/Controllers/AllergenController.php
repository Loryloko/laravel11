<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allergen;

class AllergenController extends Controller
{
    public function create()
    {
        return view('allergens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:allergens,name|max:255'
        ], [
            'name.required' => 'Il nome dell\'allergene è obbligatorio.',
            'name.unique' => 'Questo allergene esiste già nel sistema.',
            'name.max' => 'Il nome non può superare i 255 caratteri.',
        ]);

        Allergen::create([
            'name' => $request->name
        ]);

        return redirect()->route('products.create')->with('success', 'Nuovo allergene inserito con successo!');
    }
}
