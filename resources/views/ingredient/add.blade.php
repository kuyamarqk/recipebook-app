@extends('user.dashboard')

@section('ingredients_add')
    <h1 class="text-2xl font-bold mb-4">Add Ingredients to {{ $recipe->name}}</h1>

    <form action="{{ route('ingredients.store') }}" method="POST" id="ingredientsForm">
        @csrf
        <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
        
        <div id="ingredientsContainer">
            <div class="ingredient-row mb-4">
                <div>
                    <label for="name" class="block text-gray-700 font-bold mb-2">Ingredients Name:</label>
                    <input type="text" name="ingredients[name][]" class="ingredient-name border border-gray-300 p-2 w-full mb-2" required>
                </div>

                <div>
                    <button type="button" class="remove-ingredient-btn bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600">Remove</button>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="button" id="addIngredientBtn" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Add Ingredient</button>
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Add Recipe</button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var addIngredientBtn = document.getElementById('addIngredientBtn');
            var ingredientsContainer = document.getElementById('ingredientsContainer');
            var ingredientsCount = 1;

            addIngredientBtn.addEventListener('click', function() {
                var ingredientRow = document.createElement('div');
                ingredientRow.className = 'ingredient-row mb-4';

                var nameInput = document.createElement('input');
                nameInput.type = 'text';
                nameInput.name = 'ingredients[name][]';
                nameInput.className = 'ingredient-name border border-gray-300 p-2 w-full mb-2';
                nameInput.required = true;

                var removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'remove-ingredient-btn bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600';
                removeBtn.textContent = 'Remove';

                ingredientRow.appendChild(document.createElement('hr'));
                ingredientRow.appendChild(document.createElement('br'));
                ingredientRow.appendChild(document.createElement('label')).textContent = 'Ingredients Name:';
                ingredientRow.appendChild(document.createElement('br'));
                ingredientRow.appendChild(nameInput);

                

                ingredientRow.appendChild(document.createElement('br'));
                ingredientRow.appendChild(removeBtn);

                ingredientsContainer.appendChild(ingredientRow);
                ingredientsCount++;
            });

            $(document).on('click', '.remove-ingredient-btn', function() {
                $(this).closest('.ingredient-row').remove();
                ingredientsCount--;
            });
        });
    </script>
@endsection
