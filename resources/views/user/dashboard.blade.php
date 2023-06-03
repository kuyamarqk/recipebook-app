@extends('layout.app')

@section('content')
    @guest
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/5 md:mr-5">
                <div class="bg-white rounded p-4 shadow-md mb-4">
                    <h2 class="text-xl font-bold mb-4">Dashboard</h2>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('recipe.index') }}" class="text-blue-500 hover:underline">View All Recipes</a>
                        </li>
                        <!-- Add more navigation links here -->
                    </ul>
                </div>
                <div class="bg-white rounded p-4 shadow-md">
                    <h2 class="text-xl font-bold mb-4">Account</h2>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('user.showLoginForm') }}" class="text-blue-500 hover:underline">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('user.showRegisterForm') }}" class="text-blue-500 hover:underline">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="md:w-3/4">
                <div class="bg-white rounded p-4 shadow-md">
                    <div class="bg-white rounded p-4 shadow-md">
                        <!-- Main content of the dashboard -->
                        @if (Route::currentRouteName() === 'recipe.index')
                            @yield('recipes_index')
                        @elseif (Route::currentRouteName() === 'recipe.showRecipeForm')
                            @yield('recipes_add')
                        @elseif (Str::startsWith(Route::currentRouteName(), 'recipe.viewRecipe'))
                            @yield('recipes_view')
                        @elseif (Str::startsWith(Route::currentRouteName(), 'recipe.editRecipe'))
                            @yield('recipes_edit')
                        @elseif (Str::startsWith(Route::currentRouteName(), 'recipe.deleteRecipe'))
                            @yield('recipes_delete')
                        @elseif (Str::startsWith(Route::currentRouteName(), 'user.profile'))
                            @yield('profile')
                        @else
                            <h1 class="text-2xl font-bold mb-4">Welcome to the Dashboard</h1>
                            <p class="text-gray-600">Select an option from the left-side navigation menu.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Dashboard content goes here -->
        
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/5 md:mr-5">
                <div class="bg-white rounded p-4 shadow-md mb-4">
                    <h2 class="text-xl font-bold mb-4">Dashboard</h2>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('recipe.index') }}" class="text-blue-500 hover:underline">View All Recipes</a>
                        </li>
                        <li>
                            <a href="{{ route('recipe.showRecipeForm') }}" class="text-blue-500 hover:underline">Add New Recipe</a>
                        </li>
                        <!-- Add more navigation links here -->
                    </ul>
                </div>

                <div class="bg-white rounded p-4 shadow-md">
                    <h2 class="text-xl font-bold mb-4">Account</h2>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('user.profile') }}" class="text-blue-500 hover:underline">Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('user.logout') }}" class="text-blue-500 hover:underline">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="md:w-3/4">
                <div class="bg-white rounded p-4 shadow-md">
                    <div class="bg-white rounded p-4 shadow-md">
                        <!-- Main content of the dashboard -->
                        @if (Route::currentRouteName() === 'recipe.index')
                            @yield('recipes_index')
                        @elseif (Route::currentRouteName() === 'recipe.showRecipeForm')
                            @yield('recipes_add')
                        @elseif (Str::startsWith(Route::currentRouteName(), 'recipe.viewRecipe'))
                            @yield('recipes_view')
                        @elseif (Str::startsWith(Route::currentRouteName(), 'recipe.editRecipe'))
                            @yield('recipes_edit')
                        @elseif (Str::startsWith(Route::currentRouteName(), 'recipe.deleteRecipe'))
                            @yield('recipes_delete')
                        @elseif (Str::startsWith(Route::currentRouteName(), 'user.profile'))
                            @yield('profile')
                        @elseif (Str::startsWith(Route::currentRouteName(), 'photo.showPhotoForm'))
                            @yield('photos_add')
                        @elseif (Str::startsWith(Route::currentRouteName(), 'ingredients.showIngredientForm'))
                            @yield('ingredients_add')
                        @elseif (Str::startsWith(Route::currentRouteName(), 'procedure.showProcedureForm'))
                            @yield('procedures_add')
                        @else

                            @if (session('success'))
                                <div class="bg-green-200 text-green-800 px-4 py-2 mb-4 rounded">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <h1 class="text-2xl font-bold mb-4">Welcome to your dashboard, {{ Auth::user()->name }}!</h1>
                            
                            <p class="text-gray-600">Select an option from the left-side navigation menu.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endguest
@endsection
