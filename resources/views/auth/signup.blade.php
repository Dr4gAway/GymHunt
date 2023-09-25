@extends('layout.site')
@section('titulo', 'GymHunt - Cadastro')
@section('content') 

<div class="flex flex-col justify-center my-12 px-6 py-4 lg:px-8">
    <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true">
        <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
            
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

    <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm lg:max-w-xl">
        <form class="space-y-6 mx-auto max-w-xl" action="{{route('signup')}}" method="POST">
            @csrf
            @method('POST')

            @error('invalid_credentials')
                <p class="text-red-500"> {{$message}} </p>   
            @enderror
            <div class="grid grid-flow-col justify-stretch space-x-2">
                <x-form.text name="name" label="Nome" placeholder="Digite seu nome completo"/>
            </div>

            <x-form.text name="phone" label="Telefone" placeholder="ex: XXXXXXXXXXXXX"/>
            <x-form.text name="email" label="Email" placeholder="ex: email@gmail.com"/>
            <x-form.text name="password" label="Senha" type="password" placeholder="Digite sua senha"/>
            <x-form.text name="password_confirmation" label="Confirme sua senha" type="password" placeholder="Repita sua senha"/>

            <label for="password" class="block text-lg font-semibold leading-6 text-gray-900">Insira suas imagens</label>
            <x-form.text name="banner" label="1. Banner" type="file"/>
            <x-form.text name="avatar" label="2. Avatar" type="file"/>

            <div class="sm:col-span-2">
                <label for="conta" class="block text-sm font-semibold leading-6 text-gray-900">Eu sou: </label>
                <div class="mt-2.5 flex justify-between space-x-5">
                    <div class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <input type="radio" name="conta" id="user">
                        <label for="user">Usuário</label>
                    </div>

                    <div class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <input type="radio" name="conta" id="gym">
                        <label for="gym">Academia</label>
                    </div>   
                </div>
            </div>

            <x-form.text name="cpf" label="CPF" type="text"/>// para usuário comum 
            <x-form.text name="dataNasc" label="Data de nascimento" type="date"/>

           
            <x-form.text name="cnpj" label="CNPJ" type="text"/> //para academias
            <div class="grid grid-flow-col justify-stretch space-x-2">
                <x-form.text name="timeOpen" label="Horário de abertura" type="time"/>
                <x-form.text name="timeClose" label="Horário de fechamento" type="time"/>
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cadastre-se</button>
            </div>
        </form>
    </div>
</div>

    

@endsection
