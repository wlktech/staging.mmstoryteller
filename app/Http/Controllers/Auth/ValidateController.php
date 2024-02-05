<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ValidateController extends Controller
{
    public function loginCheck(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => [
                    "email" => '*Email is not registered yet!'
                ]
            ]);
        }

        if (!$user->email_verified_at) {
            return response()->json([
                'success' => false,
                'message' => [
                    "email" => '*The email is not active yet. Please Contact to Admin!'
                ]
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => [
                    'password' => "*Wrong Password!"
                ],
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => [
                "email" => "correct",
                "password" => "correct",
            ],
        ]);
    }

    public function signupCheck(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            return response()->json([
                'success' => false,
                'message' => [
                    "email" => '*Email has already existed!'
                ]
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => [
                "email" => "Correct",
            ],
        ]);
    }

    public function signup(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response()->json([
            'success' => "true"
        ]);
    }


}
