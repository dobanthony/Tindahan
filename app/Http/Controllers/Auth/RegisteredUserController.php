<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required|string|in:customer', // only allow 'customer'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // will always be 'customer'
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Redirect based on role using helper methods
        if ($user->isAdmin()) return redirect()->route('admin.dashboard');
        if ($user->isCustomer()) return redirect()->route('customer.dashboard');
        if ($user->isDelivery()) return redirect()->route('delivery.dashboard');
        if ($user->isCashier()) return redirect()->route('cashier.dashboard');

        // fallback
        return redirect()->route('customer.dashboard');
    }
}
