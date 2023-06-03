<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function index()
    {
        $recipes = Recipe::getAllRecipe();
        return view('user.index', compact('recipes'));
    }

    public function showLoginForm()
    {
        return view('user.login');
    }

    public function showRegisterForm()
    {
        return view('user.register');
    }

    public function dashboard()
    {
        $recipes = Recipe::getAllRecipe();
        return view('user.dashboard', compact('recipes'));
    }

    public function profile(){
        $user = auth()->user();
        $recipes = $user->recipes;

        return view('user.profile', compact('user', 'recipes'));
        // $user = User::with('recipes')->get();
        // return view('user.profile', compact('user'));
    }

    public function registerUser(Request $request)
    {
        try {
            // Validation
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|confirmed',
            ]);

            $validatedData['password'] = Hash::make($validatedData['password']);

            $user = User::create($validatedData);

            // Redirect the user after registration
            return redirect('/dashboard');
        } catch (\InvalidArgumentException $e) {
            // Handle validation error
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function userLogin(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect('/dashboard');
        } else {
            // Invalid credentials
            return back()->withErrors(['error' => 'Invalid email or password.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
                                                                                                                                             