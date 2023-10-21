@extends('layout.site')
@section('titulo', 'GymHunt - Cadastro')
@push('custom-header')
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
@endpush
@section('content')
<section class="flex flex-col w-full max-w-2xl mx-auto my-8 gap-8 ">
    <h2 class="flex self-start font-bold gap-4">
        <img src="\img\logoIcon.png" alt="Logo Gym hunt" class="w-24">
        <div class="flex flex-col">
            <span class="text-6xl">
                Cadastre-se
            </span>
            <span class="text-4xl">
                Agora no nosso sitema
            </span>
        </div>
    </h2>
    <form  method="POST" class="flex flex-col w-full gap-4" x-data='{
        mapOpen: false,
        formStep: "default",
        handleUserType() {
            this.formStep = document.querySelector(`input[name="user_type"]:checked`).value;
            console.log(this.formStep)
        },

        disableScroll() {
            scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
            window.onscroll = () => {
                window.scrollTo(scrollLeft, scrollTop);
            }
        },
        
        enableScroll() {
            window.onscroll = function() {};
        },

        closeModal() {
            this.enableScroll();
            this.mapOpen = !this.mapOpen
        },

        openModal() {
            this.disableScroll();
            this.mapOpen = !this.mapOpen
        }
    }'>
        @CSRF

        <div class="flex flex-col gap-4"
            x-show="formStep == 'default'"  x-transition.opacity
                                            x-transition:enter.duration.500ms
                                            x-transition:leave.duration.400m>
            <x-form.text name="name" label="Nome" class="w-full"/>
            <x-form.text name="email" label="Email" class="w-full"/>

            <div class="flex gap-4">
                <x-form.text name="password" label="Senha" type="password" class="w-full"/>
                <x-form.text name="password_confirmation" label="Confirmar senha" type="password" class="w-full"/>
            </div>
            <x-form.text name="phone" label="Telefone" class="w-full"/>

            <span class="text-center font-bold text-2xl mt-3">Qual usuário você se encaixa?</span>
            <div class="flex gap-8 justify-center" id="teste">
                <label for="gym" class="flex flex-col w-full">
                    <input type="radio" name="user_type" id="gym" value="gym" class="hidden peer">
                    <div class="gap-4 flex flex-col w-full items-center shadow-xl rounded-md p-4 outline outline-2 outline-gymhunt-purple-1 peer-checked:bg-gymhunt-purple-3 cursor-pointer">
                        <img class="w-32" src="\img\academia.png" alt="Selecione:" />
                        <span class="text-2xl font-bold">Academia</span>
                    </div>
                </label>

                <label for="common" class="flex flex-col w-full">
                    <input type="radio" name="user_type" id="common" value="common" class="hidden peer">
                    <div class="gap-4 flex flex-col w-full items-center shadow-xl rounded-md p-4 outline outline-2 outline-gymhunt-purple-1 peer-checked:bg-gymhunt-purple-3 cursor-pointer">
                        <img class="w-32" src="\img\musculo.png" >
                        <span class="text-2xl font-bold">Pessoa</span>
                    </div>
                </label>
            </div>
        </div>

        <div x-show="formStep == 'common'"  x-transition.opacity
                                            x-transition:enter.duration.500ms
                                            x-transition:leave.duration.400m>
            Você é um usuário normal!
        </div>

        <div x-show="formStep == 'gym'" x-transition.opacity
                                        x-transition:enter.duration.500ms
                                        x-transition:leave.duration.400m
             class="flex flex-col gap-2">

             <div class="flex flex-col gap-2 items-start">
                <span class="text-center font-bold text-2xl mt-3">Documentos</span>
                <x-form.text name="document" label="CNPJ" type="text" class="w-full"/>
             </div>
            <div class="flex flex-col gap-2 items-start">
                <span class="text-center font-bold text-2xl mt-3">Horários</span>
                <div class="flex gap-4 w-full">
                    <x-form.text name="open_schedule" label="Abertura" type="number" class="w-full"/>
                    <x-form.text name="close_schedule" label="Fechamento" type="number" class="w-full"/>
                </div>
            </div>
            <div class="flex flex-col gap-2 items-start" id="adress">
                <span class="text-center font-bold text-2xl mt-3">Endereço</span>
                <div class="flex w-full gap-4" id="geralAdress">
                    <x-form.text name="state" label="Estado" type="text" class="flex-none"/>◘
                    <x-form.text name="city" label="Cidade" type="text" class="w-full grow"/>
                    <x-form.text name="district" label="Bairro" type="text" class="flex-none"/>
                </div>
                <div class="flex gap-4 w-full" id="specificAdress">
                    <x-form.text name="street" label="Rua" type="text" class="w-full"/>
                    <x-form.text name="number" label="Numero" type="text" class="flex-none"/>
                </div>
                <button wire:ignore onclick="fetchUserData()" @click.prevent='openModal()'
                 class="bg-gymhunt-purple-1 text-white font-bold px-4 py-2 rounded-md w-full">
                    Selecionar localização
                </button>

                <div class="fixed inset-0 flex flex-col w-full h-screen my-8 gap-8 z-20 p-16" x-show="mapOpen" x-data="{

                }" @update::close="closeModal()">
                    <!-- Overlay  -->
                    <div class="bg-black bg-opacity-20 fixed inset-0 " x-on:click="closeModal()"></div>
            
                    <!-- <span class="rounded-full h-10 w-10 bg-blue-500"></span> -->
            
                    <div class="self-center w-full max-w-6xl h-full max-h-[720px] flex flex-col gap-4 bg-white p-4 rounded-2xl z-20">
                        <!-- <div id='map' class="w-full h-full absolute top-0 left-0"></div> -->
                        {{-- <iframe id="map" width='100%' height='400px' src="https://api.mapbox.com/styles/v1/dr4gaway/clmvwb5lk05t701qx9zzfdd9w.html?title=false&access_token=pk.eyJ1IjoiZHI0Z2F3YXkiLCJhIjoiY2xtdnc2YjdnMG1nNzJpcGNiaDI4aXAzcSJ9.9XTO-r1_cZp9p51MazueCw&zoomwheel=false#17.54/-22.340987/-49.024319" title="Navigation" style="border:none;"></iframe> --}}

                        <button type="submit" class="self-end bg-gymhunt-purple-1 text-white rounded-2xl px-4 py-2 w-fit">
                            Enviar
                        </button>
                    </div>
                </div>                
                
                {{-- <div class="flex gap-4 w-full">
                    <x-form.text name="latitude" label="Latitude" type="number" class="w-full"/>
                    <x-form.text name="longitude" label="longitude" type="number" class="w-full"/>
                </div> --}}
            </div>
        </div>

        <!-- Imagens

            <span class="text-lg font-bold leading-6 text-gray-900">Insira suas imagens</span>
            <div class="flex flex-col gap-4">
            <div>
                <label for="avatar" class="block text-sm font-semibold leading-6 text-gray-900 ">1. Avatar</label>
                <div class="mt-2.5">
                    <input type="file" name="avatar" id="avatar" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('avatar')
                    <p class="text-red-500"> {{$message}} </p>   
                @enderror
            </div>

            <div>
                <label for="banner" class="block text-sm font-semibold leading-6 text-gray-900">2. Banner</label> 
                <div class="mt-2.5">
                    <input type="file" name="banner" id="banner" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                
                @error('banner')
                    <p class="text-red-500"> {{$message}} </p>   
                @enderror
            </div>
        </div> -->

        <div class="flex w-full gap-4">
            <button wire:ignore @click.prevent='formStep = "default"' :class="formStep == 'default' ? 'hidden' : '' "
                    class="bg-gymhunt-purple-1 text-white font-bold px-4 py-2 rounded-md w-full">
                Voltar
            </button>
            <button wire:ignore @click.prevent='handleUserType' :class="formStep != 'default' ? 'hidden' : '' "
                    class="bg-gymhunt-purple-1 text-white font-bold px-4 py-2 rounded-md w-full">
                Próximo
            </button>
        </div>
        <button type="submit" class="bg-gymhunt-purple-1 text-white font-bold px-4 py-2 rounded-md"> Cadastrar-se </button>
    </form>
