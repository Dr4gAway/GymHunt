<div class="flex items-start justify-between gap-2">
    <div class="flex gap-2">
        <span class="flex-none rounded-full h-10 w-10 bg-red-500"></span>
        <div class="flex flex-col gap-0">
            <p  class="font-semibold">{{$comment->user->name}}</p>
            <p class="grow font-medium">{{ $comment->body }}</p>
        </div>
    </div>

    <div class="flex items-center gap-2">
        {{$likesCount}}
        <img src="{{ $liked ? '\img\icons\heart-selected-icon.svg' : '\img\icons\heart-icon.svg' }}" wire:click="handleLike" alt="like" class="cursor-pointer h-5">
    </div>
</div>
