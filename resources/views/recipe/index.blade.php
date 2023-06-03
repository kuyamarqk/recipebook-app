@extends('user.dashboard')

@section('recipes_index')
    <h1 class="text-3xl font-bold mb-6">Recipe Book</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($recipes as $recipe)
            <div class="border rounded-lg p-4">
                <div class="flex justify-between items-center mb-2">
                    @if ($recipe->photo)
                        <img class="w-full h-auto rounded-lg" src="{{ asset($recipe->photo->src) }}" alt="{{$recipe->photo->src}}">
                    @else
                        <span>No photo available</span>
                    @endif
                    
                </div>
                <div class="flex justify-between items-center mb-2">
                    
                    <h2 class="text-xl font-bold">
                        <a href="{{ route('recipe.viewRecipe', $recipe->id) }}">{{ $recipe->name }}</a>
                    </h2>
                    @guest
                    @else
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
                    @endguest
                </div>
                <p class="text-gray-600">{{ $recipe->description }}</p>
            </div>
        @endforeach
    </div>
@endsection
