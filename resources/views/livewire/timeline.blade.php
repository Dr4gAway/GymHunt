<div class="flex items-center flex-col w-full gap-8">
    @foreach ($this->posts as $post)
        <livewire:post :post="$post" /> 
    @endforeach
</div>
