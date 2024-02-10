<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        // validate the form

        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        // 'password' => ['required', 'confirmed', 'min:6', 'regex:/^(?=.*[!@#$%^&*()\-_=+{};:,<.>]){6,}$/'],



        // store the user
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // sign the user in
        auth()->login($user);

        // redirect to home page
        return redirect('/')
            ->with('message', 'Thanks for signing up!');
    }

    // logout user

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been logged out.');
    }


    // login from show
    public function login()
    {
        return view('users.login');
    }

    // login user
    public function authenticate(Request $request)
    {
        // validate the form
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // attempt to log the user in
        if (auth()->attempt($request->only('email', 'password'))) {
            // redirect to home page
            return redirect('/')->with('message', 'You have been logged in.');
        }

        // redirect back to login
        return back()->with('message', 'Invalid login details');
    }
}
