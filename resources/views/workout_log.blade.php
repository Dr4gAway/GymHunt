@extends('layout.site')
@section('titulo', 'GymHunt - Exercícios')
@section('content') 

<div class="flex flex-col h-full bg-gymhunt-purple-2 bg-[url('/public/img/backAvaliaçao.svg')]" x-data="{
    imageOpen: false,
    editOpen: false,

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
    <div x-data="{
            configOpen: false,
            menuExerc: false,

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

            openExerc(){
                this.menuExerc = true
            }, 

            closeExerc(){
                this.menuExerc = false
            }

    }">
        <div class="flex flex-rol font-poppins text-white space-x-3 ml-12 mx-8">
            <div class="">                     
                <button class="flex flex-row items-center space-x-3 m-4" x-on:click="modalOpen()">
                    <div class="rounded-full bg-gymhunt-purple-1 py-4 px-2 text-white">
                        <i class="fa-solid fa-plus fa-lg"></i>
                    </div>
                    <p class="text-2xl text-black font-semibold">Adicionar grupo muscular</p> 
                </button>

                <div class="fixed inset-0 flex flex-col w-screen h-screen p-8 gap-8 z-20" x-show="configOpen"> <!--tela do modal -->
                    <!-- Overlay  -->
                    <div class="bg-black bg-opacity-20 fixed inset-0 " x-on:click="modalClose()"></div>
                    <!-- create group -->
                    <livewire:group-musc.create />
                    
                </div> <!--fim do modal-->
            </div>
        </div>

        <div class="mx-12"> <!---->
            <p class="text-2xl font-semibold"><i class="fa-solid fa-circle"></i> Último mês</p>
            
            <div class="m-3">
                <div>
                    <button class="rounded-xl px-2 py-1 bg-slate-200 shadow-lg"><i class="fa-solid fa-chevron-down"></i> Quadríceps </button> <!--nome add no grupo muscular-->
                </div>

                <div class="flex flex-row space-x-5"> <!--cards de treino-->

                    <livewire:exercise.exercise-row /> 

                    <div class="flex justify-center items-center"> <!--cada card-->
                        <div class="flex flex-col justify-center items-center space-y-3">
                            <button class="rounded-xl border-dashed border-4 border-gymhunt-purple-1 bg-gymhunt-purple-2 opacity-60 shadow-lg p-4 my-4 h-48 w-72" x-on:click="openExerc()">
                                <div class="text-gymhunt-purple-1 font-bold text-2xl">
                                    <p>Adicionar</p>
                                    <p>Exercício!</p>
                                </div>
                            </button>

                            <div class="fixed inset-0 flex flex-col w-screen h-screen p-8 gap-8 z-20" x-show="menuExerc"> <!--tela do modal -->
                                <!-- Overlay  -->
                                <div class="bg-black bg-opacity-20 fixed inset-0 " x-on:click="closeExerc()"></div>

                                <!-- create exercice -->
                                <livewire:exercise.create />
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection