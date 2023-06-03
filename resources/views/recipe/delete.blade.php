@extends('user.dashboard')

@section('recipes_delete')
    <h1 class="text-3xl font-bold mb-6">Recipe Book</h1>

    <div class="flex justify-center">
        <div class="w-full md:w-2/3 lg:w-1/2 xl:w-1/3">
            <div class="bg-white rounded-lg p-6 shadow-md">
                <h2 class="text-xl font-bold">Delete Recipe #{{ $recipe->id }}</h2>
                <p class="text-gray-600">{{ $recipe->name }}</p>
                <p class="text-gray-600">{{ $recipe->description }}</p>

                <form action="{{ route('recipe.destroyRecipe', $recipe->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this recipe?')">
                    @csrf
                    @method('DELETE')

                    <div class="mt-6 flex justify-between">
                        <a href="{{ route('recipe.index') }}" class="text-blue-500 hover:underline">Go Back</a>
                        <button type="submit" class="text-red-500 hover:text-red-600">
                            Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
