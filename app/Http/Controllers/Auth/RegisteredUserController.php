<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\TelephoneRule;
use App\Rules\ZipcodeRule;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('register_user');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults(), 'max:16'],
            'zipcode' => ['required', new ZipcodeRule],
            'address' => ['required', 'string'],
            'telephone' => ['required', 'string', new TelephoneRule],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'zipcode' => $request->zipcode,
            'address' => $request->address,
            'telephone' => $request->telephone,
        ]);

        event(new Registered($user));

        // Auth::login($user);

        return redirect()->route('login_user')->with('user_name', \Auth::user()->name);
    }
}
