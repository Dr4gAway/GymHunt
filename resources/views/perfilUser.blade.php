@extends('layout.site')
@section('titulo', 'GymHunt - Perfil da Academia')
@section('content') 

<div class="flex flex-col w-full items-center bg-gymhunt-gray-1" x-data="{
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

    <div x-show="imageOpen">
        <livewire:carousel  />
    </div>

    <div x-show="editOpen">
        <livewire:post.update />
    </div>

    <img class="w-full h-[200px] object-cover" src="\img\banner.png" alt="">
    {{-- Start --}}
    <div class="flex flex-col gap-4 items-center max-w-[1280px] p-4">

        <div class="relative w-full h-[100px] flex justify-end items-center gap-4" x-data="{
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
            <img class="absolute top-0 left-0 -translate-y-1/2 aspect-square w-full sm:w-1/2 max-w-[200px] " src="\img\avatar.png" alt=""> 

            <div class="flex gap-4 h-full items-center">
                <button class="bg-gymhunt-purple-1 hover:bg-gymhunt-purple-2 text-white font-bold px-4 py-2 w-fit end rounded-md cursor-pointer">
                    Seguir
                </button>

                <button class="bg-gymhunt-purple-1 hover:bg-gymhunt-purple-2 text-white font-bold px-4 py-2 w-fit end rounded-md cursor-pointer" x-on:click="modalOpen()">
                    <i class="fa-solid fa-pencil"></i>
                    Editar perfil
                </button>
            </div>

            {{-- Edit Profile --}}
            <div class="fixed inset-0 flex flex-col items-center w-screen h-screen p-8 gap-8 z-20" x-show="configOpen">
                <!-- Overlay  -->
                <div class="bg-black bg-opacity-20 fixed inset-0" x-on:click="modalClose()"></div>

                <div class="flex flex-col w-full gap-4 bg-white p-6 rounded-2xl max-w-2xl z-20 overflow-scroll">
                    <div class="flex justify-between w-full">
                        <p class="font-bold text-lg"> <i class="fa-solid fa-pencil"></i> Editar perfil</p>    
                        <button class="font-bold text-lg" x-on:click="modalClose()">
                            <i class="fa-solid fa-x"></i>
                        </button>
                    </div>

                    <div class="grid grid-flow-col justify-items-center space-x-3">
                        <div class="relative w-24 h-24 rounded-full overflow-hidden">
                            <div class="absolute w-full h-full flex items-center justify-center bg-gymhunt-purple-2 bg-opacity-20">
                                <i class="fa-solid fa-pencil"></i>
                            </div>
                            <div class="bg-red-500 w-full h-full"></div>
                        </div>

                        <div class="relative w-96 h-24 rounded-2xl overflow-hidden">
                            <div class="absolute w-full h-full flex items-center justify-center bg-gymhunt-purple-2 bg-opacity-20">
                                <i class="fa-solid fa-pencil"></i>
                            </div>
                            <div class="bg-red-500 w-full h-full"></div>
                        </div>
                    </div>
                    
                    <div class="w-full h-1 bg-slate-950"></div>

                    <x-form.text name="name" label="Nome" placeholder="Digite seu nome completo" />  
                    <x-form.text name="email" label="Email" type="email" placeholder="ex: email@gmail.com"/>

                    <x-resizable-text placeholder="Biografia"/>

                    <div class="flex items-center gap-4">
                        <x-form.text class="w-full" name="timeOpen" label="Horário de abertura" type="time"/>
                        <x-form.text class="w-full" name="timeClose" label="Horário de fechamento" type="time"/>
                    </div>

                    <div class="flex items-center gap-4">
                        <x-form.text class="w-full" name="phone" label="Telefone" placeholder="ex: XXXXXXXXXXXXX"/>
                        <div class="w-full flex flex-col space-y-1 col-span-1">
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

            <!--alert-->
            <div class="absolute inset-0 w-full h-full flex justify-center items-center" x-show="menuAlert">
                {{-- Overlay --}}
                <div x-on:click="closeAlert()"
                     class="fixed inset-0 w-full h-full bg-gray-500 bg-opacity-20 transition-opacity z-20"></div>

                <div class="flex self-center justify-center gap-4 py-4 px-8 rounded-2xl items-center bg-white z-30">
                    <i class="fa-solid fa-triangle-exclamation fa-xl"></i>
                    <div class="flex flex-col w-fit">
                        <span class="font-bold">Você não pode editar esse campo</span>
                        <span>O CPF não é um campo editável</span>
                    </div>
                    <button x-on:click="closeAlert()" type="button"
                            class="w-fit rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500"
                    >
                        OK
                    </button>
                </div>
            </div>
        </div>

        <div class="w-full">
            <p class="font-bold text-4xl">{{$user->name}}</p>
            <div class="flex space-x-6">
                <a href="#" class="font-medium"><b>400</b> seguidores</a>
                <a href="#" class="font-medium"><b>690</b> seguindo</a>
                <div class="flex items-center gap-3">
                    <div class="flex items-center space-x-[-10px]">
                        <div class="rounded-full bg-blue-400 w-6 h-6 ring ring-white"></div>
                        <div class="rounded-full bg-blue-500 w-6 h-6 ring ring-white"></div>
                        <div class="rounded-full bg-blue-600 w-6 h-6 ring ring-white"></div>
                    </div>
                    <a href="#">Também seguem</a>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <span class="font-bold">
                Biografia
            </span>
            <span>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis blanditiis exercitationem earum deleniti molestiae. Error assumenda ipsam voluptas itaque quae, dicta, magni fuga aspernatur iure eveniet eligendi, aperiam cupiditate aliquam!
            </span>
        </div>
    </div> {{-- Wrapper 1280 --}}

    <div class="w-full">
        <div class="flex flex-row justify-center font-poppins font-medium text-2xl">
            <a href="{{route('perfilGym')}}" class="border-b-4 border-gymhunt-purple-2 text-gymhunt-purple-2 transition-all px-4 py-2 text-center">Atividade</a>
            <a href="#" class="hover:border-b-4 border-gymhunt-purple-2 hover:text-gymhunt-purple-2 transition-all px-4 py-2 text-center cursor-pointer">Galeria</a>
            {{-- <a href="{{route('avaliacoesGym')}}" class="hover:border-b-4 border-gymhunt-purple-2 hover:text-gymhunt-purple-2 transition-all px-4 py-2 text-center">Avaliações</a> --}}
            {{-- <a href="#" class="hover:border-b-4 border-gymhunt-purple-2 hover:text-gymhunt-purple-2 transition-all px-4 py-2 text-center">Sobre nós</a> --}}
        </div>

        <div class="w-full h-0.5 bg-slate-950"></div>
    </div>

    <div class="flex flex-col w-full max-w-[1280px] gap-4">
        <div class="flex gap-4">
            <div class="flex flex-col items-center w-full gap-4">
                @foreach ($user->posts as $post)
                    <livewire:post.view :post="$post">
                @endforeach
            </div>
    
            <div class="flex flex-col gap-4 items-center justify-center w-550 h-full p-4">
                <div class="bg-white rounded-lg p-4 px-8 text-center space-y-4">
                    <p class="text-gymhunt-purple-1 font-semibold text-2xl">Visitar academia</p>
                    <img class="rounded-lg border border-gymhunt-purple-1 aspect-square w-full" src="\img\Validação DayUse.png" alt="">
                    <a href="" class="text-gymhunt-purple-2 font-medium">Clique para gerar validação</a> <!--vai para tela de valiações-->
                </div>
    
                <div class="bg-white rounded-lg p-4 text-center space-y-4 w-full">
                    <p class="text-gymhunt-purple-1 font-semibold text-2xl">Localização </p>
                    <img class="rounded-lg border border-gymhunt-purple-1 aspect-video w-full object-cover" src="\img\image (1).png" alt="">
                    <a href="" class="text-gymhunt-purple-2 font-medium">Ver no mapa</a> <!--vai para tela de valiações-->
                </div>
    
                <div class="bg-white rounded-lg p-4 text-center space-y-4 w-full">
                    <p class="text-gymhunt-purple-1 font-semibold text-2xl">Avaliação </p>
                    <div class="">
                        <p class="font-semibold text-left">Comentário gerais</p>
                        <p class="rounded-lg p-2 border border-gymhunt-purple-2 line-clamp-6 text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus, aspernatur! Tempora, illo error assumenda porro temporibus enim</p>
                    </div>                
                    <a href="{{route('avaliacoesGym')}}" class="text-gymhunt-purple-2 font-medium">Ver mais avaliações</a> <!--vai para tela de valiações-->
                    <a href="{{route('comentario')}}"> <button class="bg-gymhunt-purple-2 text-lg py-2 px-3 rounded-2xl text-white font-medium my-4" x-on:click="modalOpen()"> <i class="fa-solid fa-ranking-star"></i> Deixe sua avaliação</button> </a>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-center w-full">
            <div class="w-full h-0.5 bg-gymhunt-purple-2"></div>
            <a href="#" class="text-gymhunt-purple-2 font-semibold text-lg px-2 w-fit">Veja mais publicações</a> <!--leva para a tela da galeria, somente publicações-->
            <div class="w-full h-0.5 bg-gymhunt-purple-2"></div>
        </div>
    </div>
    
</div>
@endsection