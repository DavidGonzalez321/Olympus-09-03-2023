@extends('layouts.app')

@section('title', 'Login')

@section('content')


    <div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 
rounded-lg shadow-lg">


        <div class="mb-4 text-sm text-gray-600">
            {{ __('¿Olvidaste tu contraseña?') }}
            <p>No hay problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace de
                restablecimiento de contraseña que le permitirá elegir una nueva.</p>

        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button
                    class="rounded-md bg-indigo-500 w-full text-lg
    text-white font-semibold p-2 my-3 hover:bg-indigo-600">
                     Enviar
                </button>
            </div>
            <br>
            <ul>
                <li>
                     <a class="btn btn-primary" href="{{ route('password.request') }}" style="height: 55px;" role="button">Recuperar contraseña</a>
                </li>
                <br>
                <li>
                    <a class="btn btn-primary" href="{{ route('login.index') }}" role="button">Iniciar Sección</a>
                </li>
                <br>
                <li>
                     <a class="btn btn-primary" href="{{ route('register.index') }}" role="button">Registrarse</a>
                </li>
            </ul>
        </form>


    </div>

@endsection
