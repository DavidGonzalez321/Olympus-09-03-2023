<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
            'username' => 'required|unique:users,username|max:25|min:3',
            'email' => 'required|email|unique:users,email|max:50|min:3',
            'password' => 'required|confirmed|max:15|min:3',
        ]);

        $user = User::create(request(['CI', 'name', 'email', 'password', 'username']));



        auth()->login($user);
        if (auth()->user()) {
            return redirect()->route('admin.index');
        } else {
        }
    }
}
