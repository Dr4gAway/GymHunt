<div class="fixed z-10 inset-0  flex flex-col w-screen h-screen p-8 gap-8" x-data="{
    selected: null,
}">
    <div class="bg-black bg-opacity-20 fixed inset-0 z-10" x-on:click="imageOpen = !imageOpen">
</div>
    @if($imageSelected)
        <img src="/{{$imageSelected}}" class="max-h-full h-full object-scale-down z-30 bg-black bg-opacity-40">
    @endif

    <div class="flex w-full h-fit items-center justify-center gap-4">
        @foreach($images as $image)
            @if($image['path'] == $imageSelected)
                <div class="cursor-pointer z-20 overflow-hidden ring ring-gymhunt-purple-2 ring-offset-4 ring-offset-gymhunt-purple-2">
                    <img src="/{{$image['path']}}" class="object-cover w-32 h-32" wire:click="changeImage('{{ $image['path'] }}')">
                </div>
            @else
                <div class="cursor-pointer z-20 overflow-hidden">
                    <img src="/{{$image['path']}}" class="object-cover w-32 h-32" wire:click="changeImage('{{ $image['path'] }}')">
                </div>
            @endif
        @endforeach
    </div>
</div>
