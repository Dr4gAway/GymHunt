@extends('layout.site')
@section('titulo', 'GymHunt - Explorar')
@section('content')

@push('custom-header')
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
@endpush

<div id='map' class="w-full h-full"></div>

@push('custom-scripts')
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiZHI0Z2F3YXkiLCJhIjoiY2xtdnc2YjdnMG1nNzJpcGNiaDI4aXAzcSJ9.9XTO-r1_cZp9p51MazueCw';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11'
        });
    </script>
@endpush

@endsection