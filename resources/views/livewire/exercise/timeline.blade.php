<div class="flex items-center gap-4">
    @foreach($this->exercises as $exercise)
        <livewire:exercise.view :exercise="$exercise" wire:key="exercise-view--{{Ramsey\Uuid\Uuid::uuid4()}}" />
    @endforeach

    <livewire:exercise.create :made_date="date('Y-m-d', strtotime($made_date))" :muscle="$exercise->muscle" />
</div>
