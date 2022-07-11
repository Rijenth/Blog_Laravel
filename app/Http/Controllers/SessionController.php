<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('session.create');
    }

    public function store()
    {
        // Validate the request
        $attributes = request()->validate([
            'email' => 'required|email', // Qui existe dnas la table users dans la colonne 'email'
            'password' => 'required'
        ]);

        // attenpt to authenficate and log in t he user
        // based on the providd credentials
        if(auth()->attempt($attributes))
        {

            /* !! Pour éviter les attaques par fixation de session */
            session()->regenerate();

            // redirect with a ssuccess flash message
            return redirect('/')->with('success', 'Welcome back !');

        }

        // auth failed :: 2 méthode =>

        /* throw ValidationException::withMessages([
            'email' => 'Your email is incorrect'
        ]); */

        return back()
            ->withInput()
            ->withErrors(['email' => 'Your email is incorrect']);

    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye !'); // On utilise le flash message 'success'
    }
}
