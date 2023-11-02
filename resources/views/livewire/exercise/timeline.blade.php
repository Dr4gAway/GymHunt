<div>
    @foreach($this->exercises as $exercise)
        <livewire:exercise.view :exercise="$exercise" />
    @endforeach

    <livewire:exercise.create />
</div>
