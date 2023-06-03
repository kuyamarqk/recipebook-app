

@extends('user.dashboard')

@section('recipes_edit')
<div class="flex justify-between mb-4">
    <a href="{{ route('recipe.index') }}" class="text-blue-500 hover:underline">Go Back</a>
    <a href="{{ route('recipe.viewRecipe', $recipe->id) }}" class="text-blue-500 hover:underline">Show</a>
</div>
<h1 class="text-3xl font-bold mb-6">Edit Recipe #{{ $recipe->id }}</h1>

<form action="{{ route('recipe.updateRecipe', $recipe->id) }}" method="POST">
    @csrf
    @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
            <input type="text" name="name" id="name" class="border border-gray-300 p-2 w-full" value="{{ $recipe->name }}" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
            <textarea name="description" id="description" class="w-full border-gray-300 p-2 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" rows="5"> {{ $recipe->description }} </textarea>
        </div>

        <!-- Add more fields as needed -->

        <div class="mt-4">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Update Recipe</button>
        </div>
        <div class="flex space-x-2">
            <a href="/photo/add/{{ $recipe->id }}" class="mx-1" title="Add Photo" data-tippy-content="Add Photo"><i class="fas fa-camera"></i></a>
            <a href="/ingredients/add/{{ $recipe->id }}" class="mx-1" title="Add Ingredients" data-tippy-content="Add Ingredients"><i class="fas fa-shopping-basket"></i></a>
            <a href="/procedure/add/{{ $recipe->id }}" class="mx-1" title="Add Procedures" data-tippy-content="Add Procedures"><i class="fas fa-utensils"></i></a>
        </div>
    </form>
@endsection



