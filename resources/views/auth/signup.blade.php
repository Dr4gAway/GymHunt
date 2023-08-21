@extends('layout.site')
@section('titulo', 'GymHunt - Cadastro')
@section('content') 

<div class="flex flex-col justify-center my-12 px-6 py-4 lg:px-8">
    
        <!-- <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
            
            <form class="space-y-6" action="{{route('signup')}}" method="POST">

                @csrf
                @method('POST')

                @error('invalid_credentials')
                    <p class="text-red-500"> {{$message}} </p>   
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
        </div> -->

    <div class="bg-white px-6 py-8 sm:py-8 lg:px-8">
        <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true">
            <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-2xl text-center">
            <img class="mx-auto w-auto" src=".\img\logoIcon.png" alt="Your Company">
            <h2 class="mt-4 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900"></h2>
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Faça seu cadastro</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">Ao realizar seu cadastro, você poderá explorar nosso site da melhor maneira!</p>
        </div>
        
        <form action="{{route('signup')}}" method="POST" class="mx-auto mt-10 max-w-xl sm:mt-14">
            @csrf

            @error('invalid_credentials')
                <p class="text-red-500"> {{$message}} </p>   
            @enderror

            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <div>
                    <label for="name" class="block text-sm font-semibold leading-6 text-gray-900">Primeiro nome</label>
                    <div class="mt-2.5">
                        <input type="text" name="name" id="name" autocomplete="given-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                
                <!-- <div>
                    <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Apelido</label>
                    <div class="mt-2.5">
                        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div> -->
                
                <div class="sm:col-span-2">
                    <label for="phone" class="block text-sm font-semibold leading-6 text-gray-900">Telefone</label>
                    <div class="mt-2.5">
                        <input type="text" name="phone" id="telefone" placeholder="ex: +55 (XX) XXXXX-XXXX"  class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                
                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
                    <div class="mt-2.5">
                        <input type="email" name="email" id="email" placeholder="ex: seuemail@gmail.com.br" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="password" class="block text-sm font-semibold leading-6 text-gray-900">Senha</label>
                    <div class="mt-2.5">
                        <input type="password" name="password" id="password"  class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="password_confirmation" class="block text-sm font-semibold leading-6 text-gray-900">Confirme sua senha</label>
                    <div class="mt-2.5">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <!-- <div class="sm:col-span-2 space-y-3">
                    <label for="password" class="block text-sm font-semibold leading-6 text-gray-900">Insira suas imagens</label>
                    <div class="sm:col-span-2">
                        <label for="banner" class="block text-sm font-semibold leading-6 text-gray-900">1. Banner</label> 
                        <div class="mt-2.5">
                            <input type="file" name="banner" id="banner" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="avatar" class="block text-sm font-semibold leading-6 text-gray-900">2. Avatar</label>
                        <div class="mt-2.5">
                            <input type="file" name="avatar" id="avatar" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>
                

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

                <!-- para users 
                se for usuario 
                <div class="sm:col-span-2">
                    <label for="cpf" class="block text-sm font-semibold leading-6 text-gray-900">CPF</label>
                    <div class="mt-2.5">
                        <input type="text" name="phone" id="telefone" placeholder="ex: XXX.XXX.XXX-XX"  class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="dataNasc" class="block text-sm font-semibold leading-6 text-gray-900">Data de nascimento</label>
                    <div class="mt-2.5">
                        <input type="date" name="dataNasc" id="dataNasc" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <!-- para academias 
                se for academia
                <div class="sm:col-span-2">
                    <label for="cnpj" class="block text-sm font-semibold leading-6 text-gray-900">CNPJ</label>
                    <div class="mt-2.5">
                        <input type="text" name="cnpj" id="cnpj" placeholder="ex: XXX.XXX.XXX-XX"  class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-2 space-y-3">
                    <label for="horario" class="block text-sm font-semibold leading-6 text-gray-900">Horários de funcionamento</label>
                    <div class="mt-2.5 flex justify-between">
                        <div class="mt-2">
                            <label for="horarioAb">Horário de abertura</label>
                            <input type="time" name="horarioAb" id="horarioAb" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>

                        <div class="mt-2">
                            <label for="horarioF">Horário de fechamento</label>
                            <input type="time" name="horarioF" id="horarioF" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="obs" class="block text-sm font-semibold leading-6 text-gray-900">Observação</label>
                        <div class="mt-2.5">
                            <input type="text" name="obs" id="obs" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>

                <div class="flex gap-x-4 sm:col-span-2">
                    <div class="flex h-6 items-center">
                    <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" 
                        <button type="button" class="bg-gray-200 flex w-8 flex-none cursor-pointer rounded-full p-px ring-1 ring-inset ring-gray-900/5 transition-colors duration-200 ease-in-out focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" role="switch" aria-checked="false" aria-labelledby="switch-1-label">
                            <span class="sr-only">Agree to policies</span>
                            <!-- Enabled: "translate-x-3.5", Not Enabled: "translate-x-0" 
                            <span aria-hidden="true" class="translate-x-0 h-4 w-4 transform rounded-full bg-white shadow-sm ring-1 ring-gray-900/5 transition duration-200 ease-in-out"></span>
                        </button>
                    </div>

                    <label class="text-sm leading-6 text-gray-600" id="switch-1-label">
                        Ao selecionar isso, você concorda com nossa
                        <a href="#" class="font-semibold text-indigo-600">política de privacidade</a>.
                    </label>
                </div>
            </div> -->

            <div class="mt-10">
                <button type="submit" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cadastre-se</button>
            </div>
        </form>
    </div>
</div>

    

@endsection
