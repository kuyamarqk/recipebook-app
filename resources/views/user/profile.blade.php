@extends('user.dashboard')

@section('profile')
    <h1 class="text-3xl font-bold mb-6">User Profile</h1>
        <div class="border rounded-lg p-4">
            <h2 class="text-xl font-bold">Name: {{ $user->name }}</h2>
            <p class="text-gray-600">Email: {{ $user->email }}</p>
            <!-- Add more user profile information here -->
        </div>
        <h3 class="text-lg font-bold mb-2">Created Recipes</h3>
        @if ($recipes->isEmpty())
            <p>No recipes found.</p>
        @else
        @foreach($recipes as $recipe)
        <div class="border rounded-lg p-4 hover:bg-sky-50">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-xl font-bold">{{ $recipe->name }}</h2>
                <div class="flex space-x-2">
                    <a href="{{ route('recipe.viewRecipe', $recipe->id) }}" class="text-blue-500 hover:text-blue-600">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('recipe.editRecipe', $recipe->id) }}" class="text-green-500 hover:text-green-600">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('recipe.deleteRecipe', $recipe->id) }}" class="text-red-500 hover:text-red-600">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>
            <p class="text-gray-600">{{ $recipe->description }}</p>
        </div>
    @endforeach
        @endif
    
@endsection