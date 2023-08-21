<form wire:submit.prevent="store" method="POST" class="w-full flex gap-4 bg-white p-4 rounded-2xl"  enctype="multipart/form-data" >
    <span class="rounded-full h-10 w-10 bg-blue-500"></span>

    <div class="flex flex-col w-full gap-4">
        <div class="flex">
            <x-resizable-text model="body" placeholder="Como vai seu treino?" />
            
            <button type="submit">
    
                @php
                   echo file_get_contents("img/icons/send-icon.svg") 
                @endphp
               
            </button>
        </div>

        <input type="file" wire:model="photo">

        @error('photo') <span class="error">{{ $message }}</span> @enderror

        @isset($photo)
            photo Preview:
            <img src="{{ $photo->temporaryUrl() }}">
        @endisset
    </div>
    
</form>
