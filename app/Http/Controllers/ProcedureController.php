<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procedure;
use App\Models\Recipe;

class ProcedureController extends Controller
{
    public function showProcedureForm($id){
        $recipe = Recipe::getRecipeById($id);
        return view('procedure.add', compact('recipe'));
    }
    public function store(Request $request)
{
    $request->validate([
        'recipe_id' => 'required',
        'procedure' => 'required',
    ]);

    $recipe_id = $request->input('recipe_id');
    $procedure = $request->input('procedure');

    Procedure::create([
        'recipe_id' => $recipe_id,
        'description' => $procedure,
    ]);

    return redirect()->back()->with('success', 'Ingredients added successfully.');

}

}
