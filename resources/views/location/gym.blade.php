@extends('layout.site')
@section('titulo', 'GymHunt - Explorar')
@section('content')

@push('custom-header')
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
@endpush

<div id='map' class="w-full h-full my-44">
<mapbox-search-box
  access-token="pk.eyJ1IjoiZHI0Z2F3YXkiLCJhIjoiY2xtdnc2YjdnMG1nNzJpcGNiaDI4aXAzcSJ9.9XTO-r1_cZp9p51MazueCw"
  proximity="0,0"
>
</mapbox-search-box>    
</div>

@push('custom-scripts')
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>

    
    <script id="search-js" defer src="https://api.mapbox.com/search-js/v1.0.0-beta.17/web.js"></script>

    <script>
        const accessToken = 'pk.eyJ1IjoiZHI0Z2F3YXkiLCJhIjoiY2xtdnc2YjdnMG1nNzJpcGNiaDI4aXAzcSJ9.9XTO-r1_cZp9p51MazueCw';
        
        const script = document.getElementById('search-js');
        script.onload = function() {
        mapboxsearch.autofill({
        accessToken
        });
        };
    </script>
    
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiZHI0Z2F3YXkiLCJhIjoiY2xtdnc2YjdnMG1nNzJpcGNiaDI4aXAzcSJ9.9XTO-r1_cZp9p51MazueCw';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11'
        });

        const marker = new mapboxgl.Marker().setLngLat([-40, -20]).addTo(map);      
        
        const search = new MapboxSearchBox();
        search.accessToken = 'pk.eyJ1IjoiZHI0Z2F3YXkiLCJhIjoiY2xtdnc2YjdnMG1nNzJpcGNiaDI4aXAzcSJ9.9XTO-r1_cZp9p51MazueCw';
        map.addControl(search);
    </script>
@endpush

@endsection