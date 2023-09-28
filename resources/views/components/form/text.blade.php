@props([
    'name',
    'label',
    'type' => 'text',
    'placeholder' => null
])

{{-- $atributes->class(['flex items-center']) --}}

<div {{ $attributes->class(['']) }}>
    <label for="{{$name}}" class="block text-lg font-bold leading-6 text-gray-900">{{ $label }}</label>
    <div class="mt-2">
        <input
            id="{{ $name }}"
            name="{{ $name }}"
            type="{{ $type }}"
            value="{{old($name)}}"
            placeholder="{{ $placeholder }}"
            class="block w-full rounded-md border-0 p-1.5 text-gray-900 drop-shadow-xl ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
        >
    </div>

    @error($name)
        <p class="text-red-500"> {{$message}} </p>   
    @enderror
</div>