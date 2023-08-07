<div class="flex flex-col w-full max-w-2xl p-4 rounded-2xl bg-white gap-4">
    <div class="flex justify-between">
        <div class="flex items-center gap-4">
            <div class="rounded-full h-10 w-10 bg-red-500"></div>
            <h4 class="font-bold">{{$post->user->name}}</h4>
        </div>

        <div class="flex items-center gap-6">
            <div class="flex items-center gap-2">
                {{$post->likes->count()}}

                {{$this->liked}}
                <img src="img\icons\heart-icon.svg" wire:click="likeStore" alt="like" class="h-5">
            </div>
            <img src="img\icons\copy-icon.svg" alt="like" class="h-5">
            
            <img src="img\icons\more-icon.svg" alt="like" class="h-5">
        </div>
    </div>

    <p>{{$post->body}}</p>

    <div class="flex flex-row md:flex-row sm:flex-col gap-4">
        <div class="min-w-3/5 h-64 rounded-2xl bg-gradient-to-r from-gymhunt-purple-1 to-gymhunt-purple-2">

        </div>
        <div class="flex flex-col gap-4 text-xs">
            <p class="text-lg font-bold">Comentários</p>
            @foreach($post->comments as $comment)
                <div class="flex flex-col items-centerflex-col gap-1">
                    <livewire:comment.view :comment="$comment" wire:key="post-{{$comment->post->id}}-comment-{{$comment->id}}" />
                </div>
            @endforeach
            
            <p class="text-gymhunt-purple-1">Ver mais</p>
        </div>
    </div>

    <livewire:comment.create :post_id="$post->id" />

</div>