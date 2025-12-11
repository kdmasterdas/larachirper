<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use AuthorizesRequests;
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $validate = $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|confirmed|min:8|confirmed'
            ]
        );

        $user = User::create(
            [
                'name' => $validate['name'],
                'email' => $validate['email'],
                'password' => Hash::make($validate['password'])
            ]
        );

        Auth::login($user);

        return redirect('/')->with('success', 'Registration successfull!');
    }
}
