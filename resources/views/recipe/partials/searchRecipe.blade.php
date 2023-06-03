@if($recipes->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($recipes as $recipe)
            <div class="border rounded-lg p-4 bg-white">
                <div class="flex justify-between items-center mb-2">
                    @if ($recipe->photo)
                        <img class="w-full h-auto rounded-lg" src="{{ asset($recipe->photo->src) }}" alt="{{$recipe->photo->src}}">
                    @else
                        <span>No photo available</span>
                    @endif
                    
                </div>
                <h2 class="text-xl font-bold"><a class="text-blue-500 hover:underline" href="{{ route('recipe.viewRecipe', $recipe->id) }}">{{ $recipe->name }}</a></h2>
                <p class="text-gray-600">{{ $recipe->description }}</p>
            </div>
        @endforeach
    </div>
@else
    <p class="text-center">No results found.</p>
@endif
