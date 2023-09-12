<div class="flex items-center flex-col w-full max-w-2xl gap-8" x-data="{
    imageOpen: false,
    editOpen: false,

    disableScroll() {
        scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
        window.onscroll = () => {
            window.scrollTo(scrollLeft, scrollTop);
        }
    },

    enableScroll() {
        window.onscroll = function() {};
    },

    updatePost(post, images) {
        this.editOpen = true
        menuOpen = false
        Livewire.emit('post::updateRequest', post, images)

        disableScroll()
    }
}">

    <livewire:post.create />

    <div x-show="imageOpen">
        <livewire:carousel  />
    </div>

    <div x-show="editOpen">
        <livewire:post.update />
    </div>

    <div class="fixed place-self-center">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="relative z-40 self-center justify-self-center flex flex-col gap-3 items-center bg-white p-4 w-fit rounded-2xl max-w-2xl">
            <p>Tem certeza?</p>

            <div class="flex gap-2"> 
                <button class="bg-red-500 rounded-2xl px-4 py-2">Cancelar</button>
                <button class="bg-green-500 rounded-2xl px-4 py-2">Confirmar</button>
            </div> 
        </div>
    
        <div class="bg-black bg-opacity-20 fixed inset-0" x-on:click="closeModal()"></div>
    </div>


    @foreach ($this->posts as $post)
        <livewire:post :post="$post" wire:key="post-{{$post->id}}" /> 
    @endforeach

    <div x-data="{
        infinityScroll() {
            const observer = new IntersectionObserver((items) => {
                items.forEach((item) => {
                    if(item.isIntersecting)
                        @this.loadMore();
                    })
                }, {
                    rootMargin: '300px'
                })
                observer.observe(this.$el)
        },

    }" x-init="infinityScroll()" class="w-6 h-6 bg-blue-500">
    </div>

</div>