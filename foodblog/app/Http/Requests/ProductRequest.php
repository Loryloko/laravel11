<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|string|max:255',
            'price' => 'required|numeric|min:0.01',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => $this->route()->named('products.store') ? 'required|image|mimes:jpeg,png,jpg,webp|max:2048' : 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'allergens' => 'nullable|array',
            'allergens.*' => 'exists:allergens,id',
        ];
    }
    #[Override]
    public function messages()
    {
        return [
            'name.required' => "Il nome dell'articolo è obbligatorio.",
            'name.min' => 'Il nome richiede almeno 3 caratteri.',
            'price.required' => 'Il prezzo è obbligatorio.',
            'price.numeric' => 'Il prezzo deve essere un numero valido.',
            'category_id.required' => 'La categoria è obbligatoria.',
            'category_id.exists' => 'La categoria selezionata non esiste.',
            'image.required' => "L'immagine dell'articolo è obbligatoria.", 
            'image.image' => 'Il file caricato deve essere un\'immagine.',
            'image.max' => 'L\'immagine non può superare i 2 MB.',
            'allergens.*.exists',
            'description.min' => 'La descrizione deve contenere almeno 10 caratteri.',
            'description.required' => 'La descrizione degli ingredienti è obbligatoria.',
            ];
    }
}
