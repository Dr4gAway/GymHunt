@extends('layout.site')
@section('titulo', 'GymHunt - Cadastro')
@section('content')
<section class="flex flex-col w-full max-w-2xl mx-auto my-8 gap-8 ">
    <h2 class="flex flex-col self-start font-bold">
        <span class="text-6xl">
            Cadastre-se
        </span>
        <span class="text-4xl">
            Agora no nosso sitema
        </span>
    </h2>
    <form action="{{route('signup')}}" method="POST" class="flex flex-col w-full gap-4" x-data="{}" x-init="alert('component inicializado')">
        @CSRF

        <x-form.text name="name" label="Nome" class="w-full"/>
        <x-form.text name="email" label="Email" class="w-full"/>

        <div class="flex gap-4">
            <x-form.text name="password" label="Senha" type="password" class="w-full"/>
            <x-form.text name="password_confirmation" label="Confirmar senha" type="password" class="w-full"/>
        </div>
        <x-form.text name="phone" label="Telefone" class="w-full"/>

        <span class="text-center font-bold text-2xl mt-3">Qual usuário você se encaixa?</span>
        <div class="flex gap-8 justify-center">
            <label for="common" class="flex flex-col w-full">
                <input type="radio" name="user_type" id="common" value="common" class="hidden peer">
                <div class="gap-4 flex flex-col w-full items-center shadow-xl rounded-md p-4 outline outline-2 outline-gymhunt-purple-1 peer-checked:bg-gymhunt-purple-3 cursor-pointer">
                    <img class="w-32" src=".\img\academia.png" alt="Selecione:" />
                    <span class="text-2xl font-bold">Academeia</span>
                </div>
            </label>

            <label for="gym" class="flex flex-col w-full">
                <input type="radio" name="user_type" id="gym" value="gym" class="hidden peer">
                <div class="gap-4 flex flex-col w-full items-center shadow-xl rounded-md p-4 outline outline-2 outline-gymhunt-purple-1 peer-checked:bg-gymhunt-purple-3 cursor-pointer">
                    <img class="w-32" src=".\img\musculo.png" >
                    <span class="text-2xl font-bold">Pessoa</span>
                </div>
            </label>
        </div>

        <!-- Imagens -->

        <!-- <span class="text-lg font-bold leading-6 text-gray-900">Insira suas imagens</span>
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
        </div> -->
        <button wire:ignore @click.prevent="alert('teste')">Próximo</button>
        <button type="submit" class="bg-gymhunt-purple-1 text-white font-bold px-4 py-2 rounded-md"> Cadastrar-se </button>
    </form>
</section>
@endsection
