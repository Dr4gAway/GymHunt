<div class="fixed inset-0 flex flex-col w-screen h-screen p-8 gap-8" x-data="{
    selected: null,
}">
    <!-- Overlay  -->
    <div class="bg-black bg-opacity-20 fixed inset-0 " x-on:click="editOpen = !editOpen"></div>

    <form wire:submit.prevent="update" method="POST" class="self-center w-full flex gap-4 bg-white p-4 rounded-2xl max-w-2xl z-20"  enctype="multipart/form-data" >
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

            <input type="file" wire:model="images">

            @error('images.*') <span class="error">{{ $message }}</span> @enderror

            @isset($images)

                <div class="flex gap-8 drop-shadow-md">
                    @foreach($images as $index => $image)
                        @if(is_string($image))
                            <div class="relative">
                                <img src="{{ $image }}" class="w-[100px] h-[100px] object-cover rounded-2xl">
                                <img src="\img\icons\delete-icon.svg" alt="remove image"
                                wire:click="removeImage({{$index}})"
                                class="h-10 absolute bottom-0 right-0 translate-x-1/2
                                    bg-white p-1 rounded-full cursor-pointer drop-shadow-md">
                            </div>

                        @else

                            <div class="relative">
                                <img src="{{ $image->temporaryUrl() ?: $image }}" class="w-[100px] h-[100px] object-cover rounded-2xl">
                                <img src="\img\icons\delete-icon.svg" alt="remove image"
                                wire:click="removeImage({{$index}})"
                                class="h-10 absolute bottom-0 right-0 translate-x-1/2
                                    bg-white p-1 rounded-full cursor-pointer drop-shadow-md">
                            </div>
                        
                        @endif

                       
                    @endforeach
                </div>
            @endisset
        </div>
        
    </form>
</div>
