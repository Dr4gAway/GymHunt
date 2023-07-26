@extends('layout.site')
@section('titulo', 'GymHunt - Home')
@section('content')

<div class="flex items-center">
    <section class="w-full flex items-center my-8">
        <livewire:timeline />
    </section>
</div>

@endsection