<html class="min-h-screen">
    <head>
        <!-- Icones Font Awesome -->
        <script src="https://kit.fontawesome.com/189da14b09.js" crossorigin="anonymous"></script>
        <title>@yield('titulo')</title>

        <!-- Import Google Fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;700;900&display=swap" rel="stylesheet">

        <link rel="icon" href=".\img\logoIcon.png" >
        <!-- Import TailwindCSS -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Import AlpineJs -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.3/dist/cdn.min.js"></script>
        
        @livewireStyles

        @stack('custom-header')
    </head>

    <header class="text-base font-normal px-8 h-[100px] bg-white shadow-lg font-poppins flex">
        @auth
            <nav class="flex items-center justify-between w-full transition-all" aria-label="Global">
                {{-- <div class="flex items-center justify-center center justify-items-center gap-8 flex-grow">
                    <a href="/">
                        <img src="\img\logo.svg" alt="Gym hunt brand" class="h-12">
                    </a>
                    <form action="#" method="POST" class=" flex flex-row items-center font-bold text-white w-full bg-gymhunt-purple-2 rounded-2xl pl-4 h-12 gap-4">
                        <img src="\img\icons\search-icon.svg" alt="Search icon" class="h-6">
                        <input type="text" name="" id="" class="bg-transparent h-full">
                    </form>
                </div>   --}}

                <a href="/">
                    <img src="\img\logo.svg" alt="Gym hunt brand" class="h-12">
                </a>
                
                <div class="flex items-stretch justify-items-center gap-8">
                    <a href="{{route('feed')}}" class="flex items-center leading-6 hover:border-b-4 border-black transition-all px-3 py-2">
                        Feed
                    </a>
                    <a href="{{route('explore')}}" class="flex items-center leading-6 hover:border-b-4 border-black transition-all px-3 py-2">
                        Explorar
                    </a>

                    @php
                        $common = App\Models\Common::where('user_id', Auth::id())->count();
                    @endphp
                    @if ($common)
                    <a href="{{route('workoutlog')}}" class="flex items-center leading-6 hover:border-b-4 border-black transition-all px-3 py-2">
                        Workoutlog
                    </a>
                        <div class="relative" x-data="{
                            profileModal: false,
                        }">
                            <img x-on:click.away="profileModal = false" x-on:click="profileModal = !profileModal"
                                 src="/{{Auth::user()->avatar}}"
                                 class="object-cover aspect-square h-16 rounded-full cursor-pointer">
                            <ul x-show="profileModal"
                                class="absolute bg-white bottom-0 right-0
                                       flex flex-col gap-2 py-2 w-full text-center translate-y-full
                                       rounded-md shadow-lg">
                                <li class="hover:bg-gymhunt-purple-3 px-2 cursor-pointer">
                                    <a href="{{route('profile_common', Auth::id())}}">
                                        Perfil
                                    </a>
                                </li>
                                <li class="hover:bg-gymhunt-purple-3 px-2 cursor-pointer">
                                    <a wire:navigate href="/logout">
                                        Sair
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="relative" x-data="{
                            profileModal: false,
                        }">
                            <img x-on:click.away="profileModal = false" x-on:click="profileModal = !profileModal"
                                src="/{{Auth::user()->avatar}}"
                                class="object-cover aspect-square h-16 rounded-full cursor-pointer">
                            <ul x-show="profileModal"
                                class="absolute bg-white bottom-0 right-0
                                    flex flex-col gap-2 py-2 w-full text-center translate-y-full
                                    rounded-md shadow-lg">
                                <li class="hover:bg-gymhunt-purple-3 px-2 cursor-pointer">
                                    <a href="{{route('profile_gym', Auth::id())}}">
                                        Perfil
                                    </a>
                                </li>
                                <li class="hover:bg-gymhunt-purple-3 px-2 cursor-pointer">
                                    <a wire:navigate href="/logout">
                                        Sair
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endif
                        
                    {{-- <a href="/logout" wire:navigate class="text-center self-center bg-gymhunt-purple-1 rounded-2xl text-white px-4 py-2" ></a> --}}
                </div>
            </nav>
        @endauth

        @guest
            <nav class="flex items-center justify-between w-full transition-all">
                <div class="flex items-center gap-8">
                    <a href="/">
                        <img src="\img\logo.svg" alt="Gym hunt brand" class="h-12">
                    </a>
                    <a href="{{route('home')}}" class="text-2xl leading-6 hover:border-b-4 border-black transition-all px-3 py-2">Home</a>
                    <a href="#func" class="text-2xl leading-6 hover:border-b-4 border-black transition-all px-3 py-2">Produto</a>
                    <a href="#sobre" class="text-2xl leading-6 hover:border-b-4 border-black transition-all px-3 py-2">Sobre nós</a>
                </div>  
                
                <div class="flex items-center justify-center center gap-8">
                    <a href="{{route('login')}}" class="font-medium outline-4 hover:text-gymhunt-purple-1 hover:ring ring-gymhunt-purple-1 rounded-2xl transition-all px-4 py-2">Login</a>
                    <a href="{{route('signup')}}" class="w-[176px] h-12 text-2xl text-center bg-gymhunt-purple-1 rounded-2xl text-white px-4 py-2"><span>Sign Up</span></a>
                </div>
            </nav>
        @endguest
    </header>

    <body class="font-poppins bg-[#DFE6F9]">