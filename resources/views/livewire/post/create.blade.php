<div class="w-full flex flex-col">
    Testando muito foda
    {{ $body }}
    <textarea wire:model="body" class="resize-none"></textarea>
    @error('body')
        {{$message}}
    @enderror
    <button wire:click="store" class="">Enviar</button>
</div>
