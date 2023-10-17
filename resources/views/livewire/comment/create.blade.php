<div class="flex w-full gap-4">
	<div class="flex-none rounded-full h-10 w-10 bg-red-500"></div>
    <x-resizable-text model="body" placeholder="O que você achou?" />
	
    <button wire:click="store">
		@php
			echo file_get_contents("img/icons/send-icon.svg") 
		@endphp
		{{--  <img src="img\icons\send-icon.svg" alt="botão enviar" class="text-gymhunt-purple-1"> --}}
    </button>

    
</div>