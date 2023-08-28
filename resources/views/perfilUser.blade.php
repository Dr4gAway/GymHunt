@extends('layout.site')
@section('titulo', 'GymHunt - Perfil')
@section('content') 

<div>

    <div class="relative">
        <div class="w-full h-[200px] bg-red-500">
            <img class="w-full" src=".\img\banner.png" alt="">
        </div>

        <div class="absolute bottom-[-60] left-0 translate-y-1/2 mx-12 flex items-end">
            <div class="rounded-full bg-green-500 w-64 h-64"></div>
            
            <div class="flex flex-col mx-5">
                <div class="flex flex-rol items-end space-x-5">
                    <h3 class="font-bold text-3xl">Gilmar dos Santos</h3>
                    <h6 class="text-lg">@gilmass</h6>
                </div>

                <div class="flex flex-rol items-end space-x-6 font-poppins">
                    <p class="font-medium"><b>400</b> seguidores</p>
                    <p class="font-medium"><b>690</b> seguindo</p>
                    <div class="flex flex-row items-center">
                        <div class="rounded-full bg-blue-200 w-8 h-8"></div>
                        <p>Seguidores em comum</p>
                    </div>
                </div>
                
                <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime, distinctio quos ipsum vero quod autem velit vel iure adipisci, tempore doloremque vitae necessitatibus amet repudiandae natus, quisquam obcaecati laboriosam unde.</span>
            </div>
        </div>
    </div>
    <div>
     
    </div>
</div>

<!-- <div class="flex flex-col justify-between">
    <div class="relative">
        
    </div>
    
    <div class=" absolute items-center mt-48 w-full flex flex-row">
        <div  class="">
            <img class="w-64" src=".\img\avatar.png" alt="">
        </div>
        
        <div class="w-full flex flex-row justify-between ">
            <div class="m-4 space-y-2">
                <div class="flex flex-rol items-end space-x-6 font-poppins">
                    <h3 class="font-bold text-3xl">Gilmar dos Santos</h3>
                    <h6 class="text-lg">@gilmass</h6>
                </div>

                <div class="flex flex-rol items-end space-x-6 font-poppins">
                    <p class="font-medium"><b>400</b> seguidores</p>
                    <p class="font-medium"><b>690</b> seguindo</p>
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
<div>
    ubgiwrbiwpgwr
</div> -->
@endsection