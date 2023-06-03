@extends('layout.app')

@section('content')
<div class="md:w-full">
    <div class="bg-white rounded p-4 shadow-md">
        <div class="bg-white rounded p-4 shadow-md">
            <h1 class="text-3xl font-bold mb-6">Recipe Book</h1>
            <div id="searchResultsContainer">
                @include('recipe.partials.searchRecipe', ['recipes' => $recipes])
            </div>
        
        </div>
    </div>
</div>
@endsection