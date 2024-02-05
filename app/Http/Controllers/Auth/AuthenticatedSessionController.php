<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    // public function create(): View
    // {
    //     return view('auth.login');
    // }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $errors = [];

        if (!$request->email) {
            $errors['emailError'] = "The email field is required.";
        }
        if (!$request->password) {
            $errors['passwordError'] = "The password field is required.";
        }

        $user = User::where('email', $request->email)->first();
        if (!$user){
            $errors['emailError'] = "The email is not registered yet.";
        }elseif(!Hash::check($request->password, $user->password)){
            $errors['passwordError'] = "Wrong Password.";
        }

        if ($errors) {
            return redirect()->back()->with($errors);
        }
        
        $request->authenticate();

        $request->session()->regenerate();

        if(Auth::check()){
            if(Auth::user()->role=="User" || Auth::user()->role == "Author"){
                return redirect('/home')->with('success', 'Welcome to MMStoryTeller, '.Auth::user()->name);
            }elseif(Auth::user()->role == "Super Admin"){
                return redirect('/admin')->with('success', 'Welcome to Admin Dashboard, '.Auth::user()->name);
            }
        }

        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
