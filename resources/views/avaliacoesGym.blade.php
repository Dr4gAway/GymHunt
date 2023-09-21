@extends('layout.site')
@section('titulo', 'GymHunt - Avaliações da Academia')
@section('content') 

<div class="flex flex-col justify-between bg-gymhunt-gray-1" x-data="{
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
}"> <!-tela inteira->

    <div class="w-full h-[200px]">
        <img class="w-full" src=".\img\banner.png" alt="">
    </div>
    
    <div class="items-center w-full flex flex-row"> <!-header infos do perfil->
        <div class="ml-12 w-60 h-50"> <img class="w-full" src=".\img\avatar.png" alt=""> </div>         
        
        <div class="w-full flex flex-row justify-between ">
            <div class="m-4 space-y-2">
                <div class="flex flex-row items-center space-x-4 font-poppins">
                    <p class="font-bold text-4xl">Origamid</p>
                    <div>
                        <h3 class="text-gymhunt-purple-2 text-xl"> <i class="fa-regular fa-star"></i> 4.5  </h3>
                    </div> 
                </div>
            </div>
    
            <div class="flex flex-rol font-poppins text-white space-x-3 my-4 mx-6">
                <div class="" x-data="{
                    configOpen: false,
                    menuAlert: false,

                    toClipboard() {
                        navigator.clipboard.writeText('localhost:8000/perfil')
                    },

                    modalOpen() {
                        this.configOpen = true,
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

                    <div class="fixed inset-0 flex flex-col w-screen h-screen p-8 gap-8 z-20" x-show="configOpen"> <!--tela do modal -->
                        <!-- Overlay  -->
                        <div class="bg-black bg-opacity-20 fixed inset-0 " x-on:click="modalClose()"></div>

                        <!-- Trovar pra form em algum momento -->
                        <div class="self-center w-full flex bg-white p-6 rounded-2xl max-w-xl z-20">

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
                                <x-form.text name="bio" label="Endereço" type="textarea" placeholder=""/>
                                <div class="grid grid-cols-2 justify-stretch space-x-2">
                                    <x-form.text name="timeOpen" label="Horário de abertura" type="time"/>
                                    <x-form.text name="timeClose" label="Horário de fechamento" type="time"/>
                                </div>
                                <div class="grid grid-cols-2 justify-stretch space-x-2 w-full">
                                    <x-form.text name="phone" label="Telefone" placeholder="ex: XXXXXXXXXXXXX"/>
                                    <div class="flex flex-col space-y-1 col-span-1">
                                        <p class="font-poppins font-bold text-lg">CNPJ</p>
                                        <label class="p-1.5 rounded-md ring-1 ring-gray-300 shadow-xl bg-neutral-500 opacity-40" x-on:click="openAlert()">458.066.118-41</label>
                                    </div>
                                </div>

                                <div class="grid grid-flow-col justify-between space-x-2">
                                    <button type="submit" x-on:click="modalClose()" class="  justify-center rounded-lg bg-gymhunt-purple-2 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancelar</button>
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
                                        <p class="text-base from-neutral-500 leading-6 text-gray-900" >O CNPJ não é um campo editável</p>
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
            </div>
        </div>
    </div>

    <div class="mx-12 font-poppins"> <!--publicações -->
        <div class="flex flex-row justify-center font-poppins font-medium text-2xl">
            <a href="{{route('perfilGym')}}" class="hover:border-b-4 border-gymhunt-purple-2 hover:text-gymhunt-purple-2 transition-all px-4 py-2 text-center">Atividade</a>
            <a class="hover:border-b-4 border-gymhunt-purple-2 hover:text-gymhunt-purple-2 transition-all px-4 py-2 text-center">Galeria</a>
            <a href="{{route('avaliacoesGym')}}" class="border-b-4 border-gymhunt-purple-2 text-gymhunt-purple-2 transition-all px-4 py-2 text-center">Avaliações</a>
            <a class="hover:border-b-4 border-gymhunt-purple-2 hover:text-gymhunt-purple-2 transition-all px-4 py-2 text-center">Sobre nós</a>
        </div>

        <div class="w-full h-0.5 bg-slate-950"></div>
        <div class="flex justify-end">
            <button class="bg-gymhunt-purple-2 text-lg py-2 px-3 rounded-2xl text-white font-medium my-4" x-on:click="modalOpen()">Deixe sua avaliação</button>
        </div>

        <div class="w-940 flex flex-rol justify-center bg-white">
            <div class="flex justify-center">
                <p class="">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae tempore iusto provident. Neque culpa maxime eveniet, ipsam rem, sed nihil sapiente odio, dolor accusamus perferendis iure distinctio autem sit veniam.</p>

            </div>
        </div>

        <div class="flex flex-rol justify-center space-x-8 m-10">
            <div class="bg-yellow-500 p-4"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed beatae rerum quaerat quasi et animi reiciendis, praesentium ab adipisci ex enim, nam mollitia excepturi qui. Debitis perspiciatis quas eveniet asperiores!</div>
            
        </div>



    
    </div>

    <div class="flex items-center justify-center m-4">
        <div class="w-1/4 h-0.5 bg-gymhunt-purple-2"></div>
        <a href=""> <p class="text-gymhunt-purple-2 font-semibold text-lg px-2">Veja mais publicações</p> </a> <!--leva para a tela da galeria, somente publicações-->
        <div class="w-1/4 h-0.5 bg-gymhunt-purple-2"></div>
    </div>
</div>




@endsection