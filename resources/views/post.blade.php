@extends('layout.site')
@section('titulo', 'GymHunt - teste')
@section('content')
    <section class="flex justify-center w-full my-8" x-data="{
        imageOpen: false,

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
    
        imageOpen: false
    }">

        <div x-show="imageOpen">
            <livewire:carousel  />
        </div>
        <livewire:post :post="$post" :showAll="true" />
    </section>
@endsection