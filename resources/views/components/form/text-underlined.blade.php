@props([
    'name',
    'label',
    'step' => null,
    'type' => 'text',
    'placeholder' => null
])

{{-- $atributes->class(['flex items-center']) --}}

<div {{ $attributes->class(['']) }}>
    <label for="{{$name}}" class="block text-lg font-bold leading-6 text-gray-900">{{ $label }}</label>
    <div>
        <input
            id="{{ $name }}"
            name="{{ $name }}"
            type="{{ $type }}"
            @if($step)
                step = {{$step}}
            @endif
            placeholder="{{ $placeholder }}"
            class="w-full bg-transparent focus:ring-0 focus:outline-none peer placeholder:text-[#929292]"
        >
        <div class="w-full h-1 bg-gymhunt-purple-1 rounded-md peer-focus:ring-4 peer-focus:ring-gymhunt-purple-2 "></div>
    </div>

    @error($name)
        <p class="text-red-500"> {{$message}} </p>   
    @enderror
</div>