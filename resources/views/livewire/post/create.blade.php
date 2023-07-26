<div class="w-full flex gap-4 bg-white p-4 rounded-2xl">
    <span class="rounded-full h-10 w-10 bg-blue-500"></span>

    <div class="flex w-full gap-4">
        <textarea wire:model="body" rows="1"
                class=" border-4 border-gymhunt-purple-1
                        focus:outline-none focus:ring ring-gymhunt-purple-2
                        placeholder:text-gymhunt-purple-2
                        rounded-lg px-5 py-3 w-full
                        resize-none"
                placeholder="Como vai seu treino?">
        </textarea>
        
        
        <button wire:click="store" class="">

            @php
               echo file_get_contents("img/icons/send-icon.svg") 
            @endphp
           {{--  <img src="img\icons\send-icon.svg" alt="botão enviar" class="text-gymhunt-purple-1"> --}}
        </button>
    </div>
    
</div>
