<div class="flex items-center flex-col w-full max-w-2xl gap-8" wire:poll.1000ms>
    <livewire:post.create />

    @foreach ($this->posts as $post)
        <livewire:post :post="$post" wire:key="post-{{$post->id}}" /> 
    @endforeach
</div>
