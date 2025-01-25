<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
 
    public function create(): View
    {
        if(Auth::check()){
            return redirect()->intended('/');

        }
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
       
        $request->authenticate();
        if (!$request->wantsJson()) {
            $request->session()->regenerate();
        }
        if ($request->wantsJson()) {
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;
            return response()->json([
                'user' => $user,
                'token' => $token,
            ], 200);
        }
        return redirect()->intended(route('index', absolute: false));
    }


    public function destroy(Request $request)
    {
        if ($request->wantsJson()) {
            $request->user()->tokens()->delete();
            return response()->json(['message' => 'Logged out'], 200);
        }

        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
