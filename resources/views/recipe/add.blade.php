@extends('user.dashboard')

@section('recipes_add')
    <h1 class="text-2xl font-bold mb-4">Add New Recipe</h1>

    <form action="{{ route('recipe.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
            <input type="text" name="name" id="name" class="border border-gray-300 p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Short Description</label>
            <input type="text" name="short_description" id="short_description" class="border border-gray-300 p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
            <textarea name="description" id="description" class="w-full border-gray-300 p-2 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" rows="5"></textarea>
        </div>

        <!-- Add more fields as needed -->

        <div class="mt-4">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Add Recipe</button>
        </div>
    </form>
@endsection


