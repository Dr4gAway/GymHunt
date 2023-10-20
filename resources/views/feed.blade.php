@extends('layout.site')
@section('titulo', 'GymHunt - Home')
@section('content')

<div class="flex justify-center items-center">
    <section class=" w-full max-w-2xl flex items-center my-8">
        <livewire:timeline />
    </section>
</div>

@endsection