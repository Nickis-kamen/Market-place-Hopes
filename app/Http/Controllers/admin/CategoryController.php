<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function Ramsey\Uuid\v1;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Categorie::withCount('products')->get();
        // $categories = Categorie::all();
        return view('admin.category.index',[
            'categories' => $categories
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string',
            'slug' => 'unique',
            'description' => 'nullable|string',
        ]);

        Categorie::create([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title),
        ]);
        return redirect('admin/categories')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $category = Categorie::findOrFail($id);
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = Categorie::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $category = Categorie::findOrFail($id);
        $request->validate([
            'title' => 'required|string|unique:categories,title,'. $category->id,
            'description' => 'nullable|string',
        ]);

        $category->title = $request->title;
        $category->description = $request->description;
        $category->slug = Str::slug($request->title);
        $category->save();

        return redirect('admin/categories')->with('success', 'Categorie mise à jour avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Categorie::findOrFail($id);
        // Récupère la catégorie par défaut
        $defaultCategory = Categorie::where('id', 1)->first();

        // Re-associe chaque produit de cette catégorie à la catégorie par défaut
        foreach ($category->products as $product) {
            // Supprime l'ancienne relation
            $product->categories()->detach($category->id);

            // Vérifie si le produit n'a plus aucune autre catégorie
            if ($product->categories()->count() === 0) {
                // Associe à la catégorie "non classé"
                $product->categories()->attach($defaultCategory->id);
            }
        }

        // Supprime la catégorie
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Catégorie supprimée et produits reclassés.');
    }

}
