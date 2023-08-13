<div class="flex items-centerflex-col gap-2">
    <span class="flex-none rounded-full h-10 w-10 bg-red-500"></span>
    <div class="flex flex-col gap-0">
        <p  class="font-semibold">{{$comment->user->name}}</p>
        <p class="grow font-medium">{{ $comment->body }}</p>
    </div>
</div>
