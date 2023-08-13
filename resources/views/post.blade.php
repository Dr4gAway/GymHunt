@extends('layout.site')
@section('titulo', 'GymHunt - teste')
@section('content')
    <section class="flex justify-center w-full my-8">
        <livewire:post :post="$post" :showAll="true" />
    </section>
@endsection