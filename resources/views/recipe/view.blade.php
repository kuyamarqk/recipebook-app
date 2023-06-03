@extends('user.dashboard')

@section('recipes_view')
    @guest
    <div class="flex justify-between mb-4">
        <a href="{{ route('recipe.index') }}" class="text-blue-500 hover:underline">Go Back</a>
    </div>
    <h1 class="text-3xl font-bold mb-6">Recipe #{{ $recipe->id }}: {{ $recipe->name }}</h1>
    
        
        <div class="border rounded-lg p-4">
            
            @if ($recipe->photo)
                <img class="w-full h-auto rounded-lg" src="{{ asset($recipe->photo->src) }}" alt="{{$recipe->photo->src}}">
            @else
                <span>No photo available</span>
            @endif
            <p class="text-gray-600">{{ $recipe->name }}</p>
            <p class="text-gray-600">{{ $recipe->description }}</p>
            <h3 class="mt-4 mb-2 font-semibold">Ingredients:</h3>
            @if ($recipe->ingredients)
                <ul>
                    @foreach ($recipe->ingredients as $ingredient)
                        <li>{{ $ingredient->details }}</li>
                    @endforeach
                </ul>
            @else
                <span>No Ingredients available</span>
            @endif
            
            <h3 class="mt-4 mb-2 font-semibold">Procedures:</h3>
            @if ($recipe->procedure)
                <p>{{ $recipe->procedure->description }}</p>
            @else
                <span>No Procedure available</span>
            @endif
            
        </div>
    
    @else
    <div class="flex justify-between mb-4">
        <a href="{{ route('recipe.index') }}" class="text-blue-500 hover:underline">Go Back</a>
        <a href="{{ route('recipe.editRecipe', $recipe->id) }}" class="text-green-500 hover:underline">Update</a>
    </div>

    <h1 class="text-3xl font-bold mb-6">Recipe #{{ $recipe->id }}: {{ $recipe->name }}</h1>

    
    <div class="border rounded-lg p-4">
            
        @if ($recipe->photo)
            <img class="w-full h-auto rounded-lg" src="{{ asset($recipe->photo->src) }}" alt="{{$recipe->photo->src}}">
        @else
            <span>No photo available</span>
        @endif
        <p class="text-gray-600">{{ $recipe->name }}</p>
        <p class="text-gray-600">{{ $recipe->description }}</p>
        <h3 class="mt-4 mb-2 font-semibold">Ingredients:</h3>
        @if ($recipe->ingredients)
            <ul>
                @foreach ($recipe->ingredients as $ingredient)
                    <li>{{ $ingredient->details }}</li>
                @endforeach
            </ul>
        @else
            <span>No Ingredients available</span>
        @endif
        
        <h3 class="mt-4 mb-2 font-semibold">Procedures:</h3>
        @if ($recipe->procedure)
            <p>{{ $recipe->procedure->description }}</p>
        @else
            <span>No Procedure available</span>
        @endif
        
    </div>
    @endguest
@endsection
