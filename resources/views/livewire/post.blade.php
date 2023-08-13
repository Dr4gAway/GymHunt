<div class="flex flex-col w-full max-w-[662px] p-4 rounded-2xl bg-white gap-4">
    <div class="flex justify-between">
        <div class="flex items-center gap-4">
            <div class="rounded-full h-10 w-10 bg-red-500"></div>
            <h4 class="font-bold">{{$post->user->name}}</h4>
        </div>

        <div class="flex items-center gap-6">
            <div class="flex items-center gap-2 cursor-pointer">
                {{$likesCount}}
                <img src="{{ $liked ? '\img\icons\heart-selected-icon.svg' : '\img\icons\heart-icon.svg' }}" wire:click="handleLike" alt="like" class="h-5">
            </div>
            <img src="\img\icons\copy-icon.svg" alt="like" class="h-5">
            
            <img src="\img\icons\more-icon.svg" alt="like" class="h-5">
        </div>
    </div>

    <p>{{$post->body}}</p>

    <div class="min-w-3/5 h-64 rounded-2xl bg-gradient-to-r from-gymhunt-purple-1 to-gymhunt-purple-2"></div>

    <livewire:comment.create :post_id="$post->id" />

    <div class="w-full h-px bg-gymhunt-purple-2"></div>
    
    <div class="flex flex-col gap-4">
        @if($this->comments->first())
            @if($showAll)
                <div class="flex gap-2 items-center">
                    <p class="text-lg font-bold">Comentários</p>
                    <span>•</span>
                    <p class="leading-none">{{$this->comments->count()}}</p>
                </div>
                @foreach($this->comments as $comment)
                    <livewire:comment.view :comment="$comment" wire:key="post-{{$comment->post->id}}-comment-{{$comment->id}}" />
                @endforeach
            @else
                <div class="flex gap-2 items-center">
                    <p class="text-lg font-bold">Comentários</p>
                    <span>•</span>
                    <p class="leading-none">{{$this->comments->count()}}</p>
                </div>
                
                <div class="relative">
                    <livewire:comment.view :comment="$this->comments->first()" wire:key="post-{{$this->post->id}}-comment-{{$this->comments->first()->id}}" />
                    <span class="pointer-events-none absolute bottom-0 left-0 w-full h-[36px] bg-gradient-to-t from-white"></span>
                </div>

                <a href="{{route('post', ['id' => $post->id])}}" class="font-semibold text-gymhunt-purple-1 self-center">Veja mais</a>
            @endif
        @else
            <span class="font-semibold self-center text-gymhunt-purple-2 text-center">Nenhum comentário ainda!</span>
        @endif
    </div>
</div>
