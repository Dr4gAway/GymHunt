@props([
    'name' => 'none',
    'body' => 'none',
])

<div class="flex flex-col items-centerflex-col gap-1">
    <p class="font-semibold">{{$name}}</p>
    <p class="grow font-medium">{{$body}}</p>
</div>