<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Display a form of the login.
     */
    public function login(): View
    {
        return view('login');
    }

    /**
     * Check Login credentials.
     */
    public function checkLogin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'emiscode' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard'); // Change to your desired redirect route
        }

        return back()->withErrors(['emiscode' => 'Invalid Emis Code']);
    }
}
