@props([
    'model' => null,
    'placeholder' => 'placeholder',
])


{{-- 
    resize = () => {
        $el.style.height == 0 ? 'auto' : ($el.scrollHeight + 5) + 'px';
    }
    --}}
<div class="w-full">
    <textarea
        x-data="{
            resize() {
                if ($el.style.height != 0) {
                    $el.style.height = 'auto';
                    $el.style.height = ($el.scrollHeight + 8) + 'px'
                }
                else
                    $el.style.height = 'auto'
            }
        }"
        wire:model="{{ $model }}"
        x-init="resize()"
        @input="resize()"
        wire:ignore
        placeholder="{{ $placeholder }}"
        class=" border-4 border-gymhunt-purple-1
                focus:outline-none focus:ring ring-gymhunt-purple-2
                placeholder:text-gymhunt-purple-2
                min-h-fit
                rounded-lg px-5 py-3 w-full resize-none overflow-hidden"
        >
    </textarea>

</div>