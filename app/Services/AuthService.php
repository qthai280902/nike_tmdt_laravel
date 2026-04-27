<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthService
{
    /**
     * Register a new user.
     */
    public function register(array $data): User
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'] ?? 'customer',
        ]);

        $this->syncCart();

        Auth::login($user);

        return $user;
    }

    /**
     * Authenticate a user.
     */
    public function login(array $credentials, bool $remember = false): bool
    {
        if (Auth::attempt($credentials, $remember)) {
            $this->syncCart();
            request()->session()->regenerate();
            return true;
        }

        return false;
    }

    /**
     * Terminate user session.
     */
    public function logout(): void
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }

    /**
     * Sync guest cart to user session upon login.
     * In this implementation, the session-based cart persists automatically 
     * across login/logout unless explicitly cleared, but we regenerate 
     * the session ID for security.
     */
    protected function syncCart(): void
    {
        // If we were using a Database-backed cart, we would move rows from 
        // a 'guest_id' to 'user_id' here. Since we use pure Session for now,
        // we just ensure the 'nike_cart' key is preserved.
        $cart = Session::get('nike_cart');
        if ($cart) {
            Session::put('nike_cart', $cart);
        }
    }
}
