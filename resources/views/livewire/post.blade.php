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

                <ul x-show="menuOpen" class="absolute z-10 top-auto right-1 flex flex-col items-end text-right gap-1 bg-white p-4 rounded-md w-max">
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

    <div x-data="{
        imageOpen: false,

        updateImages(images) {

            this.imageOpen = true

            Livewire.emit('carousel::updated', images)
        }

    }">

    
        <div x-show="imageOpen">
            <livewire:carousel  />
        </div>

        <button x-on:click="updateImages({{$this->post->images}})">update</button>


        

        @if($this->postType == 1)
            <div x-on:click="imageOpen = !imageOpen">
                @isset($this->post->images()->first()->path)
                    @if($this->vertical)
                        <img src="/{{$this->post->images()->first()->path}}" class="rounded-2xl object-contain max-w-[416px] max-h-[592px]">
                    @else
                        <img src="/{{$this->post->images()->first()->path}}" class="w-full rounded-2xl object-cover max-h-[410px]">
                    @endif
                @endisset
            </div>
        @elseif($this->postType == 2)
            <div class="flex max-w-full gap-1 h-[315px] rounded-2xl overflow-hidden">
                @foreach($post->images as $image)
                    <img src="/{{$image->path}}" class="w-1/2 object-cover">
                @endforeach
            </div>
        @elseif($this->postType == 3)
            <div class="flex max-w-full gap-1 h-[315px] rounded-2xl overflow-hidden">
                <img src="/{{$post->images[0]->path}}" class="w-1/2 object-cover">
                <div class="w-1/2 flex flex-col gap-1">
                    @foreach ($post->images as $index => $image)
                        @if ($index != 0)
                            <img src="/{{$image->path}}" class="w-full h-1/2 object-cover">
                        @endif
                    @endforeach
                </div>
            </div>
        @elseif($this->postType == 4)
            <div class="flex max-w-full gap-1 h-[315px] rounded-2xl overflow-hidden cursor-pointer">
                <img src="/{{$post->images[0]->path}}" class="w-full object-cover">
                <div class="relative w-full flex flex-col gap-1">
                    @foreach ($post->images as $index => $image)
                        @if($index > 2)
                            @break
                        @elseif ($index != 0)
                            <img src="/{{$image->path}}" class="w-full h-1/2 object-cover">
                        @endif
                    @endforeach
                    <div class="absolute grid place-content-center w-full h-full bg-gymhunt-purple-2 opacity-50">
                        <span class="text-8xl text-white pointer-events-none">+{{$post->images->count() - 3}}</span>
                    </div>
                </div>
            </div>
        @endif

    </div>

    <livewire:comment.create :post_id="$post->id" />
    
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
