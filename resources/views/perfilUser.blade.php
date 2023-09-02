@extends('layout.site')
@section('titulo', 'GymHunt - Perfil')
@section('content') 

<div class="flex flex-col justify-between bg-gymhunt-gray-1"> <!-tela inteira->
    <div class="w-full h-[200px]">
        <img class="w-full" src=".\img\banner.png" alt="">
    </div>
    
    <div class="items-center w-full flex flex-row"> <!-header infos do perfil->
        <div class="ml-12 w-60 h-60"> <img class="w-full" src=".\img\avatar.png" alt=""> </div>         
        
        <div class="w-full flex flex-row justify-between ">
            <div class="m-4 space-y-2">
                <div class="flex flex-rol items-end space-x-6 font-poppins">
                    <h3 class="font-bold text-3xl">Gilmar dos Santos</h3>
                </div>

                <div class="flex flex-rol items-end space-x-6 font-poppins">
                    <p class="font-medium"><b>400</b> seguidores</p>
                    <p class="font-medium"><b>690</b> seguindo</p>
                    <div class="flex flex-row items-center space-x-2">
                        <div class="rounded-full bg-blue-400 w-6 h-6"></div>
                        <p>Seguidores em comum</p>
                    </div>
                </div>
            </div>
    
            <div class="flex flex-rol font-poppins text-white space-x-3 my-4 mx-6">
                <div>
                    <button class="bg-gymhunt-purple-2 text-lg py-2 px-3 rounded-2xl">. . .</button>
                </div>

                <div>
                    <button class="bg-gymhunt-purple-2 text-lg py-2 px-3 rounded-2xl">Seguir</button>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-12 space-y-3 font-poppins">
        <p class="line-clamp-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda facere inventore tempore iusto reiciendis at odio, tempora asperiores mollitia eum corrupti modi quos eaque sit error quaerat rem sequi iure!</p> 
        <div class="flex flex-rol items-end space-x-8 space-y-2" >
            <p> <i class="fa-solid fa-location-dot"></i> Bauru - SP </p>
            <p> <i class="fa-regular fa-calendar-days"></i> Desde 28 de fevereiro de 2023</p>  <!-- data de inclusão  -->
        </div>

        <div class="w-full h-0.5 bg-slate-950"></div>

        <div class="grid grid-cols-4 gap-4 mb-96-">
            <a href="#"> <img class="w-550" src=".\img\image.png" alt=""></a>
            <a href="#"> <img class="w-550" src=".\img\image (1).png" alt=""></a>
            <a href="#"> <img class="w-550" src=".\img\image.png" alt=""></a>
            <a href="#"> <img class="w-550" src=".\img\image (1).png" alt=""></a>
            <a href="#"> <img class="w-550" src=".\img\image.png" alt=""></a>
            <a href="#"> <img class="w-550" src=".\img\image (1).png" alt=""></a>
            <a href="#"> <img class="w-550" src=".\img\image.png" alt=""></a>
            <a href="#"> <img class="w-550" src=".\img\image (1).png" alt=""></a>
            <a href="#"> <img class="w-550" src=".\img\image.png" alt=""></a>
            <a href="#"> <img class="w-550" src=".\img\image (1).png" alt=""></a>
            <a href="#"> <img class="w-550" src=".\img\image.png" alt=""></a>
        </div>
    </div>
</div>

@endsection