@extends('layout.app')

@section('content')
    <div class="max-w-md mx-auto bg-white rounded p-6 shadow-md">
        <h2 class="text-2xl font-bold mb-6">Login</h2>

        <form method="POST" action="{{ route('user.userLogin') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="border border-gray-300 rounded px-3 py-1 w-full" required>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="border border-gray-300 rounded px-3 py-1 w-full" required>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-gray-700">Remember me</label>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">Login</button>
            </div>
        </form>
    </div>
@endsection