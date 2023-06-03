<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Recipe;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;

class PhotoController extends Controller
{
    public function showPhotoForm($id){
        $recipe = Recipe::getRecipeById($id);
        return view('photo.add', compact('recipe'));
    }
    
    public function store(Request $request){
        $validatedPhoto = $request->validate([
            'photo' => 'required|image|max:2048',
        ]);

        $photo = $request->file('photo');
        $photoPath = $photo->getClientOriginalName();

        $photo->move(public_path('photos'), $photoPath);

        $photoModel = Photo::create([
            'name' => $photoPath,
            'src' => '/photos/' . $photoPath,
            'recipe_id' => $request->input('recipe_id'),
        ]);

        return redirect('/dashboard')->with('success', 'Photo uploaded successfully.');
       

    }
}
