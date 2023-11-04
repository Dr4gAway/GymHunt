<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GymHunt - Login</title>

    <!-- Import Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;700;900&display=swap" rel="stylesheet">

    <link rel="icon" href=".\img\logoIcon.png" >
    <!-- Import TailwindCSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Import AlpineJs -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.3/dist/cdn.min.js"></script>
    
    @livewireStyles

    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
    <link href="{{ URL::asset('css/signup.css'); }}" rel='stylesheet'/>
</head>

<body class="flex justify-center items-center font-poppins bg-[#DFE6F9] min-h-screen">
{{-- bg-[url('/public/img/background/signupBackground.png')] --}}

<div class="flex h-full w-full max-w-5xl max-h-[45rem] rounded-2xl">
    <div class="flex flex-col w-full h-full mx-auto justify-between bg-white p-6 rounded-l-2xl overflow-scroll">
        <div class="flex w-full justify-between">
            <h2 class="flex self-start font-bold gap-4 text-4xl">Login</h2>
            <img src="\img\logo.svg" alt="Logo Gym hunt" class="w-24">

        </div>

        <form method="POST" action="{{route('login')}}" class="flex flex-col w-full gap-4" id="login" enctype="multipart/form-data">
            {{ csrf_field() }}

           <x-form.textunderlined name="email" label="Email" type="email" />
           <x-form.textunderlined name="password" label="Senha" type="password" />
        </form>
        
        <div class="flex w-full justify-between ">
            <a href="{{route('home')}}"
                    class="bg-transparent outline outline-4 text-gymhunt-purple-1 outline-gymhunt-purple-1 font-bold px-4 py-2 rounded-md">
                Voltar
            </a>

            <input type="submit" value="Login" form="login"
                    class="bg-gymhunt-purple-1 hover:bg-gymhunt-purple-2 text-white font-bold px-4 py-2 w-fit end rounded-md cursor-pointer ">
        </div>
    </div>

    <div class="w-1/2 rounded-r-2xl overflow-hidden">
        <img src="{{asset('img/background/dumbellBackground.png')}}" class="object-cover h-full">
    </div>
   {{-- <img src="/{{$this->post->images()->first()->path}}" class="w-full rounded-2xl object-cover max-h-[410px]"> --}}
</div>

@livewireScripts
</body>

</html>
