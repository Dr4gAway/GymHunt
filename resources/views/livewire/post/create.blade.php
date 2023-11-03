<form wire:submit.prevent="store" method="POST" class="w-full flex gap-4 bg-white p-4 rounded-2xl"  enctype="multipart/form-data" >
    
    @auth
        <img src="/{{Auth::user()->avatar}}" class="flex-none rounded-full h-10 w-10 overflow-hidden">
    @endauth
    @guest
        <img src="{{URL::asset('img\profile\default_avatar.jpeg')}}" class="flex-none rounded-full h-10 w-10 overflow-hidden">
    @endguest
    <div class="flex flex-col w-full gap-4">
        <div class="flex gap-4">
            <x-resizable-text model="body" placeholder="Como vai seu treino?" />
            
            <button type="submit">
                @php
                   echo file_get_contents("img/icons/send-icon.svg") 
                @endphp
            </button>
        </div>

        <input type="file" wire:model="photos">

        @isset($photos)
            <div class="flex gap-8 drop-shadow-md">
                @foreach($photos as $index => $photo)
                    <div class="relative">
                        <img src="{{ $photo->temporaryUrl() }}" class="w-[100px] h-[100px] object-cover rounded-2xl">
                        <img src="\img\icons\delete-icon.svg" alt="remove image"
                        wire:click="removeImage({{$index}})"
                        class="h-10 absolute bottom-0 right-0 translate-x-1/2
                             bg-white p-1 rounded-full cursor-pointer drop-shadow-md">
                    </div>
                @endforeach
            </div>
        @endisset
        @if($errors->any())
            <div class="flex flex-col text-red-500">
                {!! implode('', $errors->all(':message')) !!}
            </div>
        @endif
    </div>
    
</form>
