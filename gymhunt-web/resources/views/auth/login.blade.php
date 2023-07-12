@extends('layout.site')
@section('titulo', 'GymHunt - Home')
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

                <div>
                    <label for="email" class="block text-lg font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="text" autocomplete="email"  value="{{old('email')}}" class="block w-full rounded-md border-0 p-1.5 text-gray-900 drop-shadow-xl ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder=" ex.: seuemail@gmail.com.br">
                    </div>
                    @error('email')
                        <p class="text-red-500"> {{$message}} </p>   
                    @enderror
                </div>

                <div>
                    
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-lg font-medium leading-6 text-gray-900">Senha</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Esqueceu a senha?</a>
                        </div>
                    </div>
               
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" value="{{old('password')}}" class="block w-full rounded-md border-0 p-1.5 text-gray-900 drop-shadow-xl ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('password')
                        <p class="text-red-500"> {{$message}} </p>   
                    @enderror
                </div>

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