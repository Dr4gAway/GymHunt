<div>
    <livewire:gym.search />

    <div id='map' class="w-full h-full"></div>

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
            searchBox.placeholder = 'Pesquise um endereço';
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

            console.log(await gymMarkers)

            gymMarkers.forEach(gym => {
                console.log(gym);
                const popup = new mapboxgl.Popup({ closeOnClick: true, closeButton: false, autoPanPadding: 0 })
                            .setLngLat([gym.longitude, gym.latitude])
                            .setHTML(`
                                <div class="visible bg-white w-[250px] rounded-2xl overflow-hidden font-poppins">
                                    <div class="relative bg-gymhunt-purple-1 w-full h-16 mb-8">
                                        <div class="absolute left-1/2 top-0 translate-y-1/2 -translate-x-1/2 rounded-full bg-red-500 w-16 h-16"></div>
                                    </div>
                                    <div class="relative flex flex-col gap-4 p-3">
                                        <h3 class="font-bold text-xl text-center">${gym.name}</h3>
                                        <div class="flex flex-col gap-1">
                                            <span class="text-justify">
                                                ${"{{Illuminate\Support\Str::limit('Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit tenetur atque consectetur consequuntur maxime delectus iusto beatae accusamus aperiam, dicta reiciendis unde assumenda inventore in, quas eveniet pariatur ex nostrum. ', 80, '...')}}"}
                                            </span>
                                
                                        </div>
                                        <div class="flex items-center gap-4 h-fit">
                                            <button wire:ignore @click.prevent
                                                class="w-full h-full py-1 px-2 rounded-lg bg-gymhunt-purple-1 text-white font-bold text-base focus:ring-4 focus:ring-gymhunt-purple-1">
                                                Visitar perfil
                                            </button>
                                            <button wire:ignore @click.prevent onclick="goTo(${gym.longitude}, ${gym.latitude})"
                                                class="h-full py-1 px-2 rounded-xl bg-transparent border-4 border-gymhunt-purple-1 text-gymhunt-purple-1 font-bold text-base">
                                                Zoom
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            `)
                            .addTo(map);

                const marker = new mapboxgl.Marker()
                                .setLngLat([gym.longitude, gym.latitude])
                                .setPopup(popup)

                marker.on('click', (e) => {
                    map.flyTo({center: [gym.longitude, gym.latitude]})
                })

                map.on('move', () => {

                    function isVisible(marker, map) {
                        const {_sw, _ne} = map.getBounds()
                        const {_lngLat: {lng}, _lngLat: {lat}} = marker
                        const { transform: {_zoom}} = map
                        return (
                            lng > _sw.lng &&
                            lng < _ne.lng &&
                            lat > _sw.lat &&
                            lat < _ne.lat &&
                            _zoom > 12
                        )
                    }

                    if(isVisible(marker, map))
                        marker.addTo(map);
                    else
                        marker.remove()
                    /* Latitude in Ne stands for north */
                    /* Longitude in Ne stands for East */
                })
            })
        }

        loadGyms()
    </script>
</div>
