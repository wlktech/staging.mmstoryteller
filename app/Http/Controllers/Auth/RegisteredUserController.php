<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $emailCheck = User::where('email', $request->email)->first();
        $errors = [];

        if (!($request->name)) {
            $errors['nameError'] = "The name field is required.";
        }

        if (!($request->email)) {
            $errors['reg-emailError'] = "The email field is required.";
        }elseif(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $errors['reg-emailError'] = "Please enter a valid email address.";
        }

        if ($emailCheck){
            $errors['reg-emailError'] = "The email has already taken.";
        }

        if (!($request->password)) {
            $errors['reg-passwordError'] = "The password field is required.";
        }elseif (strlen($request->password) < 8) {
            // Password is too short
            $errors['reg-passwordError'] = "Password must be at least 8 characters long.";
        }

        if ($errors) {
            return redirect()->back()->with($errors);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
