@extends('layout.site')
@section('titulo', 'GymHunt - Home')
@section('content')

<section class="bg-gradient-to-t from-indigo-500 via-indigo-400 to-indigo-300 h-full flex flex-col">

    <div class="flex m-10 items-center">
        <div class="py-10">
            <h1 class="text-5xl font-medium font-sans ">Conheça nosso sistema, treine no academia mais próxima à você, em um ambiente de melhor qualidade!</h1>

            <a href="#"> 
                <button class="text-2xl p-3 bg-gradient-to-r from-indigo-600 to-gray-400 opacity-80 border-solid border-zinc-400 border-1 my-5 rounded-full">
                    Explore o mapa da sua região <i class="fa-solid fa-map-location-dot"></i> 
                </button>
            </a>
        </div>

        <div class="">
            <img src=".\img\mapa.png" alt="mapa ficticio" class="rounded-lg">
        </div>
    </div>
    
    <div class="self-center">
        <livewire:counter />
    </div>

</section>

@endsection

