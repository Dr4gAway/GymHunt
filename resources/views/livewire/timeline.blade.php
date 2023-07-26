<div class="flex items-center flex-col w-full max-w-2xl gap-8">
    <livewire:post.create />

    @foreach ($this->posts as $post)
        <livewire:post :post="$post" wire:key="post-{{$post->id}}" /> 
    @endforeach
</div>
