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



    <body class="font-poppins bg-[#DFE6F9] max-h-screen">

        <livewire:gym.map >

        @livewireScripts        
    </body>
</html>