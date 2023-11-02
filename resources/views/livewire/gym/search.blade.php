
<div class="absolute z-10 top-4 left-4 flex flex-col gap-4 font-poppins">
    <x-form.text name="search" placeholder="Pesquisar academias" model="search" class="w-[432px]" />
    <div class="max-h-[500px] rounded-2xl overflow-y-scroll flex flex-col gap-4">
        @foreach ($this->gyms as $gym)  
                <livewire:gym.view :name="$gym->name" :gymId="$gym->id" wire:key="gym-{{$gym->id}}"/>
        @endforeach
    </div>
</div>