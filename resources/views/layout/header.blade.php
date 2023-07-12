<html>
    <head>
        <!-- Icones Font Awesome -->
        <script src="https://kit.fontawesome.com/189da14b09.js" crossorigin="anonymous"></script>
        <title>@yield('titulo')</title>
        <!-- Import tailwindCSS -->
        @vite('resources/css/app.css')
        @livewireStyles
    </head>

    <header class="px-8 h-[100px] bg-white shadow-lg font-poppins flex">
        <nav class="flex items-center justify-between w-full transition-all" aria-label="Global">
            <div class="flex items-center gap-8">
                <a href="/">
                    <img src="\img\logo.svg" alt="Gym hunt brand" class="h-12">
                </a>
                <a href="#" class="text-2xl leading-6 hover:border-b-4 border-black transition-all px-3 py-2">Home</a>
                <a href="#" class="text-2xl leading-6 hover:border-b-4 border-black transition-all px-3 py-2">Produto</a>
                <a href="#" class="text-2xl leading-6 hover:border-b-4 border-black transition-all px-3 py-2">Sobre nós</a>
            </div>  
            
            <div class="flex items-center justify-items-center gap-8">
                <a href="{{url('/login')}}" class="text-2xl outline-4 hover:ring ring-gymhunt-purple-1 rounded-2xl transition-all px-4 py-2">Login</a>
                <a href="#" class="w-[176px] h-12 text-2xl text-center bg-gymhunt-purple-1 rounded-2xl text-white px-4 py-2">Signup</a>
            </div>
        </nav>
    </header>

    <body>