<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GymHunt - Cadastro</title>

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

<div class="flex h-full w-full max-w-5xl max-h-[45rem] rounded-2xl">
    <div class="flex flex-col w-full h-full mx-auto justify-between bg-white p-6 rounded-l-2xl overflow-scroll" x-data='{
        formStep: "usertype",
        oldFormStep: null,
        stepFoward() {
            console.log("antiga: ", this.formStep)
            switch(this.formStep) {
                case("usertype"):
                    this.formStep = "required"
                    break;
                case("required"):
                    this.formStep = document.querySelector(`input[name="user_type"]:checked`).value;
                    break;
                case("gym"):
                case("common"):
                    this.oldFormStep = this.formStep
                    this.formStep = "images"
                    break;
            }
            console.log("nova: ", this.formStep)
        },

        stepBack() {
            switch(this.formStep) {
                case("gym"):
                case("common"):
                    this.formStep = "required"
                    break;
                case("required"):
                    this.formStep = "usertype"
                    break;
                case("images"):
                    this.formStep = this.oldFormStep
                    break;
            }
        }
    }'>
        <h2 class="flex self-start font-bold gap-4 text-4xl">
            {{-- <img src="\img\logoIcon.png" alt="Logo Gym hunt" class="w-24"> --}}
            Cadastre-se
        </h2>
        <form method="POST" class="flex flex-col w-full gap-4" id="signup" enctype="multipart/form-data" x-data='{
            mapOpen: false,
    
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
            {{ csrf_field() }}

            <div class="flex flex-col gap-4"
                 x-show="formStep == 'usertype'"  x-transition.opacity
                                                x-transition:enter.duration.500ms
                                                x-transition:leave.duration.400m>
                <span class="font-bold text-2xl mt-3">Qual usuário você se encaixa?</span>
                <div class="flex gap-8 justify-center" id="teste">
                    <label for="gym" class="flex flex-col w-full">
                        <input type="radio" name="user_type" id="gym" value="gym" class="hidden peer">
                        <div class="gap-4 flex flex-col w-full items-center shadow-xl rounded-md bg-white p-4 outline outline-2 outline-gymhunt-purple-1 peer-checked:bg-gymhunt-purple-3 cursor-pointer">
                            <img class="w-16" src="\img\gym-icon.png" alt="Selecione:" />
                            <span class="text-2xl font-bold">Academia</span>
                        </div>
                    </label>
    
                    <label for="common" class="flex flex-col w-full">
                        <input type="radio" name="user_type" id="common" value="common" class="hidden peer">
                        <div class="gap-4 flex flex-col w-full items-center shadow-xl rounded-md bg-white p-4 outline outline-2 outline-gymhunt-purple-1 peer-checked:bg-gymhunt-purple-3 cursor-pointer">
                            <img class="w-16" src="\img\musculo.png" >
                            <span class="text-2xl font-bold">Pessoa</span>
                        </div>
                    </label>
                </div>
            </div>
    
            <div class="flex flex-col gap-4"
                x-show="formStep == 'required'"  x-transition.opacity
                                                x-transition:enter.duration.500ms
                                                x-transition:leave.duration.400m>
                
                <x-form.textUnderlined name="name" label="Nome" class="w-full"/>
                <x-form.textUnderlined name="email" label="Email" class="w-full"/>
    
                <div class="flex gap-4">
                    <x-form.textUnderlined name="password" label="Senha" type="password" class="w-full"/>
                    <x-form.textUnderlined name="password_confirmation" label="Confirmar senha" type="password" class="w-full"/>
                </div>
                <x-form.textUnderlined name="phone" label="Telefone" class="w-full"/>
            </div>
    
            <div class="flex flex-col gap-4"
                 x-show="formStep == 'common'"  x-transition.opacity
                                                x-transition:enter.duration.500ms
                                                x-transition:leave.duration.400m>
                <x-form.textUnderlined name="cpf" label="CPF" type="text" class="w-full"/>
                <x-form.textUnderlined name="birth" label="Data de nascimento" type="date" class="w-full"/>
            </div>
    
            <div x-show="formStep == 'gym'" x-transition.opacity
                                            x-transition:enter.duration.500ms
                                            x-transition:leave.duration.400m
                    class="flex flex-col gap-2">
    
                <div class="flex flex-col gap-2 items-start">
                    <span class="text-center font-bold text-2xl">Documentos</span>
                    <x-form.textUnderlined name="cnpj" label="CNPJ" type="text" class="w-full"/>
                </div>
                <div class="flex flex-col gap-2 items-start">
                    <span class="text-center font-bold text-2xl mt-3">Horários</span>
                    <div class="flex gap-4 w-full">
                        <x-form.textUnderlined name="open_schedule" label="Abertura" type="time" class="w-full"/>
                        <x-form.textUnderlined name="close_schedule" label="Fechamento" type="time" class="w-full"/>
                    </div>
                </div>
                <div class="flex flex-col gap-3 items-start" id="address">
                    <span class="text-center font-bold text-2xl mt-3">Endereço</span>
                    <div class="flex w-full gap-4">
                        <x-form.textUnderlined name="state" label="Estado" type="text" class=""/>
                        <x-form.textUnderlined name="city" label="Cidade" type="text" class="w-full grow"/>
                        <x-form.textUnderlined name="district" label="Bairro" type="text" class="w-full"/>
                    </div>
                    <div class="flex gap-4 w-full">
                        <x-form.textUnderlined name="street" label="Rua" type="text" class="w-full"/>
                        <x-form.textUnderlined name="number" label="Numero" type="text" class=""/>
                    </div>
                    <button wire:ignore onclick="fetchUserData()" @click.prevent='openModal()'
                        class="bg-gymhunt-purple-1 text-white font-bold px-4 py-2 rounded-md w-full">
                        Selecionar localização
                    </button>
    
                    <div class="fixed inset-0 flex flex-col w-full h-screen gap-8 z-20 p-8" x-show="mapOpen" x-data="{
    
                    }">
                        <!-- Overlay  -->
                        <div class="bg-black bg-opacity-20 fixed inset-0 " x-on:click="closeModal()"></div>
                
                        <div class="self-center w-full max-w-5xl h-full max-h-[960px] flex flex-col gap-4 bg-white p-4 rounded-2xl z-20">
                            <div class="flex w-full justify-between">
                                <h4 class="text-4xl font-bold">Selecionar Endereço</h4>
                                <img src="\img\icons\close-icon.svg" x-on:click="closeModal()" class="cursor-pointer">
                            </div>
                            
                            {{-- <div id='map' class="w-full h-full absolute top-0 left-0"></div> --}}
                        </div>
                    </div>                
                    
                    <div class="gap-4 w-full hidden" id="coordinates">
                        <x-form.text name="latitude" label="Latitude" type="number" step="0.000000000000001" class="w-full" readonly/>
                        <x-form.text name="longitude" label="longitude" type="number" step="0.000000000000001" class="w-full" readonly/>
                    </div>
                </div>
            </div>

            <div x-show="formStep == 'images'" x-transition.opacity
                                            x-transition:enter.duration.500ms
                                            x-transition:leave.duration.400m
                class="flex flex-col gap-2" x-data='{
                    loadImage(event, inputId) {
                        file = document.getElementById(inputId);
                        file.src = URL.createObjectURL(event.target.files[0])
                    }
                }'>
                <div>
                    <span class="text-center font-bold text-2xl mt-3">Avatar</span>
                    <div class="flex gap-4 items-center">
                        <img id="avatarPreview" class="aspect-square h-32 border-2 border-gymhunt-purple-1 rounded-full object-cover">
                        <input x-on:change="loadImage(event, 'avatarPreview')" type="file" name="avatar" id="avatar" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('avatar')
                        <p class="text-red-500"> {{$message}} </p>   
                    @enderror
                </div>

                <div class="">
                    <span class="text-center font-bold text-2xl mt-3">Banner</span>
                    <div class="flex flex-col gap-2 w-full">
                        <img id="bannerPreview" class="aspect-banner border-2 object-cover border-gymhunt-purple-1 rounded-2xl">
                        <input x-on:change="loadImage(event, 'bannerPreview')" type="file" name="banner" id="banner" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('banner')
                        <p class="text-red-500"> {{$message}} </p>   
                    @enderror
                </div>
            </div>

        </form>
        
        <div class="flex w-full" :class="formStep === 'usertype' ? 'justify-end' : 'justify-between' ">
            <button wire:ignore @click.prevent='stepBack' :class="formStep == 'usertype' ? 'hidden' : '' "
                    class="bg-transparent outline outline-4 text-gymhunt-purple-1 outline-gymhunt-purple-1 font-bold px-4 py-2 rounded-md">
                Voltar
            </button>
            <button wire:ignore @click.prevent='stepFoward' :class="formStep != 'images' ? '' : 'hidden' "
                    class="bg-gymhunt-purple-1 text-white font-bold px-4 py-2 w-fit end rounded-md">
                Avançar
            </button>

            <input type="submit" value="Cadastrar-se" x-show="formStep == 'images'" form="signup"
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

    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>

    <script defer>
        const form = document.querySelector('form')
        const types = document.querySelectorAll(`input[name="user_type"]`)

        types.forEach((type) => {
            type.addEventListener('change', () => {
                if(type == common)
                    form.action = "{{ route('commonSignup') }}";
                else
                    form.action = "{{ route('gymSignup') }}"
                console.log(form.action)
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
        const selectedLocation = new mapboxgl.Marker()

        map.on('click', (e) => {
            const formCoordinates = document.getElementById('coordinates')
            const addressCoordinates = Array.from(formCoordinates.querySelectorAll("div > div > input")).map((coordinates) => coordinates)
            const coordinates = e.lngLat;

            selectedLocation.remove()
            selectedLocation.setLngLat(coordinates)
            selectedLocation.addTo(map)

            /* latitude */
            addressCoordinates[0].value = coordinates.lat
            /* Longitude */
            addressCoordinates[1].value = coordinates.lng
        });
        
        // Set the custom marker image for the marker
        const markerCustomImage = document.createElement('div')
        markerCustomImage.className = 'custom-marker'
        const gymLocation = new mapboxgl.Marker(markerCustomImage)

        async function fetchUserData() {
            const addressFields = document.getElementById('address');
            const address = Array.from(addressFields.querySelectorAll("div > div > div > input")).map((field) => field.value);
            const searchString = address.join(' ').trim().replace(/\s+/g, '+');

            let uuid = "{{ Ramsey\Uuid\Uuid::uuid4() }}"

            const suggestions = `https://api.mapbox.com/search/searchbox/v1/suggest?q=${searchString}&language=pt&limit=1&session_token=${uuid}&country=BR&access_token=pk.eyJ1IjoiZHI0Z2F3YXkiLCJhIjoiY2xtdnc2YjdnMG1nNzJpcGNiaDI4aXAzcSJ9.9XTO-r1_cZp9p51MazueCw`
            await fetch(suggestions)
                .then((data) => data.json())
                .then(({suggestions: [{mapbox_id}]}) => {
                    uuid = "{{ Ramsey\Uuid\Uuid::uuid4() }}"
                    return fetch(`https://api.mapbox.com/search/searchbox/v1/retrieve/${mapbox_id}?session_token=${uuid}&access_token=pk.eyJ1IjoiZHI0Z2F3YXkiLCJhIjoiY2xtdnc2YjdnMG1nNzJpcGNiaDI4aXAzcSJ9.9XTO-r1_cZp9p51MazueCw`)
                })
                .then(data => data.json())
                .then(({features: [{properties, properties: {coordinates}}]}) => {
                        gymLocation.remove()
                        gymLocation.setLngLat([coordinates.longitude, coordinates.latitude])
                        gymLocation.setPopup(new mapboxgl.Popup().setHTML(`<h4>${properties.name}</h4>`))
                        gymLocation.addTo(map)
                
                        console.log(coordinates)
                        map.flyTo({center: [coordinates.longitude, coordinates.latitude]})
                })
                .catch(ex => console.log(ex))
        }
    </script>
</html>