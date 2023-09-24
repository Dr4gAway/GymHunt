<div class="flex items-start justify-between gap-2" x-data="{
    deleteOpen: false,

    deletePost() {
        this.deleteOpen = false;
        $wire.handleDelete();
    }
}">
    <!-- Delete modal -->
    <div class="fixed z-10 inset-0 place-self-center flex flex-col items-center justify-center w-screen h-screen" x-show="deleteOpen">
        <div class="relative z-40 flex flex-col gap-3 items-center bg-white w-fit rounded-2xl max-w-xl" x-on:click.away="deleteOpen = false">
            <div class="flex items-center p-4 gap-4">
                <img src="\img\icons\warning-icon.svg" alt="like" class="h-24 cursor-pointer">
                <div>
                    <span class="font-semibold text-2xl">Você está deletando um comentário</span>
                    <p>Você está prestes a deletar um comentário. Esta ação não poderá ser desfeita, tem certeza?</p>
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

    <div class="flex gap-2">
        <span class="flex-none rounded-full h-10 w-10 bg-red-500"></span>
        <div class="flex flex-col gap-0">
            <p  class="font-semibold">{{$comment->user->name}}</p>
            <p class="grow font-medium">{{ $comment->body }}</p>
        </div>
    </div>

    <div class="flex items-center gap-2">
        <div class="flex items-center gap-2">
            {{$likesCount}}
            <img src="{{ $liked ? '\img\icons\heart-selected-icon.svg' : '\img\icons\heart-icon.svg' }}" wire:click="handleLike" alt="like" class="cursor-pointer h-5">
        </div>
        @can('delete', $comment)
            <img src="\img\icons\delete-icon.svg" alt="like" class="h-7 cursor-pointer" x-on:click="deleteOpen = true">
        @endcan
    </div>

</div>
