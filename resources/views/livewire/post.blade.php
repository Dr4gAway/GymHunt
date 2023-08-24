<div class="flex flex-col w-full max-w-[662px] p-4 rounded-2xl bg-white gap-4">
    <div class="flex justify-between" x-data="{
        copyOpen: false,
        menuOpen: false,

        toClipboard() {
            navigator.clipboard.writeText('localhost:8000/feed/posts/'+ @js($post->id) )
            this.copyOpen = true;
            setTimeout(() => {this.copyOpen = false}, 1000)
        }
    }">
        <div class="flex items-center gap-4">
            <div class="rounded-full h-10 w-10 bg-red-500"></div>
            <h4 class="font-bold">{{$post->user->name}}</h4>
        </div>

        <div class="flex items-center gap-6">
            <div class="flex items-center gap-2 cursor-pointer">
                {{$likesCount}}
                <img src="{{ $liked ? '\img\icons\heart-selected-icon.svg' : '\img\icons\heart-icon.svg' }}" wire:click="handleLike" alt="like" class="h-5">
            </div>
            <div class="relative">
                <div class="absolute bg-gymhunt-purple-2 text-white px-2 py-1 rounded-lg text-xs
                            top-0 left-1/2 -translate-y-[32px] -translate-x-1/2
                            transition-all"
                 x-show="copyOpen">Copiado!</div>
                
                 <img src="\img\icons\copy-icon.svg" alt="like" class="h-5 cursor-pointer"
                x-on:click="toClipboard()">
            </div>
            
            <div class="relative">
                <img src="\img\icons\more-icon.svg" alt="like" class="h-5 cursor-pointer" x-on:click="menuOpen = !menuOpen">

                <ul x-show="menuOpen" class="absolute top-auto right-1 flex flex-col items-end text-right gap-1 bg-white p-4 rounded-md drop-shadow-md w-max">
                    <li class="cursor-pointer hover:bg-gray-100 px-2 flex gap-1">
                        <span>Reportar</span>
                        <img src="\img\icons\flag-icon.svg" alt="like" class="h-5 cursor-pointer">
                    </li>
                    <li class="cursor-pointer hover:bg-gray-100 px-2 flex gap-2">
                        <span>Editar</span>
                        <img src="\img\icons\edit-icon.svg" alt="like" class="h-5 cursor-pointer">
                    </li>
                    <li class="cursor-pointer hover:bg-gray-100 px-2 flex gap-1">
                        <span>Excluir</span>
                        <img src="\img\icons\delete-icon.svg" alt="like" class="h-5 cursor-pointer">
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <p>{{$post->body}}</p>

    @if($this->postType = 4)
        @isset($this->post->images()->first()->path)
            @if($this->vertical)
                <img src="{{$this->post->images()->first()->path}}" class="object-contain max-w-[416px] max-h-[592px]">
            @else
                <img src="{{$this->post->images()->first()->path}}" class="object-cover max-h-[410px]">
            @endif
        @endisset

    @elseif($this->postType = 2)
        <div class="flex w-full h-[315px]">
            @foreach($post->images as $image)
                este
                <img src="{{$image->path}}" class="w-[50px]">
            @endforeach
        </div>

    @endif

    <!-- <div class="min-w-3/5 h-64 rounded-2xl bg-gradient-to-r from-gymhunt-purple-1 to-gymhunt-purple-2"></div> -->

    <livewire:comment.create :post_id="$post->id" />
    {{$post->images->count()}}
    {{$this->postType}}

    {{$this->vertical ? 'sim' : 'nao'}}

    

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
