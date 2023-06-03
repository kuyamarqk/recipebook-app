<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ProcedureController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [UserController::class,'index'])->name('user.index');
Route::get('/login', [UserController::class,'showLoginForm'])->name('user.showLoginForm');
Route::get('/register', [UserController::class,'showRegisterForm'])->name('user.showRegisterForm');
Route::get('/logout', [UserController::class,'logout'])->name('user.logout');
Route::get('/dashboard', [UserController::class,'dashboard'])->name('user.dashboard');
Route::get('/profile', [UserController::class,'profile'])->name('user.profile');


Route::post('/login', [UserController::class,'userLogin'])->name('user.userLogin');
Route::post('/register',[UserController::class,'registerUser'])->name('user.registerUser');

Route::get('/recipe',[RecipeController::class, 'index'])->name('recipe.index');
Route::get('/create-recipe',[RecipeController::class, 'showRecipeForm'])->name('recipe.showRecipeForm');
Route::post('/recipe/search', [RecipeController::class, 'searchRecipe'])->name('recipe.searchRecipe');
Route::get('/show/{id}', [RecipeController::class,'viewRecipe'])->name('recipe.viewRecipe');
Route::get('/edit/{id}', [RecipeController::class,'editRecipe'])->name('recipe.editRecipe');
Route::get('/delete/{id}', [RecipeController::class,'deleteRecipe'])->name('recipe.deleteRecipe');


Route::post('/recipes', [RecipeController::class, 'store'])->name('recipe.store');
Route::put('/update/{id}',[RecipeController::class,'update'] )->name('recipe.updateRecipe');
Route::delete('/destroy/{id}', [RecipeController::class,'destroy'] )->name('recipe.destroyRecipe');

Route::get('/photo/add/{id}', [PhotoController::class, 'showPhotoForm'])->name('photo.showPhotoForm');
Route::post('upload', [PhotoController::class, 'store'])->name('photo.store');

Route::get('/ingredients/add/{id}', [IngredientController::class, 'showIngredientForm'])->name('ingredients.showIngredientForm');
Route::post('/ingredients', [IngredientController::class, 'store'])->name('ingredients.store');

Route::get('/procedure/add/{id}', [ProcedureController::class, 'showProcedureForm'])->name('procedure.showProcedureForm');
Route::post('store', [ProcedureController::class, 'store'])->name('procedure.store');

