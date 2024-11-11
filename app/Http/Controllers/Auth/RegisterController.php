<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class RegisterController extends Controller
{
    /**
     * Display the registration view.
     */
    public function index(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date', 'before_or_equal:today'],
            'full_address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'sex' => ['required', 'string', 'max:50'],
            'public_url' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        try {
            $firstName = ucwords(strtolower($request->first_name));
            $lastName = ucwords(strtolower($request->last_name));

            $imagePath = $request->file('image')
                ? $request->file('image')->store('profile_images', 'public')
                : null;

            $user = User::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'birthdate' => $request->birthdate,
                'full_address' => $request->full_address,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'sex' => $request->sex,
                'public_url' => $request->public_url,
                'image' => $imagePath,
            ]);

            return redirect()->back()->with('success', 'Successfully registered');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while registering. Please try again.');
        }
    }    


}
