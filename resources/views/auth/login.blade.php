@extends('layouts.app') @section('title', 'Login') @section('content')

<div
    class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg"
>
    <h1 class="text-3xl text-center font-bold">Inicio de Sesión</h1>

    <form class="mt-4" method="POST" action="">
        @csrf

        <input
            type="email"
            class="border border-gray-200 rounded-md bg-gray-200 w-full placeholder-gray-900 p-2 my-2 focus:bg-white"
            placeholder="Email"
            id="email"
            name="email"
        />

        <input
            type="password"
            class="border border-gray-200 rounded-md bg-gray-200 w-full placeholder-gray-900 p-2 my-2 focus:bg-white"
            placeholder="Password"
            id="password"
            name="password"
        />
        
        @error('message')
        <p
            class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2"
        >
            * {{ $message }}
        </p>
        @enderror
        <br>
        <br>
        <center>
            <button
                class="btn btn-primary"
                style="width: 200px"
            >
                Iniciar
            </button>
        </center>
        <br />
      
        <a
            class="btn btn-primary"
            style="width: 200px"
            href="{{ route('register.index') }}"
            role="button"
            >Registrarse</a
        >
        <br />
        <br />
        <a
            class="btn btn-primary"
            style="width: 200px"
            href="{{ route('password.request') }}"
            role="button"
            >Recuperar contraseña</a
        >
    </form>
</div>

@endsection
