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

        <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
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

    <body class="font-poppins bg-[#DFE6F9] max-h-screen overflow-y-hidden">

        <div id='map' class="w-full max-h-screen h-screen overflow-y-hidden relative">
            <div class="absolute z-10 top-4 left-4 flex flex-col gap-4 font-poppins">
                <livewire:gym.view />
                <livewire:gym.view />
                <livewire:gym.view />

            </div>
        </div>

        @livewireScripts        
    </body>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
    <script id="search-js" defer="" src="https://api.mapbox.com/search-js/v1.0.0-beta.17/web.js"></script>

    <script>
        const ACCESS_TOKEN = 'pk.eyJ1IjoiZHI0Z2F3YXkiLCJhIjoiY2xtdnc2YjdnMG1nNzJpcGNiaDI4aXAzcSJ9.9XTO-r1_cZp9p51MazueCw';

        mapboxgl.accessToken = ACCESS_TOKEN;
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11'
        });

        const marker = new mapboxgl.Marker().setLngLat([-40, -20]).addTo(map);      
        
        const searchJS = document.getElementById('search-js');
        searchJS.onload = function () {
            const searchBox = new MapboxSearchBox();
            searchBox.accessToken = ACCESS_TOKEN;
            searchBox.options = {
                proximity: [-73.99209, 40.68933]
            };
            searchBox.marker = true;
            searchBox.mapboxgl = mapboxgl;
            map.addControl(searchBox);
        };

        map.on('click', (e) => console.log(e.lngLat));
    </script>
</html>