<div class="flex flex-col w-full max-w-[662px] p-4 rounded-2xl bg-white gap-4" x-data="{
    
}">
    <div class="flex justify-between" x-data="{
        copyOpen: false,
        menuOpen: false,
        deleteOpen: false,

        toClipboard() {
            navigator.clipboard.writeText('localhost:8000/feed/posts/'+ @js($post->id) )
            this.copyOpen = true;
            setTimeout(() => {this.copyOpen = false}, 1000)
        },

        updatePost(post, images) {
            this.editOpen = true
            Livewire.emit('post::updateRequest', post, images)

            disableScroll()
        },

        deletePost() {
            this.deleteOpen = false;

            if(@js(Route::currentRouteName()) != 'post')
                $wire.handleDelete(false);
            else
                $wire.handleDelete(true);
        }
    }">

        <!-- Delete modal -->

        <div class="fixed z-10 inset-0 place-self-center flex flex-col items-center justify-center w-screen h-screen" x-show="deleteOpen">
            <div class="relative z-40 flex flex-col gap-3 items-center bg-white w-fit rounded-2xl max-w-xl" x-on:click.away="deleteOpen = false">
                <div class="flex items-center p-4 gap-4">
                    <img src="\img\icons\warning-icon.svg" alt="like" class="h-24 cursor-pointer">
                    <div>
                        <span class="font-semibold text-2xl">Você está deletando um post</span>
                        <p>Você está prestes a deletar um post. Esta ação não poderá ser desfeita, tem certeza?</p>
                    </div>
                </div>

                <div class="flex gap-2 bg-gymhunt-grey-1 w-full justify-end p-4 rounded-b-xl"> 
                    <button class=" px-4 py-2 hover:text-gymhunt-purple-1" x-on:click="deleteOpen = false" >Cancelar</button>
                    <button class="bg-gymhunt-purple-1 hover:bg-gymhunt-purple-2 rounded-2xl px-4 py-2 text-white font-semibold flex items-center gap-1"
                            x-on:click="deletePost">
                        <img src="\img\icons\check-white-icon.svg" class="h-6" alt="">
                        Confirmar
                    </button>
                </div> 
            </div>

            <!-- Overlay -->
            <div class="bg-black bg-opacity-20 fixed inset-0" x-on:click="closeModal()"></div>
        </div>

        <!-- End Modal -->

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
                <img src="\img\icons\more-icon.svg" alt="like" class="h-5 cursor-pointer" x-on:click="menuOpen = !menuOpen" x-on:click.away="menuOpen = false">

                <ul x-show="menuOpen" class="absolute z-10 top-auto right-1 flex flex-col items-end text-right gap-1 bg-white p-4 rounded-md w-max">
                    <li class="cursor-pointer hover:bg-gray-100 px-2 flex gap-1">
                         <span>Reportar</span>
                        <img src="\img\icons\flag-icon.svg" alt="like" class="h-5 cursor-pointer">
                    </li>

                    @can('update', $post)
                    <li class="cursor-pointer hover:bg-gray-100 px-2 flex gap-2" x-on:click="updatePost({{ $post }}, {{$this->post->images->pluck('path')}})">
                        <span>Editar</span>
                        <img src="\img\icons\edit-icon.svg" alt="like" class="h-5 cursor-pointer">
                    </li>
                    @endcan
                    @can('delete', $post)

                    <li class="cursor-pointer hover:bg-gray-100 px-2 flex gap-1" x-on:click="deleteOpen = !deleteOpen" x-on:click.away="deleteOpen = false">
                        <span>Excluir</span>
                        <img src="\img\icons\delete-icon.svg" alt="like" class="h-5 cursor-pointer" >
                    </li>

                    @endcan
                </ul>
            </div>

        </div>
    </div>

    <p>{{$post->body}}</p>

    <div x-data="{
        updateImages(images) {
            imageOpen = true

            console.log(imageOpen)
            disableScroll();
            Livewire.emitTo('carousel', 'carousel::updated', images)
        }
    }">

        @if($this->postType == 1)
            <div x-on:click="updateImages({{$this->post->images}})" class="cursor-pointer">
                @isset($this->post->images()->first()->path)
                    @if($this->vertical)
                        <img src="/{{$this->post->images()->first()->path}}" class="rounded-2xl object-contain max-w-[416px] max-h-[592px]">
                    @else
                        <img src="/{{$this->post->images()->first()->path}}" class="w-full rounded-2xl object-cover max-h-[410px]">
                    @endif
                @endisset
            </div>
        @elseif($this->postType == 2)
            <div x-on:click="updateImages({{$this->post->images}})" class="flex max-w-full gap-1 h-[315px] rounded-2xl overflow-hidden cursor-pointer">
                @foreach($post->images as $image)
                    <img src="/{{$image->path}}" class="w-1/2 object-cover">
                @endforeach
            </div>
        @elseif($this->postType == 3)
            <div x-on:click="updateImages({{$this->post->images}})" class="flex max-w-full gap-1 h-[315px] rounded-2xl overflow-hidden cursor-pointer">
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
            <div x-on:click="updateImages({{$this->post->images}})" class="flex max-w-full gap-1 h-[315px] rounded-2xl overflow-hidden cursor-pointer">
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
                    <p class="leading-none">{{$this->post->comments->count()}}</p>
                </div>
                @foreach($this->comments as $comment)
                    <livewire:comment.view :comment="$comment" wire:key="post-{{$comment->post->id}}-comment-{{$comment->id}}" />
                @endforeach

                @if(!$this->comments->onLastPage())
                <div class="relative flex justify-center">
                    <span class="pointer-events-none absolute top-0 translate-y-[-150%] left-0 w-full h-[36px] bg-gradient-to-t from-white"></span>
                    <button wire:click="incrementComments()" class="bg-gymhunt-purple-1 hover:bg-gymhunt-purple-2 rounded-2xl px-4 py-2 text-white font-semibold flex items-center gap-1">
                        Mostrar mais
                    </button>
                </div>
                @endif

            @else
                <div class="flex gap-2 items-center">
                    <p class="text-lg font-bold">Comentários</p>
                    <span>•</span>
                    <p class="leading-none">{{$this->post->comments->count()}}</p>
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
