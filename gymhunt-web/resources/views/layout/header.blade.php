<html>
    <head>
        <!-- Icones Font Awesome -->
        <script src="https://kit.fontawesome.com/189da14b09.js" crossorigin="anonymous"></script>
        <title>@yield('titulo')</title>
        <!-- Import tailwindCSS -->
        @vite('resources/css/app.css')
    </head>

    <header class="h-16 md:h-30 lg:h-24 bg-gray-600 fixed inset-x-0 top-0 z-50 rounded-b-lg">
        <nav class="flex items-center justify-between p-3 m-1" aria-label="Global">
            <div class="flex items-center">
                <div class="flex">
                    <a href="/" class="-m-1.5 p-1.5">
                        <img src="\img\logoGymHunt.png" alt="" class="h-16 w-auto">
                    </a>
                </div>
                
                <div class="ml-10 md:block">
                    <div class="hidden lg:flex items-baseline space-x-4 lg:gap-x-12 m-2">
                        <a href="#" class="text-2xl font-semibold leading-6 hover:text-white rounded-md px-3 py-2 hover:bg-gray-700 text-gray-400">Product</a>
                        <a href="#" class="text-2xl font-semibold leading-6 hover:text-white rounded-md px-3 py-2 hover:bg-gray-700 text-gray-400">Features</a>
                        <a href="#" class="text-2xl font-semibold leading-6 hover:text-white rounded-md px-3 py-2 hover:bg-gray-700 text-gray-400">Marketplace</a>
                        <a href="#" class="text-2xl font-semibold leading-6 hover:text-white rounded-md px-3 py-2 hover:bg-gray-700 text-gray-400">Company</a>
                    </div>
                </div>

            </div>  
            
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="{{url('/login')}}" class="text-2xl font-semibold leading-6 text-gray-400">Log in <i class="fa-solid fa-right-to-bracket fa-xl"></i></a>
            </div>
        </nav>
    </header>