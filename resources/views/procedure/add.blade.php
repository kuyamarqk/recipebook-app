@extends('user.dashboard')

@section('procedures_add')
    <h1 class="text-2xl font-bold mb-4">Add Procedures to {{ $recipe->name}}</h1>

    <form action="{{ route('procedure.store') }}" method="POST" >
        @csrf
        <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
        <div>
            <label for="name" class="block text-gray-700 font-bold mb-2">Procedures: </label>
            <textarea name="procedure" id="procedure" class="w-full border-gray-300 p-2 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" rows="5"></textarea>
        </div>
        <div class="mt-4">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Add Recipe</button>
        </div>
    </form>
@endsection
