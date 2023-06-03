<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Photo;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::with('photo', 'ingredients', 'procedure')->get();
        return view('recipe.index', compact('recipes'));
    }

    public function showRecipeForm()
    {
        return view('recipe.add');
    }

    public function viewRecipe($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipe.view', compact('recipe'));
    }

    public function editRecipe($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipe.edit', compact('recipe'));
    }

    public function deleteRecipe($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipe.delete', compact('recipe'));
    }

    public function searchRecipe(Request $request)
    {
        $searchQuery = $request->input('search');
        $recipes = Recipe::searchRecipe($searchQuery);
        return view('user.index', compact('recipes'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
    
        $request->validate([
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ]);
    
        try {
            $recipe = Recipe::create([
                'name' => $request->input('name'),
                'short_description' => $request->input('short_description'),
                'description' => $request->input('description'),
                'user_id' => $user->id, // Use $user->id instead of Auth::id()
            ]);
    
            // Rest of the code
        } catch (\Exception $e) {
            // Handle the exception
            dd($e->getMessage()); // Display the error message
        }
    
        return redirect()->route('user.dashboard')->with('success', 'Recipe added successfully');
    }
    

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ]);

        $recipe = Recipe::findOrFail($id);
        $recipe->name = $request->input('name');
        $recipe->short_description = $request->input('short_description');
        $recipe->description = $request->input('description');
        $recipe->save();

        return redirect()->route('recipe.viewRecipe', $recipe->id)->with('success', 'Recipe updated successfully');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect()->route('recipe.index')->with('success', 'Recipe deleted successfully');
    }
}
