<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = $request->user();

        switch ($user->status) {
            case 0:
                Auth::logout();
                return redirect()->route('login')->with('status', 'Wait for admin approval.');
                break;
            case 1:
                switch ($user->roles()->first()->id) {
                    case 1: // Role ID for admin
                        return redirect()->route('users.index');
                        break;
                    case 2: // Role ID for user
                        return redirect('/');
                        break;
                    default:
                        return redirect(RouteServiceProvider::HOME);
                        break;
                }
                break;
            case 2:
                Auth::logout();
                return redirect()->route('login')->with('status', 'You have been banned by the admin. Please contact our support team for more information.');
                break;
        }


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
