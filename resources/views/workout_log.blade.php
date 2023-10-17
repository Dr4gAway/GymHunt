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

                    <!-- Trocar pra form em algum momento -->
                    <div class="self-center w-full flex bg-white p-6 rounded-2xl max-w-xl z-20">

                        <div class="font-poppins text-black flex flex-col w-full gap-4 space-y-3">
                            <div class="grid grid-flow-col justify-between items-stretch space-x-3">
                                <p> <i class="fa-solid fa-plus"></i> Adicionar grupo muscular</p>   
                                <button class="font-black" x-on:click="modalClose()"> <i class="fa-solid fa-x"></i> </button>
                            </div>
                            
                            <x-form.text name="groupMusc" label="Grupo(s) Muscular(es)" placeholder="Escolha a categoria" />  <!--essa info vai para o nome do grupo -->

                            <div class="grid grid-flow-col justify-between space-x-2">
                                <button type="submit" x-on:click="modalClose()" class="  justify-center rounded-lg bg-gymhunt-purple-2 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancelar</button>
                                <button type="submit" class="justify-center rounded-lg bg-gymhunt-purple-1 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Salvar</button>
                            </div>
                        </div>  
                    </div>
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

                    <div class="rounded-xl bg-white shadow-lg p-4 my-4 w-72"> <!--cada card-->
                        <div class="flex flex-row items-center justify-between mb-2"> <!--nome do exercicio-->
                            <p class="font-semibold">Leg Press </p>
                            <div class="text-red-500"> <i class="fa-solid fa-trash-can"></i> </div>
                        </div>

                        <div class="space-y-3"> <!--infos-->
                            <div class="flex flex-row justify-between">
                                <p>Série</p>
                                <p>5</p>
                            </div>

                            <div class="flex flex-row justify-between">
                                <p>Repetições</p>
                                <p>8</p>
                            </div>

                            <div class="flex flex-row justify-between">
                                <p>Carga</p>
                                <p>30 kg</p>
                            </div>

                            <div class="flex flex-row justify-between">
                                <p>Data</p>
                                <p>05/03/2023</p>
                            </div>
                        </div>
                    </div>

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