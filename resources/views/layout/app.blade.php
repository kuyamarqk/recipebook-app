<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
        // Handle menu toggle
        const menuToggle = document.getElementById('menu-toggle');
        const menuIcon = document.querySelector('.fa-bars');
    
        menuToggle.addEventListener('change', function() {
            if (this.checked) {
                menuIcon.classList.replace('fa-bars', 'fa-times');
            } else {
                menuIcon.classList.replace('fa-times', 'fa-bars');
            }
        });
    
        // Handle user menu dropdown
        const userMenuButton = document.getElementById('user-menu');
        const userMenuDropdown = document.getElementById('user-menu-dropdown');
    
        userMenuButton.addEventListener('click', function() {
            userMenuDropdown.classList.toggle('hidden');
        });

        // Handle search form submission
        $('##search').on('input',function(event) {
            event.preventDefault(); // Prevent form submission

            // Get the search query
            var searchQuery = $('#search').val();

            // Send an AJAX request to the search endpoint
            $.get('/recipe', {
                 search: searchQuery }, 
                 function(response) {
                $('#searchResultsContainer').html(response);
            });
        });
    });
    </script>
    @vite('resources/css/app.css')
    <title>Recipe Book App</title>

</head>
<body class="bg-gray-100">
        <nav class="bg-white shadow-lg">
            <div class="container mx-auto px-4 py-2 flex items-center justify-between">
                <a href="/" class="text-xl font-bold">Recipe Book</a>
        
                <div class="flex items-center">
                    <input type="checkbox" id="menu-toggle" class="hidden">
                    <label for="menu-toggle" class="block cursor-pointer md:hidden">
                        <i class="fa-solid fa-bars"></i>
                    </label>
        
                    <div class="hidden md:flex md:items-center">
                        <form id="searchForm" action="{{ route('recipe.searchRecipe')}}" method="POST" class="mr-4">
                            @csrf
                            <input type="text" name="search" id="search" placeholder="Search" class="border border-gray-300 rounded px-3 py-1">
                            <button type="submit" class="ml-2 bg-blue-500 text-white rounded px-4 py-2">Search</button>
                        </form>
        
                        @guest
                            <a href="{{ route('user.showLoginForm') }}" class="text-gray-700">Login</a>
                            <a href="{{ route('user.showRegisterForm') }}" class="ml-4 bg-blue-500 text-white rounded px-4 py-2">Register</a>
                        @else
                            <div class="relative">
                                <button id="user-menu" class="flex items-center text-gray-700">
                                    <span class="mr-2">{{ Auth::user()->name }}</span>
                                    <i class="fa-solid fa-user"></i>
                                </button>
        
                                <div id="user-menu-dropdown" class="absolute right-0 mt-2 w-40 bg-white rounded shadow-md hidden">
                                    <ul class="py-2">
                                        <li>
                                            <a href="{{ route('user.profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.logout') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
    <main class="container mx-auto px-4 py-8" id="searchResultsContainer">
        @yield('content')
    </main>
</body>
</html>
