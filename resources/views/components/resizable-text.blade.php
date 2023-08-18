@props([
    'model' => null,
    'placeholder' => 'placeholder',
])

<div class="w-full">
    <textarea
        x-data="{ resize: () => { $el.style.height = 'auto'; $el.style.height = ($el.scrollHeight + 5) + 'px' } }"
        wire:model="{{ $model }}"
        x-init="resize()"
        @input="resize()"
        wire:ignore
        placeholder="{{ $placeholder }}"
        class=" border-4 border-gymhunt-purple-1
                focus:outline-none focus:ring ring-gymhunt-purple-2
                placeholder:text-gymhunt-purple-2
                rounded-lg px-5 py-3 w-full resize-none overflow-hidden"
        >
    </textarea>

</div>