@extends('layout.site')
@section('titulo', 'GymHunt - Perfil')
@section('content') 
<div class="flex flex-col justify-between">
    <div class="">
        <img class="w-full" src=".\img\banner.png" alt="">
    </div>
    
    <div class="w-full flex flex-row">
        <img class="w-64" src=".\img\avatar.png" alt="">

        <div class="w-full flex flex-row justify-between ">
            <div class="m-4 space-y-2">
                <div class="flex flex-rol items-end space-x-6 font-poppins">
                    <h3 class="font-bold text-3xl">Gilmar dos Santos</h3>
                    <h6 class="text-lg">@gilmass</h6>
                </div>

                <div class="flex flex-rol items-end space-x-6 font-poppins">
                    <p>400 seguidores</p>
                    <p>698 seguindo</p>
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
</div>
@endsection