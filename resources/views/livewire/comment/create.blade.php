<div class="flex w-full gap-4">
	@auth
		<img src="/{{Auth::user()->avatar}}" class="flex-none rounded-full h-10 w-10 overflow-hidden">
    @endauth
    @guest
        <img src="{{URL::asset('img\profile\default_avatar.jpeg')}}" class="flex-none rounded-full h-10 w-10 overflow-hidden">
    @endguest
	
    <x-resizable-text model="body" placeholder="O que você achou?" />
	
    <button wire:click="store">
		@php
			echo file_get_contents("img/icons/send-icon.svg") 
		@endphp
		{{--  <img src="img\icons\send-icon.svg" alt="botão enviar" class="text-gymhunt-purple-1"> --}}
    </button>

    
</div>