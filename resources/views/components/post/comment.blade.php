@props([
    'name' => 'none',
    'body' => 'none',
    'show-all' => false
])

@if('show-all')
<div class="flex flex-col items-centerflex-col gap-1">
    <p class="font-semibold">{{$name}}</p>
    <p class="grow font-medium">{{$body}}</p>
</div>

@else
<div class="flex flex-col items-centerflex-col gap-1">
    <p class="font-semibold">{{$name}}</p>
    <p class="grow font-medium">{{ Illuminate\Support\Str::limit($body, 20) }}</p>
</div>
@endif