</div>
@endsection

@push('custom-scripts')
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
    {{-- <script id="search-js" src="https://api.mapbox.com/search-js/v1.0.0-beta.17/web.js"></script> --}}

    <script defer>
        const form = document.querySelector('form')
        const types = document.querySelectorAll(`input[name="user_type"]`)
        const userType = document.querySelectorAll(`input[name="user_type"]:checked`)
        types.forEach((type) => {
            
            type.addEventListener('change', () => {
                if(type == gym)
                    form.action = "{{ route('gymSignup') }}";
                else
                    form.action = "{{ route('commonSignup') }}";    

                    console.log(type.value);
            })
        })
    </script>

    <script defer>
        const ACCESS_TOKEN = 'pk.eyJ1IjoiZHI0Z2F3YXkiLCJhIjoiY2xtdnc2YjdnMG1nNzJpcGNiaDI4aXAzcSJ9.9XTO-r1_cZp9p51MazueCw';

        mapboxgl.accessToken = ACCESS_TOKEN;
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/dr4gaway/clmvwb5lk05t701qx9zzfdd9w'
        });

        /* const searchJS = document.getElementById('search-js');
        searchJS.onload = function () {
            const searchBox = new MapboxSearchBox();
            searchBox.accessToken = ACCESS_TOKEN;
            searchBox.options = {
                proximity: [-73.99209, 40.68933]
            };
            searchBox.marker = true;
            searchBox.mapboxgl = mapboxgl;
            map.addControl(searchBox);
        }; */

        var waypoints = []

        map.on('click', (e) => {
            const coordinates = e.lngLat;

            const waypoint = {
                coordinates: coordinates.toArray(),
                name: `teste ${waypoints.length + 1}`
            }

            if (!waypoints.includes(waypoint)) {
                new mapboxgl.Marker()
                    .setLngLat(waypoint.coordinates)
                    .addTo(map);
            }

            waypoints.push(waypoint)
        });

        async function fetchUserData() {

            function isEmptyOrSpaces(str){
                return str === null || str.match(/^ *$/) !== null;
            }

            const geralAdressFields = document.getElementById('adress');
            const adresses = Array.from(geralAdressFields.querySelectorAll("div > div > div > input")).map((adress) => adress.value);
            const searchString = adresses.filter((adress) => {
                if (!isEmptyOrSpaces(adress))
                    return adress
            }).join('+');

            console.log(searchString)


            /* console.log(geralAdressFields)
            const fieldTops = Array.from(geralAdressFields, field => field)
            console.log("TOPS",fieldTops) */
            // geralAdressFields.map((field) => {
            //     console.log(field);
            // })

            let uuid = "{{ Ramsey\Uuid\Uuid::uuid4() }}"

            console.log(uuid)

            const curl = `https://api.mapbox.com/search/searchbox/v1/suggest?q=${searchString}&language=pt&limit=1&session_token=${uuid}&country=BR&access_token=pk.eyJ1IjoiZHI0Z2F3YXkiLCJhIjoiY2xtdnc2YjdnMG1nNzJpcGNiaDI4aXAzcSJ9.9XTO-r1_cZp9p51MazueCw`

            console.log(curl)
        }
    </script>
@endpush
