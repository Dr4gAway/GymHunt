<div>
    {{-- To atain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <livewire:gym.search />
    <div id='map' class="w-full max-h-screen h-screen"></div>


    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>

    <script id="search-js" defer="" src="https://api.mapbox.com/search-js/v1.0.0-beta.17/web.js"></script>

    <script>
        const ACCESS_TOKEN = 'pk.eyJ1IjoiZHI0Z2F3YXkiLCJhIjoiY2xtdnc2YjdnMG1nNzJpcGNiaDI4aXAzcSJ9.9XTO-r1_cZp9p51MazueCw';

        mapboxgl.accessToken = ACCESS_TOKEN;
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11'
        });

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

        function goTo(lng, lat) {
            map.flyTo({
                center: [lng, lat],
                zoom: 18
            })
        }

        async function loadGyms() {
            const gymMarkers = @js($this->gyms)

            gymMarkers.forEach(gym => {
                const popup = new mapboxgl.Popup({ closeOnClick: true, closeButton: false, autoPanPadding: 0 })
                            .setLngLat([gym.longitude, gym.latitude])
                            .setHTML(`
                                <div class="relative t-0 l-0 p-2 m-0 border-b-gymhunt-purple-1 border-b-4">
                                    <h1 class="font-bold font-poppins">${gym.name}!</h1>
                                    <button wire:ignore @click.prevent onclick="goTo(${gym.longitude}, ${gym.latitude})"
                                        class="bg-gymhunt-purple-1 hover:bg-gymhunt-purple-2 text-white font-bold px-2 py-1 w-full end rounded-md cursor-pointer"
                                    > Ver mais perto </button>
                                </div>
                            `)
                            .addTo(map);

                const marker = new mapboxgl.Marker()
                                .setLngLat([gym.longitude, gym.latitude])
                                .setPopup(popup)
                                .addTo(map);

                marker.on('click', (e) => {
                    map.flyTo({center: [gym.longitude, gym.latitude]})
                })
            })
        }

        loadGyms()
    </script>
</div>
