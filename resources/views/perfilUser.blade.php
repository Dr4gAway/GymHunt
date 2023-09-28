@extends('layout.site')
@section('titulo', 'GymHunt - Perfil')
@section('content')

<div class="flex w-full flex-col bg-gymhunt-gray-1 gap-4" x-data="{
    disableScroll() {
        scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
        window.onscroll = () => {
            window.scrollTo(scrollLeft, scrollTop);
        }
    },

    enableScroll() {
        window.onscroll = function() {};
    }
}">

    <div x-show="imageOpen">
        <livewire:carousel  />
    </div>

    <div x-show="editOpen">
        <livewire:post.update />
    </div>

    {{-- Profile Banner --}}
    <img src=".\img\banner.png" class="w-full h-[200px]" >

    <section class="flex justify-between items-center mx-8">

        <div class="flex items-center gap-4">
            {{-- Profile Image --}}
            <img src=".\img\avatar.png" alt="">   

            {{-- Followers --}}
            <div class="flex flex-col gap-2">
                <h3 class="font-bold text-3xl">{{$user->name}}</h3>

                <div class="flex  space-x-6">
                    <a href="#" class="font-medium"><b>400</b> seguidores </a>
                    <a href="#" class="font-medium"><b>690</b> seguindo </a>
                    <div class="flex items-center gap-3">
                        <div class="flex items-center space-x-[-10px]">
                            <div class="rounded-full bg-blue-400 w-6 h-6 ring ring-white "></div>
                            <div class="rounded-full bg-blue-500 w-6 h-6 ring ring-white"></div>
                            <div class="rounded-full bg-blue-600 w-6 h-6 ring ring-white"></div>
                        </div>
                        <a href="#">Também seguem</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-rol text-white gap-4 h-fit" x-data="{
            configOpen: false,
            menuAlert: false,

            toClipboard() {
                navigator.clipboard.writeText('localhost:8000/perfil')
            },

            modalOpen() {
                this.configOpen = true
                disableScroll()
            },

            modalClose() {
                this.configOpen = false 
                enableScroll()
            }, 

            openAlert(){
                this.menuAlert = true
            }, 

            closeAlert(){
                this.menuAlert = false
            }

        }"> 
            <button class="bg-gymhunt-purple-2 text-lg py-2 px-3 rounded-2xl">Seguir</button>
            <button class="bg-gymhunt-purple-2 text-lg py-2 px-3 rounded-2xl" x-on:click="modalOpen()"><i class="fa-solid fa-pencil"></i> Editar perfil</button>
            <button class="bg-gymhunt-purple-2 py-2 px-3 rounded-2xl"> <i class="fa-solid fa-ellipsis fa-lg"></i></button>

            <div class="fixed inset-0 flex flex-col w-screen h-screen p-8 gap-8 z-20" x-show="configOpen"> <!--tela do modal -->
                <!-- Overlay  -->
                <div class="bg-black bg-opacity-20 fixed inset-0 " x-on:click="modalClose()"></div>

                <!-- Trovar pra form em algum momento -->
                <div class="self-center w-full h-full flex bg-white p-6 rounded-2xl max-w-xl z-20 overflow-scroll ">

                    <div class="font-poppins text-black flex flex-col w-full gap-4 space-y-2">
                        <div class="grid grid-flow-col justify-between items-stretch space-x-3">
                            <p> <i class="fa-solid fa-pencil"></i> Editar perfil</p>
                            <button class="font-black" x-on:click="modalClose()"> <i class="fa-solid fa-x"></i> </button>
                        </div>

                        <div class="grid grid-flow-col justify-items-center space-x-3">
                            <div class="flex flex-col items-center space-y-2">
                                <div class="w-30 h-30"> <img class="w-full" src=".\img\avatar.png" alt=""></div>
                                <p> Escolher foto</p>         
                            </div>
                            <div class="flex flex-col items-center space-y-4">
                                <img class=" h-28 rounded-lg" src=".\img\image.png" alt="">
                                <p>Escolher foto</p>
                            </div>
                        </div>
                        
                        <div class="w-full h-0.5 bg-slate-950"></div>

                        <x-form.text name="name" label="Nome" placeholder="Digite seu nome completo" />  
                        <x-form.text name="email" label="Email" type="email" placeholder="ex: email@gmail.com"/>
                        <x-form.text name="bio" label="Biografia" type="textarea" placeholder=""/>
                        <x-form.text name="dataNasc" label="Data de nascimento" type="date"/>
                        <div class="grid grid-cols-2 justify-stretch space-x-2">
                            <x-form.text name="phone" label="Telefone" placeholder="ex: XXXXXXXXXXXXX"/>
                            <div class="flex flex-col space-y-1">
                                <p class="font-poppins font-bold text-lg">CPF</p>
                                <label class="p-1.5 rounded-md ring-1 ring-gray-300 shadow-xl bg-neutral-500 opacity-40" x-on:click="openAlert()">458.066.118-41</label>
                            </div>
                            <!-- <x-form.text class="disable:opacity-75" name="cpf" label="CPF" type="text"/> -->
                        </div>

                        <div class="grid grid-flow-col justify-between space-x-2">
                            <button type="submit" x-on:click="modalClose()" class="justify-center rounded-lg bg-gymhunt-purple-2 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancelar</button>
                            <button type="submit" class="justify-center rounded-lg bg-gymhunt-purple-1 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Salvar</button>
                        </div>
                    </div>  
                </div>
            </div> <!--fim do modal-->

            <!--alert-->
            <div class="relative z-20" x-show="menuAlert">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                <div class="fixed inset-0 z-10 overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center text-center sm:items-center sm:p-0">
                    
                    <div class="relative transform overflow-hidden  rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white p-4 sm:p-6 sm:pb-4">
                        <div class=" items-center justify-between sm:flex sm:items-start">
                            <div class="flex items-center justify-center rounded-full bg-red-100 text-red-500 sm:mx-0 sm:h-10 sm:w-10">
                                <i class="fa-solid fa-triangle-exclamation fa-xl"></i>
                            </div>

                            <div class="mt-3 space-y-2 justify-center text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900"  id="modal-title">Você não pode editar esse campo</h3>
                                <p class="text-base from-neutral-500 leading-6 text-gray-900" >O CPF não é um campo editável</p>
                            </div>

                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto" x-on:click="closeAlert()">OK </button>
                            </div>
                        </div>
                        </div>
                        
                    </div>
                    </div>
                </div>
            </div> <!-- fim do alert-->

        </div>
    </section>

    {{-- Publicações --}}
    <section class="mx-8 space-y-3">
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
    </section>
</div>

@endsection