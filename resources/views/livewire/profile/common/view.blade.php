
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

    <img class="w-full h-[200px] object-cover" src="/{{$user->banner}}" alt="">
    
    {{-- Start --}}
    <div class="flex flex-col gap-4 items-center w-full max-w-[1280px] p-4">

        <div class="relative w-full h-[100px] flex justify-end items-center gap-4"> 
            <img class="absolute top-0 left-0 -translate-y-1/2 aspect-square rounded-full object-cover w-full sm:w-1/2 max-w-[200px] " src="/{{$user->avatar}}" alt=""> 
            
            <div class="flex gap-4 h-full items-center" x-data="{
                configOpen: false,
                menuAlert: false,
            
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
            
            }" @update::close="modalClose()">
            @if(Auth::user() == $user)
                <button class="bg-gymhunt-purple-1 hover:bg-gymhunt-purple-2 text-white font-bold px-4 py-2 w-fit end rounded-md cursor-pointer" x-on:click="modalOpen()">
                    <i class="fa-solid fa-pencil"></i>
                    Editar perfil
                </button>

                <livewire:profile.common.update :user="$user" />

            @elseif($following)
                <button wire:click="handleFollow()"
                    class="bg-gymhunt-purple-2 hover:bg-gymhunt-purple-2 text-white font-bold px-4 py-2 w-fit end rounded-md cursor-pointer">
                    Seguindo
                </button>
            @else
            <button wire:click="handleFollow()"
                    class="bg-gymhunt-purple-1 hover:bg-gymhunt-purple-2 text-white font-bold px-4 py-2 w-fit end rounded-md cursor-pointer">
                Seguir
            </button>
            @endif        
            </div>
        </div>

        <div class="w-full">
            <p class="font-bold text-4xl">{{$user->name}}</p>
            <div class="flex space-x-6">
                <a href="#" class="font-medium"><b>{{$this->followersCount}}</b> seguidores</a>
                <a href="#" class="font-medium"><b>{{$this->followingCount}}</b> seguindo</a>
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

        <div class="flex flex-col gap-2 w-full">
            <span class="font-bold">
                Biografia
            </span>
            <span>
                {{$user->about}}
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