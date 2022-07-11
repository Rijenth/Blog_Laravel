<?php

namespace App\Http\Controllers;

Use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $myUser = request()->validate([
                    'name' => 'required|min:4|max:255',
                    'username' => 'required|max:255|min:4|unique:users,username',
                    'email' => 'required|email|max:255|unique:users,email',
                    'password' => ['required', 'max:255', 'min:4'] // Je recommande cette manière d'écrire

                ]);

        User::create($myUser);
        session()->flash('success', 'Your account has been created');
        return redirect('/');


    }
}
