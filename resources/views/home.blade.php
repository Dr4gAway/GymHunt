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

    <div class="flex justify-center m-16 text-gymhunt-purple-2">
        <a href="#func"><i class="fa-solid fa-angles-down fa-beat-fade fa-2xl"></i></a>
    </div>
    
    <a name="func"></a>
    <div class="m-12">
            <div class="">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"> Conheça mais funcionalidades do nosso sistema</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">Veja uma prévia do que você terá para navegar pelo site!</p>
            </div>
            <div class="grid grid-cols-1 gap-x-8 gap-y-10 border-t border-gymhunt-purple-2 pt-10 sm:mt-10 sm:pt-10 lg:mx-0 lg:max-w-none lg:grid-cols-3 ">
                <article class="flex flex-col justify-between bg-white shadow-2xl px-8 py-6 rounded-lg">
                    <div class="flex items-center gap-x-4 text-xs">
                        <img src=".\img\loc.png" alt="">
                    </div>
                    
                    <div class="group relative">
                        <h3 class="mt-3 text-xl text-center font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Localizador de academias
                            </a>
                        </h3>
                        <p class="mt-5 line-clamp-3 text-md text-center leading-6 text-gray-800">
                            No nosso sistema você pode ver a academia mais próxima de sua localização. No nosso sistema você pode ver a academia mais próxima de sua localização 
                        </p>
                    </div>

                    <div class="group relative">
                        <h6 class="text-md text-right leading-6 text-gray-800 group-hover:text-gray-500">
                            <a href="#">
                                <span class="absolute inset-0"></span> Ver mais
                            </a>
                        </h6>
                    </div>
                </article>

                <article class="flex flex-col justify-between bg-white shadow-2xl px-8 py-6 rounded-lg">
                    <div class="flex items-center gap-x-4 text-xs">
                        <img src=".\img\workout.png" alt="">
                    </div>
                    
                    <div class="group relative">
                        <h3 class="mt-3 text-xl text-center font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Registro de treinos
                            </a>
                        </h3>
                        <p class="mt-5 line-clamp-3 text-md text-center leading-6 text-gray-800">
                            No nosso sistema você pode ver a academia mais próxima de sua localização. No nosso sistema você pode ver a academia mais próxima de sua localização 
                        </p>
                    </div>

                    <div class="group relative">
                        <h6 class="text-md text-right leading-6 text-gray-800 group-hover:text-gray-500">
                            <a href="#">
                                <span class="absolute inset-0"></span> Ver mais
                            </a>
                        </h6>
                    </div>
                </article>

                <article class="flex flex-col justify-between bg-white shadow-2xl px-8 py-6 rounded-lg">
                    <div class="flex items-center gap-x-4 text-xs">
                        <img src=".\img\feed.png" alt="">
                    </div>
                    
                    <div class="group relative">
                        <h3 class="mt-3 text-xl text-center font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Comunidade
                            </a>
                        </h3>
                        <p class="mt-5 line-clamp-3 text-md text-center leading-6 text-gray-800">
                            No nosso sistema você pode ver a academia mais próxima de sua localização. No nosso sistema você pode ver a academia mais próxima de sua localização 
                        </p>
                    </div>

                    <div class="group relative">
                        <h6 class="text-md text-right leading-6 text-gray-800 group-hover:text-gray-500">
                            <a href="#">
                                <span class="absolute inset-0"></span> Ver mais
                            </a>
                        </h6>
                    </div>
                </article>
               
            </div>
            <!-- More posts... -->
    </div>

    <div class="m-12">
        <div class="flex flex-rol space-x-12">
            <div>
                <img src=".\img\workout.png"  alt="">
            </div>

            <div>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"> Por quê do GymHunt</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor odit eaque illum perspiciatis, non neque voluptate adipisci placeat harum culpa dolore, sunt quibusdam nihil tenetur iste? Ipsa nam odio velit!</p>
            </div>

        </div>
    </div>

    <div class="self-center">
        <livewire:counter />
    </div>

</div>

@endsection

