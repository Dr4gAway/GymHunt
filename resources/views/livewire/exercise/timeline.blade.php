<div class="flex items-center gap-4">
    @foreach($this->exercises as $exercise)
        <livewire:exercise.view :exercise="$exercise" wire:key="exercise-view--{{Ramsey\Uuid\Uuid::uuid4()}}" />
    @endforeach

    @php
        $teste = date('d/m/Y', strtotime($made_date));
        
    @endphp

    <livewire:exercise.create :made_date="$teste"  :muscle="$exercise->muscle" />
</div>
