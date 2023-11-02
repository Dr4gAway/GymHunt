
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

    @push('custom-header')
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
    @endpush

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

                <livewire:profile.gym.update :user="$user" :gym="$gym" />

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
            <div class="flex items-center gap-4">
                <p class="font-bold text-4xl">{{$user->name}}</p>
                <span class="bg-gymhunt-purple-1 text-md h-fit font-bold text-white py-1 px-2 rounded-lg">
                    Academia
                </span>
            </div>
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
            <a href="#" class="border-b-4 border-gymhunt-purple-2 text-gymhunt-purple-2 transition-all px-4 py-2 text-center">Atividade</a>
            <a href="#" class="hover:border-b-4 border-gymhunt-purple-2 hover:text-gymhunt-purple-2 transition-all px-4 py-2 text-center cursor-pointer">Galeria</a>
            <a href="#" class="hover:border-b-4 border-gymhunt-purple-2 hover:text-gymhunt-purple-2 transition-all px-4 py-2 text-center cursor-pointer">Sobre nós</a>
        </div>

        <div class="w-full h-0.5 bg-slate-950"></div>
    </div>

    {{-- Atividade --}}
    <div class="flex flex-col w-full max-w-[1280px] gap-4 p-4">
        <div class="flex gap-4">
            <div class="flex flex-col items-center w-full gap-4">
                @if($this->user->id == Auth::id())
                <div class="max-w-[662px] w-full">
                    <livewire:post.create />
                </div>
                @endif
                @if($user->posts->count() > 0)
                    @foreach ($this->posts as $post)
                        <livewire:post.view :post="$post" wire:key="post-{{$post->id}}">
                    @endforeach

                    @if(!$this->posts->onLastPage())
                        <div x-data="{
                            infinityScroll() {
                                const observer = new IntersectionObserver((items) => {
                                    items.forEach((item) => {
                                        if(item.isIntersecting)
                                            @this.loadMore();
                                    })
                                }, {
                                    rootMargin: '300px'
                                })
                                observer.observe(this.$el)
                            },
                        }" x-init="infinityScroll()" class="w-6 h-6">
                        </div>
                    @endif
                @else
                    <h3 class="text-gymhunt-purple-1 font-bold text-5xl">Nenhum post ainda!</h3>
                    <span class="font-bold">Parece que este usuário ainda não disse nada...</span>
                @endif
            </div>
            
            <div class="bg-white rounded-lg p-4 text-center space-y-4 w-full h-fit  max-w-md">
                <p class="text-gymhunt-purple-1 font-semibold text-2xl">Localização</p>
                <div id='map' class="w-full aspect-video" wire:ignore></div>
            </div>
        </div>


        <div class="flex items-center justify-center w-full">
            <div class="w-full h-0.5 bg-gymhunt-purple-2"></div>
            <a href="#" class="text-gymhunt-purple-2 font-semibold text-lg px-2 w-fit">Veja mais publicações</a> <!--leva para a tela da galeria, somente publicações-->
            <div class="w-full h-0.5 bg-gymhunt-purple-2"></div>
        </div>
    </div>

    {{-- Galeria --}}

    {{-- Sobre nós --}}

    @push('custom-scripts')
        <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>

        <script defer>
            const ACCESS_TOKEN = 'pk.eyJ1IjoiZHI0Z2F3YXkiLCJhIjoiY2xtdnc2YjdnMG1nNzJpcGNiaDI4aXAzcSJ9.9XTO-r1_cZp9p51MazueCw';

            mapboxgl.accessToken = ACCESS_TOKEN;
            const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: ["{{$this->gym->longitude}}", "{{$this->gym->latitude}}"],
                zoom: 15
            });

            const marker = new mapboxgl.Marker().setLngLat(["{{$this->gym->longitude}}", "{{$this->gym->latitude}}"])

            window.addEventListener('map::updated', (request) => {

                marker.remove()
                marker.setLngLat([request.detail[0], request.detail[1]])
                marker.addTo(map)

                map.flyTo({center: [request.detail[0], request.detail[1]]})
            })

            marker.addTo(map);
        </script>
    @endpush    
</div>