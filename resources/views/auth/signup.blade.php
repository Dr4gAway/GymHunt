@extends('layout.site')
@section('titulo', 'GymHunt - Cadastro')
@section('content')
<section class="flex flex-col w-full max-w-2xl mx-auto my-8 gap-8 ">
    <h2 class="flex flex-col self-center">
        <img class="mx-auto w-auto" src=".\img\logoIcon.png" alt="Your Company">
        <span class="text-4xl self-center font-bold">
            Cadastre-se
        </span>
        <span class="text-2xl font-semibold">
            agora no nosso sitema
        </span>
    </h2>
    <form action="{{route('signup')}}" method="POST" class="flex flex-col w-full gap-4">
        @CSRF

        <x-form.text name="name" label="Nome" class="w-full"/>
        <x-form.text name="email" label="Email" class="w-full"/>
        <div class="flex gap-4">
            <x-form.text name="password" label="Senha" type="password" class="w-full"/>
            <x-form.text name="password_confirmation" label="Confirmar senha" type="password" class="w-full"/>
        </div>
        <x-form.text name="phone" label="Telefone" class="w-full"/>

    <!--
        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm lg:max-w-xl">
        <form class="space-y-6 mx-auto max-w-xl" action="{{route('signup')}}" method="POST">
            @csrf
            @method('POST')

            <span class="text-lg font-bold leading-6 text-gray-900">Insira suas imagens</span>
            <div class="flex flex-col gap-4">
            <div>
                <label for="avatar" class="block text-sm font-semibold leading-6 text-gray-900 ">1. Avatar</label>
                <div class="mt-2.5">
                    <input type="file" name="avatar" id="avatar" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('avatar')
                    <p class="text-red-500"> {{$message}} </p>   
                @enderror
            </div>

            <div>
                <label for="banner" class="block text-sm font-semibold leading-6 text-gray-900">2. Banner</label> 
                <div class="mt-2.5">
                    <input type="file" name="banner" id="banner" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                
                @error('banner')
                    <p class="text-red-500"> {{$message}} </p>   
                @enderror
            </div>
            
        </form>
    </div> -->

    <button type="submit" class="bg-gymhunt-purple-1 text-white px-4 py-2 rounded-md font-bold hover:bg-gymhunt-purple-2">Cadastrar-se</button>

    </form>
</div>

    

@endsection
