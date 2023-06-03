<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\Recipe;

class IngredientController extends Controller
{
    public function showIngredientForm($id){
        $recipe = Recipe::getRecipeById($id);
        return view('ingredient.add', compact('recipe'));
    }
    public function store(Request $request)
    {
        // Retrieve the recipe ID
        $recipeId = $request->input('recipe_id');

        // Retrieve the array of ingredients
        $ingredients = $request->input('ingredients');

        // Loop through each ingredient and save them to the database
        foreach ($ingredients['name'] as $index => $name) {

            // Save the ingredient to the database
            Ingredient::create([
                'recipe_id' => $recipeId,
                'details' => $name,
            ]);
        }

        

        return redirect()->back()->with('success', 'Ingredients added successfully.');
    }

}
