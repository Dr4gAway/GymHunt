<div class="fixed z-10 top-0 left-0 flex flex-col w-full h-full bg-black bg-opacity-20 p-8 gap-8" x-data="{
    selected: null,


}">

    @if($imageSelected)
        <img src="/{{$imageSelected}}" class="max-w-full max-h-full w-full h-full object-contain z-20">
    @endif

    <div class="flex w-full items-center justify-center gap-4">
        @foreach($images as $image)
            <img src="/{{$image['path']}}" class="w-32 h-32 object-cover cursor-pointer z-20" wire:click="changeImage('{{ $image['path'] }}')">
        @endforeach
    </div>
</div>
