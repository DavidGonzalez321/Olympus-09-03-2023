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

                <label for="email" :value="__('Email')">Email</label>

                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <center>
                <div class="flex items-center justify-center mt-4">
                    <button class="btn btn-primary" style="width: 200px">
                        Enviar
                    </button>
                </div>
            </center>
            <br>

            <a class="btn btn-primary" style="width: 200px" href="{{ route('login.index') }}" role="button">Iniciar
                Sesión</a>
            <br>
            <br>

            <a class="btn btn-primary" style="width: 200px" href="{{ route('register.index') }}"
                role="button">Registrarse</a>
            <br />
            <br />



        </form>


    </div>

@endsection
