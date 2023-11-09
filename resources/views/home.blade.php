@extends('layout.site')
@section('titulo', 'GymHunt - Home')
@section('content')

<div class="flex flex-col justify-center">
    <div class="flex">
        <div class="p-12 space-y-8">
            <div class="spcae-y-2">
                <p class="sm:text-4xl md:text-6xl lg:text-8xl font-poppins font-bold">Treine</p>
                <p class="sm:text-4xl md:text-6xl lg:text-8xl font-poppins font-bold">em qualquer lugar</p>
            </div>

            <p class="sm:text-xl md:text-2xl lg:text-4xl font-poppins text-slate-600 font-medium w-3/5">Conheça o nosso sistema e treine na academia mais próxima com a melhor qualidade</p>

            <a href="{{route('explore')}}">
                <button class="flex space-x-2 sm:text-md md:text-xl lg:text-3xl p-7 tracking-widest text-white uppercase bg-gymhunt-purple-2 hover:bg-white hover:text-gymhunt-purple-2 hover:ring-4 hover:ring-gymhunt-purple-2 border-solid border-1 my-10 rounded-lg">
                    <i class="fa-solid fa-map-location-dot fa-2x"></i>
                    <div>
                        <p>Explore o mapa</p>
                        <b class="font-extrabold tracking-widest">da sua região</b>
                    </div>
                </button>
            </a>
        </div>

        <div class="right-0 absolute top-0 z-[-1]">
            <img src=".\img\ways-sided.png" alt="mapa ficticio" class="sm:w-96 md:w-[550px] lg:w-[940px] rounded-lg">
        </div>
    </div>

    <div class="flex justify-center m-16 text-gymhunt-purple-2">
        <a href="#func"><i class="fa-solid fa-angles-down fa-beat-fade fa-2xl"></i></a>
    </div>

    <a name="func"></a>
    <div class="m-12">
            <div class="">
                <h2 class="sm:text-xl md:text-2xl lg:text-3xl font-bold tracking-tight text-gray-900"> Conheça mais funcionalidades do nosso sistema</h2>
                <p class="mt-2 sm:text-md md:text-lg lg:text-xl leading-8 text-gray-600">Veja uma prévia do que você terá para navegar pelo site!</p>
            </div>
            <div class="flex justify-center space-x-5 gap-x-1 gap-y-10 border-t border-gymhunt-purple-2 pt-10 sm:mt-10 sm:pt-10 lg:mx-0 lg:max-w-none lg:grid-cols-3 ">
                <article class="flex flex-col w-fit bg-white shadow-2xl px-8 py-6 rounded-lg">
                    <div class="flex items-center gap-x-1 text-xs">
                        <img src=".\img\pub.png" alt=""> <!--imagens devem ter tamanho 400x468-->
                    </div>

                    <div class="space-y-3">
                        <h3 class="mt-3 sm:text-2xl md:text-2xl lg:text-xl text-center font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                            Localizador de academias
                        </h3>
                        
                        <p class="max-w-sm sm:text-md md:text-lg lg:text-xl line-clamp-3 text-center leading-6 text-gray-800">Localize a academia mais próxima de sua você, além de ver suas avaliações.</p>
                    </div>
                </article>

                <article class="flex flex-col w-fit bg-white shadow-2xl px-8 py-6 rounded-lg">
                    <div class="flex items-center gap-x-1 text-xs">
                        <img src=".\img\registerGym.png" alt="">
                    </div>

                    <div class="space-y-3">
                        <h3 class="mt-3 sm:text-2xl md:text-2xl lg:text-xl text-center font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                            Registro de Treinos
                        </h3>
                        
                        <p class="max-w-sm sm:text-md md:text-lg lg:text-xl line-clamp-3 text-center leading-6 text-gray-800">Registre seus treinos diariamente e tenha maior controle da sua evolução!</p>
                    </div>
                </article>

                <article class="flex flex-col w-fit bg-white shadow-2xl px-8 py-6 rounded-lg">
                    <div class="flex items-center gap-x-1 text-xs">
                        <img src=".\img\pub.png" alt="">
                    </div>

                    <div class="space-y-3">
                        <h3 class="mt-3 sm:text-2xl md:text-2xl lg:text-xl text-center font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                            Comunidade de GymBro's
                        </h3>
                        
                        <p class="max-w-sm sm:text-md md:text-lg lg:text-lg line-clamp-3 text-center leading-6 text-gray-800">Facilita a comunicação com a comunidade a qual apresentam um objetivo em comum.</p>
                    </div>

                </article>

                

            </div>
            <!-- More posts... -->
    </div>
    <a name="sobre"></a>
    <div class="m-12">
        <div class="flex flex-rol justify-center space-x-16">
            <div>
                <img width="700px" src=".\img\bannerHome.png"  alt="">
            </div>

            <div class="max-w-2xl space-y-8 bg-white shadow-2xl px-8 py-6 rounded-lg">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"> Por quê do GymHunt?</h2>
                <p class="sm:text-md md:text-lg lg:text-xl line-clamp-10 leading-loose text-justify font-poppins">
                    A nossa plataforma foi desenvolvida como uma forma de expandir e facilitar o acesso a diferentes academias, 
                    nela o usuário tem a posibilidade de navegar para encontrar os estabelecimentos que desejar frequentar e realizar 
                    atividades físicas onde estiver, sem a necessidade de prender-se a uma única localização e academia.
                </p>
            </div>

        </div>
    </div>

    <footer class="bg-gymhunt-purple-2">
       <div class="flex justify-between space-x-8 mx-10 py-5 bottom-0">
            <div class="space-y-3">
                <img src="\img\logo.svg" alt="Gym hunt brand" class="h-16">
                <div class="sm:text-sm md:text-md lg:text-lg">
                    <p>Plataforma unificada que localiza academias </p>
                    <p>e auxilia no seu cotidiano</p>
                </div>
            </div>

            <div class="space-y-3 sm:text-sm md:text-md lg:text-lg">
                <h4 class="font-semibold">Precisa de ajuda?</h4>
                <div class="flex flex-col place-items-center space-y-2">
                    <a href="{{URL::asset('/documents/help.pdf')}}" download="Help do sistema" class="hover:border-b-2">Help do sistema</a>
                </div>
            </div>

            <div class="space-y-3 sm:text-sm md:text-md lg:text-lg">
                <h4 class="font-semibold">Navegue para</h4>
                <div class="flex flex-col place-items-center space-y-2">
                    <a href="{{route('home')}}" " class="hover:border-b-2">Home</a>
                    <a href="{{route('feed')}}" class="hover:border-b-2">Feed</a>
                    <a href="{{route('feed')}}" " class="hover:border-b-2">Mapa</a>
                </div>
            </div>

            <div class="space-y-5 flex flex-col place-items-center">
                <h4 class="font-semibold">Contate-nos</h4>
                <a class="hover:border-b-2" href="mailto:equipegymhunt@gmail.com"> equipegymhunt@gmailcom</a>
            </div> 
       </div>
    </footer>

</div>





<div id="modal" x-show="openMenu()">
    <!-- Código modal foda -->
</div>

@endsection

