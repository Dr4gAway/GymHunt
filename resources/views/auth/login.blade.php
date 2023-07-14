@extends('layout.site')
@section('titulo', 'GymHunt - Login')
@section('content') 

<div class="flex flex-col justify-center px-6 py-4 lg:px-8">
    
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto w-auto" src=".\img\logoIcon.png" alt="Your Company">
            <h2 class="mt-4 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Faça login para entrar na sua conta!</h2>
        </div>

        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
            
            <form class="space-y-6" action="{{route('login')}}" method="POST">

                @csrf
                @method('POST')

                @error('invalid_credentials')
                    <p class="text-red-500"> {{$message}} </p>   
                @enderror

                <x-form.text name="email" label="Email" placeholder="e.g: seuemail@gmail.com.br" />
                <x-form.text name="password" label="Senha" type="password" placeholder="e.g: senha123"/>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Logar</button>
                </div>
            </form>

            <p class="mt-10 text-center text-md text-gray-200"> Não tem uma conta?
                <a href="#" class="font-semibold leading-6 text-indigo-900 hover:text-indigo-300">Cadastre-se</a>
            </p>
        </div>
    </div>

@endsection
