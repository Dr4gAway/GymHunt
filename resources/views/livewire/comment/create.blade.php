<div class="flex w-full gap-4">
	<div class="flex-none rounded-full h-10 w-10 bg-red-500"></div>
    <textarea wire:model="body" 
	    class=" border-4 border-gymhunt-purple-1
		    focus:outline-none focus:ring ring-gymhunt-purple-2
		    placeholder:text-gymhunt-purple-2
		    rounded-lg px-5 py-3 w-full
		    resize-none"
	    placeholder="Como vai seu treino?"
	    id="comment-{{$post_id}}">
    </textarea>

    <button wire:click="store" class="">
	@php
	    echo file_get_contents("img/icons/send-icon.svg") 
	@endphp
	{{--  <img src="img\icons\send-icon.svg" alt="botão enviar" class="text-gymhunt-purple-1"> --}}
    </button>

    
</div>