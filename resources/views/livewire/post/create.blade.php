<div class="w-full flex gap-4 bg-white p-4 rounded-2xl">
    <span class="rounded-full h-10 w-10 bg-blue-500"></span>

    <div class="flex w-full gap-4">

        <x-resizable-text model="body" customClasses="['w-full']" placeholder="Como vai seu treino?" />
        
        <button wire:click="store" class="">

            @php
               echo file_get_contents("img/icons/send-icon.svg") 
            @endphp
           
        </button>
    </div>
    
</div>
