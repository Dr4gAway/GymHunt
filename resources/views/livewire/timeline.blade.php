<div class="flex items-center flex-col w-full max-w-2xl gap-8">
    <livewire:post.create />

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
        }

    }" x-init="infinityScroll()" class="w-6 h-6 bg-blue-500">

    </div>
</div>