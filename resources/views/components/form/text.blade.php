@props([
    'name',
    'label' => null,
    'model' => null,
    'step' => null,
    'type' => 'text',
    'placeholder' => null,
    'min' => null
])

{{-- $atributes->class(['flex items-center']) --}}

<div {{ $attributes->class(['']) }}>
    @if ($label)
        <label for="{{$name}}" class="block text-lg font-bold leading-6 text-gray-900">{{ $label }}</label>
    @endif
    <div @if($label) class="mt-2" @endif>
        <input
            id="{{ $name }}"
            name="{{ $name }}"
            type="{{ $type }}"
            @if($step)
                step = {{$step}}
            @endif
            @if($model)
                wire:model="{{ $model }}"
            @endif
            @if($min)
                min="{{$min}}"
            @endif
            placeholder="{{ $placeholder }}"
            class="block w-full rounded-lg border-0 p-1.5 text-gray-900 drop-shadow-xl placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
        >
    </div>

    @error($name)
        <p class="text-red-500"> {{$message}} </p>   
    @enderror
</div>