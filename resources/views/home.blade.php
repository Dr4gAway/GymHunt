@extends('layout.site')
@section('titulo', 'GymHunt - Home')
@section('content')

<div class="flex flex-col justify-center my-12">
    <div class="flex">
        <div class="p-12 space-y-8">
            <div class="spcae-y-2">
                <p class="text-8xl font-sans font-bold">Treine</p>
                <p class="text-8xl font-sans font-bold">em qualquer lugar</p>
            </div>

            <p class="text-4xl font-sans font-semibold w-3/5">Conheça o nosso sistema e treine na academia mais próxima com a melhor qualidade</p>
            
            <a href="#"> 
                <button class="flex space-x-2 text-3xl p-7 tracking-widest text-white uppercase bg-gymhunt-purple-2 border-solid border-zinc-400 border-1 my-10 rounded-lg">
                    <i class="fa-solid fa-map-location-dot fa-2x"></i>
                    <div>
                        <p>Explore o mapa</p>
                        <b class="font-extrabold tracking-widest">da sua região</b>
                    </div>   
                </button>
            </a>
        </div>

        <div class="absolute top-0 z-[-1]">  
            <img src=".\img\ways-sided.png" width="5000px" alt="mapa ficticio" class="rounded-lg">
        </div>
    </div>

    <div class="flex bg-blue-500">
        <div class="p-12 space-y-8">
            <div class="spcae-y-2">
                <p class="text-8xl font-sans font-bold">Treine</p>
                <p class="text-8xl font-sans font-bold">em qualquer lugar</p>
            </div>

            <p class="text-4xl font-sans font-semibold w-3/5">Conheça o nosso sistema e treine na academia mais próxima com a melhor qualidade</p>
            
            <a href="#"> 
                <button class="flex space-x-2 text-3xl p-7 tracking-widest text-white uppercase bg-gymhunt-purple-2 border-solid border-zinc-400 border-1 my-10 rounded-lg">
                    <i class="fa-solid fa-map-location-dot fa-2x"></i>
                    <div>
                        <p>Explore o mapa</p>
                        <b class="font-extrabold tracking-widest">da sua região</b>
                    </div>   
                </button>
            </a>
        </div>

    
    </div>
    
    <div class="self-center">
        <livewire:counter />
    </div>

</div>

@endsection

