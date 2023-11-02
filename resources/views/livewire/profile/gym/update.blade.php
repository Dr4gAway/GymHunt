<div x-data="{
    mapOpen: false
}">
    @push('custom-header')
    <link href="{{ URL::asset('css/signup.css'); }}" rel='stylesheet'/>
    @endpush
    {{-- Edit Profile --}}
    <form wire:submit.prevent="store" class="fixed inset-0 flex flex-col items-center w-screen h-screen p-8 gap-8 z-20" x-show="configOpen">
        <!-- Overlay  -->
        <div class="bg-black bg-opacity-20 fixed inset-0" x-on:click="modalClose()"></div>

        <div class="flex flex-col w-full gap-4 bg-white p-6 rounded-2xl max-w-2xl z-20 overflow-scroll">
            <div class="flex justify-between w-full">
                <p class="font-bold text-lg"> <i class="fa-solid fa-pencil"></i> Editar perfil</p>    
                <button class="font-bold text-lg" x-on:click.prevent="modalClose()">
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>

            <div class="grid grid-flow-col justify-items-center space-x-3">
                <div class="relative w-24 h-24 rounded-full overflow-hidden">
                    <label for="avatarInput" class="absolute w-full h-full flex items-center justify-center bg-gymhunt-purple-2 bg-opacity-50">
                        <i class="fa-solid fa-pencil"></i>
                    </label>
                    <input id="avatarInput" type="file" wire:model="avatar" class="hidden">
                    @if(is_string($avatar))
                        <img src="/{{$user->avatar}}" class="w-full h-full object-cover">
                    @else
                        <img src="{{$avatar->temporaryUrl()}}" class="w-full h-full object-cover">
                    @endif
                    
                </div>
                @error('avatar')
                    <p class="text-red-500"> {{$message}} </p>   
                @enderror

                <div class="relative w-96 h-24 rounded-2xl overflow-hidden">
                    <label for="bannerInput" class="absolute w-full h-full flex items-center justify-center bg-gymhunt-purple-2 bg-opacity-50">
                        <i class="fa-solid fa-pencil"></i>
                    </label>
                    <input id="bannerInput" type="file" wire:model="banner" class="hidden">
                    @if(is_string($banner))
                        <img src="/{{$user->banner}}" class="h-full object-cover aspect-banner">
                    @else
                        <img src="{{$banner->temporaryUrl()}}" class="h-full object-cover aspect-banner">
                    @endif
                </div>
            </div>
            
            <div class="w-full h-1 bg-slate-950"></div>

            <x-form.text name="name" label="Nome" model="name" placeholder="Digite seu nome completo"/>
            <x-form.text name="email" label="Email" model="email" type="email" placeholder="ex: email@gmail.com"/>
            <x-form.text name="phone" label="Telefone" model="phone" type="text" placeholder="ex: +55 (14) 99722-1343"/>

            <x-resizable-text placeholder="Biografia" model="about"/>

            <div class="flex items-center gap-4">
                <x-form.text class="w-full" name="open_schedule" model="open_schedule" label="Horário de abertura" type="time" />
                <x-form.text class="w-full" name="close_schedule" model="close_schedule" label="Horário de fechamento" type="time"/>
            </div>
            <div id="address">
                <div class="flex w-full gap-4">
                    <x-form.text class="w-fit" name="state" model="state" label="Estado" type="text" />
                    <x-form.text class="w-full" name="city" model="city" label="Cidade" type="text"/>
                    <x-form.text class="w-full" name="district" model="district" label="Bairro" type="text"/>
                </div>
                <div class="flex gap-4">
                    <x-form.text class="w-full" name="street" model="street" label="Rua" type="text"/>
                    <x-form.text class="w-fit" name="number" model="number" label="Número" type="text"/>
                </div>
            </div>

            <div class="gap-4 w-full hidden" id="coordinates">
                <x-form.text name="latitude" label="Latitude" model="latitude" type="number" step="0.000000000000001" class="w-full" />
                <x-form.text name="longitude" label="Longitude" model="longitude" type="number" step="0.000000000000001" class="w-full" />
            </div>

            <div class="flex items-center gap-4">
                <button wire:ignore onclick="fetchUserData()" @click.prevent='mapOpen = !mapOpen'
                    class="rounded-lg bg-gymhunt-purple-1 px-5 p-1.5 text-white font-bold">Alterar marcador no mapa</button>
                <div class="w-full flex flex-col space-y-1 col-span-1">
                    <p class="font-poppins font-bold text-lg">CNPJ</p>
                    <label class="p-1.5 rounded-md ring-1 ring-gray-300 shadow-xl bg-neutral-500 opacity-40" x-on:click="openAlert()">458.066.118-41</label>
                </div>
            </div>

            {{-- <div  class="w-64 h-64"></div> --}}
            <div class="fixed inset-0 flex flex-col w-full h-screen gap-8 z-20 p-8" x-show="mapOpen" x-data="{
    
            }">
                <!-- Overlay  -->
                <div class="bg-black bg-opacity-20 fixed inset-0 " x-on:click="mapOpen = !mapOpen"></div>
        
                <div class="self-center w-full max-w-5xl h-full max-h-[960px] flex flex-col gap-4 bg-white p-4 rounded-2xl z-20">
                    <div class="flex w-full justify-between">
                        <h4 class="text-4xl font-bold">Selecionar Endereço</h4>
                        <img src="\img\icons\close-icon.svg" x-on:click="mapOpen = !mapOpen" class="cursor-pointer">
                    </div>
                    
                    <div wire:ignore id='formmap' class="w-full h-full absolute top-0 left-0"></div>
                </div>
            </div>  

            <div class="grid grid-flow-col justify-between space-x-2">
                <button x-on:click.prevent="modalClose()" class="
                    justify-center rounded-lg bg-gymhunt-purple-2 px-5 p-1.5
                    text-sm font-semibold leading-6 text-white shadow-sm
                    hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                    focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Cancelar
                </button>
                <button type="submit" wire:click="store()"
                    class="justify-center rounded-lg bg-gymhunt-purple-1 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Salvar</button>
            </div>
        </div>  
    </form>

    @push('custom-scripts')
        <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>

        <script defer>
            const ACCESS_TOKEN_FORM = 'pk.eyJ1IjoiZHI0Z2F3YXkiLCJhIjoiY2xtdnc2YjdnMG1nNzJpcGNiaDI4aXAzcSJ9.9XTO-r1_cZp9p51MazueCw';

            mapboxgl.accessToken = ACCESS_TOKEN_FORM;
            const map_form = new mapboxgl.Map({
                container: 'formmap',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: ["{{$this->gym->longitude}}", "{{$this->gym->latitude}}"],
                zoom: 15
            });

            const marker_form = new mapboxgl.Marker().setLngLat(["{{$this->gym->longitude}}", "{{$this->gym->latitude}}"])

            window.addEventListener('map::updated', (request) => {
                marker_form.remove()
                marker_form.setLngLat([request.detail[0], request.detail[1]])
                marker_form.addTo(map_form)

                map_form.flyTo({center: [request.detail[0], request.detail[1]]})
            })

            marker_form.addTo(map_form);
            
            const selectedLocation = new mapboxgl.Marker()

            
            map_form.on('click', (e) => {
                const formCoordinates = document.getElementById('coordinates')
                const addressCoordinates = Array.from(formCoordinates.querySelectorAll("div > div > input")).map((coordinates) => coordinates)
                const coordinates = e.lngLat;

                selectedLocation.remove()
                selectedLocation.setLngLat(coordinates)
                selectedLocation.addTo(map_form)

                /* latitude */
                addressCoordinates[0].value = coordinates.lat
                /* Longitude */
                addressCoordinates[1].value = coordinates.lng

                /* Emmiting livewire Event */
                addressCoordinates.forEach((input) => {
                    input.dispatchEvent(new Event('input'))
                })
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
                            gymLocation.addTo(map_form)

                            map_form.flyTo({center: [coordinates.longitude, coordinates.latitude]})
                    })
                    .catch(ex => console.log(ex))
            }
        </script>
    @endpush
    
</div>