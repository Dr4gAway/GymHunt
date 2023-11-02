@extends('layout.site')
@section('titulo', 'GymHunt - Exercícios')
@section('content') 

<div class="flex flex-col h-screen bg-gymhunt-purple-2 bg-[url('/public/img/backAvaliaçao.svg')]" x-data="{
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
            createMuscle: false,

            openCreateMuscle() {
                this.createMuscle = true,
                disableScroll()
            },

            closeCreateMuscle() {
                this.createMuscle = false 
                enableScroll()
            }, 
    }">
        <div class="flex flex-rol font-poppins space-x-3 ml-12 mx-8">
            <div class="flex gap-2 items-center cursor-pointer">
                <button id="createGroup" class="flex flex-col justify-center" x-on:click="openCreateMuscle()">
                    <i class="fa-solid fa-plus fa-lg rounded-full bg-gymhunt-purple-1 py-4 px-2"></i>
                </button>
                <label class="text-2xl text-black font-semibold" for="createGroup" >Adicionar grupo muscular</label>
            </div>

            {{-- Create Muscle Group Modal --}}
            <div class="fixed inset-0 flex flex-col w-screen h-screen p-8 gap-8 z-20" x-show="createMuscle">
                <!-- Overlay  -->
                <div class="bg-black bg-opacity-20 fixed inset-0 " x-on:click="closeCreateMuscle()"></div>

                <div class="flex flex-col self-center gap-8 w-full max-w-xl bg-white p-6 rounded-2xl z-20">
                    <div class="flex justify-between w-full font-bold text-lg">
                        <div>
                            <i class="fa-solid fa-plus"></i>
                            <span>Adicionar grupo muscular</span>
                        </div>
                        <button class="font-black" x-on:click="closeCreateMuscle()"> <i class="fa-solid fa-x"></i> </button>
                    </div>
                    
                    <x-form.text name="groupMusc" label="Grupo(s) Muscular(es)" placeholder="Escolha a categoria" />  <!--essa info vai para o nome do grupo -->

                    <div class="grid grid-flow-col justify-between space-x-2">
                        <button type="submit" x-on:click="closeCreateMuscle()" class="  justify-center rounded-lg bg-gymhunt-purple-2 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancelar</button>
                        <button type="submit" class="justify-center rounded-lg bg-gymhunt-purple-1 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mx-12">
            <p class="text-2xl font-semibold"><i class="fa-solid fa-circle"></i> Último mês</p>
            
            <div class="m-3">
                <button class="rounded-xl px-2 py-1 bg-slate-200 shadow-lg"><i class="fa-solid fa-chevron-down"></i> Quadríceps </button> <!--nome add no grupo muscular-->

                <livewire:exercise.timeline />     
            </div>   
        </div>
    </div>
</div>

@endsection