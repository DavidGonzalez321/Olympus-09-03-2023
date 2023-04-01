@extends('layouts.app')

@section('title', 'Register')

@section('content')


    <div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 
rounded-lg shadow-lg">

        <h1 class="text-3xl text-center font-bold">Registro</h1>

        <form class="mt-4" method="POST" action="">
            @csrf


            <input type="number" maxlength="12"
                class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="CI" id="CI" name="CI">

            <p style="color: gray;">*Campo Obligatorio</p>

            @error('CI')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2">* {{ $message }}
                </p>
            @enderror

            <input type="text" maxlength="15"
                class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="Nombre" id="name" name="name">

            <p style="color: gray;">*Campo Obligatorio</p>
            @error('name')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2">* {{ $message }}
                </p>
            @enderror

            <input type="text" maxlength="15"
                class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="Username" id="username" name="username">

            <p style="color: gray;">*Campo Obligatorio</p>
            @error('username')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2">* {{ $message }}
                </p>
            @enderror

            <input type="email" maxlength="50"
                class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="Email" id="email" name="email">

            <p style="color: gray;">*Campo Obligatorio</p>
            @error('email')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2">* {{ $message }}
                </p>
            @enderror

            <input type="password" maxlength="15"
                class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="Contraseña" id="password" name="password">

            <p style="color: gray;">*Campo Obligatorio</p>
            @error('password')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2">* {{ $message }}
                </p>
            @enderror

            <input type="password" maxlength="15"
                class="border border-gray-200 rounded-md bg-gray-200 
    w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="Confirme su contraseña" id="password_confirmation" name="password_confirmation">
            <p style="color: gray;">*Campo Obligatorio</p>

            <center>

                <button class="btn btn-primary" style="width: 200px">
                    Enviar
                </button>

                <br>
                <br>


                <a class="btn btn-primary" style="width: 200px" href="{{ route('login.index') }}" role="button">Iniciar
                    Sesión</a>
                <br>
                <br>
                <a class="btn btn-primary" style="width: 200px" href="{{ route('password.request') }}"
                    role="button">Recuperar
                    contraseña</a>

            </center>




        </form>


    </div>

@endsection
