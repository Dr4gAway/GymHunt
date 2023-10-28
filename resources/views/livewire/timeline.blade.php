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

    deletePost(id) {
        this.deleteOpen = false;
        Livewire.emitTo('timeline', 'timeline::postDeleted', id);
    }

}">

    <livewire:post.create />

    <div x-show="imageOpen">
        <livewire:carousel  />
    </div>

    <div x-show="editOpen">
        <livewire:post.update />
    </div>

    @foreach ($this->posts as $post)
        <livewire:post.view :post="$post" wire:key="post-{{$post->id}}" /> 
    @endforeach

    @if(!$this->posts->onLastPage())
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

        }" x-init="infinityScroll()" class="w-6 h-6">
        </div>
    @endif


</div>