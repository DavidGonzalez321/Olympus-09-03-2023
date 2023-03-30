<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{

    public function create()
    {

        return view('auth.register');
    }

    public function store()
    {

        $this->validate(request(), [
            'CI' => 'required|string|unique:users,CI|max:15|min:6',
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $user = User::create(request(['CI', 'name', 'email', 'password', 'username']));

        auth()->login($user);
        if(auth()->user()) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->to('../home2');
        }
    }
}
