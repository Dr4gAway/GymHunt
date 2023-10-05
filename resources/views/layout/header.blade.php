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
                <div class="flex items-center justify-center center justify-items-center gap-8 flex-grow pr-8">
                    <a href="/">
                        <img src="\img\logo.svg" alt="Gym hunt brand" class="h-12">
                    </a>
                    <form action="#" method="POST" class=" flex flex-row items-center font-bold text-white w-full bg-gymhunt-purple-2 rounded-2xl pl-4 h-12 gap-4">
                        <img src="\img\icons\search-icon.svg" alt="Search icon" class="h-6">
                        <input type="text" name="" id="" class="bg-transparent h-full">
                    </form>
                </div>  
                
                <div class="flex items-center justify-items-center gap-8">
                    <a href="{{route('feed')}}" class="text-2xl leading-6 hover:border-b-4 border-black transition-all px-3 py-2">Feed </a>
                    <a href="#" class="text-2xl leading-6 hover:border-b-4 border-black transition-all px-3 py-2">Explorar</a>
                    <a href="#" class="text-2xl leading-6 hover:border-b-4 border-black transition-all px-3 py-2">Exercícios</a>
                    
                    <form action="{{url('/logout')}}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="submit" class="w-[176px] h-12 text-2xl text-center bg-gymhunt-purple-1 rounded-2xl text-white px-4 py-2" value="Sair">
                    </form>
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