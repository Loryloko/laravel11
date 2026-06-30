<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest; 
use App\Models\Product;
use App\Models\Allergen;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create()
    {
        $allergens = Allergen::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();

        return view('products.create', compact('allergens', 'categories'));
    }

    public function store(ProductRequest $request)
    {   
        $data = $request->validated();

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products_images', 'public');
        }

        $product = Product::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'] ?? null,
            'user_id' => Auth::id() ?? 1, 
            'category_id' => $data['category_id'],
            'image' => $imagePath
        ]);

        $product->allergens()->sync($request->input('allergens', []));

        return redirect()->route('menu')->with('successMessage', 'Prodotto aggiunto con successo al menu!');
    }

    public function show(Product $product)
    {
    $product->load('allergens');
    return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        abort_if(Auth::id() !== $product->user_id, 403, 'Azione non autorizzata.');

        $allergens = Allergen::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();

        return view('products.edit', compact('product', 'allergens', 'categories'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        abort_if(Auth::id() !== $product->user_id, 403, 'Azione non autorizzata.');

        $data = $request->validated();

        $imagePath = $product->image;

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products_images', 'public');
        }

        $product->update([
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'] ?? null,
            'category_id' => $data['category_id'],
            'image' => $imagePath
        ]);

        $product->allergens()->sync($request->input('allergens', []));

return redirect()->route('menu')->with('successMessage', 'Articolo modificato con successo!');    }

    public function destroy(Product $product)
    {
        abort_if(Auth::id() !== $product->user_id, 403, 'Azione non autorizzata.');

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

            return redirect()->route('menu')->with('successMessage', 'Articolo eliminato correttamente dal menu!');
    }
}
