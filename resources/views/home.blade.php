@extends('layout.site')
@section('titulo', 'GymHunt - Home')
@section('content')

<div class="flex flex-col justify-center my-12 px-6 py-4 lg:px-8">

    <div class="px-6 py-8 sm:py-8 lg:px-8 flex">
        <div class="py-10 space-y-8">
            <h1 class="text-8xl font-sans font-bold">Treine em qualquer lugar</h1>
            <p class="text-4xl font-sans font-semibold">Conheça o nosso sistema e treine na academia mais próxima com a melhor qualidade</p>
            <a href="#"> 
                <button class="text-2xl p-3 text-white uppercase bg-gymhunt-purple-2 border-solid border-zinc-400 border-1 my-5 rounded-lg">
                    Explore o mapa <b>da sua região</b> <i class="fa-solid fa-map-location-dot"></i> 
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

