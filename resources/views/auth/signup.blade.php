@extends('layout.site')
@section('titulo', 'GymHunt - Cadastro')
@section('content') 

<div class="flex flex-col justify-center px-6 py-4 lg:px-8">
    
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto w-auto" src=".\img\logoIcon.png" alt="Your Company">
            <h2 class="mt-4 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Faça login para entrar na sua conta!</h2>
        </div>

        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
            
            <form class="space-y-6" action="{{route('signup')}}" method="POST">

                @csrf
                @method('POST')

                @error('invalid_credentials')
                    <p class="text-red-500"> {{ $message }} </p>   
                @enderror

                <x-form.text name="name" label="Nome" placeholder="e.g: Bruno Suwa" />
                <x-form.text name="phone" label="Telefone" placeholder="e.g: +55 (14) 99722-1343" />
                <x-form.text name="email" label="Email" placeholder="e.g: bruno.s@gmail.com.br" />
                <x-form.text name="password" label="Senha" type="password" placeholder="e.g: senha123"/>
                <x-form.text name="password_confirmation" label="Confirme sua senha" type="password" placeholder="e.g: senha123"/>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cadastre-se</button>
                </div>
            </form>
        </div>
    </div>

@endsection
