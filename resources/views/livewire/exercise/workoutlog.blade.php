@section('titulo', 'GymHunt - Exercícios')

<div class="p-4 flex flex-col gap-4 w-full min-h-full items-center bg-gymhunt-purple-2 bg-[url('/public/img/backAvaliaçao.svg')]" x-data="{
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

    createMuscle: false,

    openCreateMuscle() {
        this.createMuscle = true,
        disableScroll()
    },

    closeCreateMuscle() {
        this.createMuscle = false 
        enableScroll()
    }, 
}">

    <div class="flex gap-2 items-center cursor-pointer justify-start w-full max-w-[1280px]">
        
        <button id="createGroup" class="flex flex-col justify-center" {{-- x-on:click="openCreateMuscle()" --}}>
            <i class="fa-solid fa-plus fa-lg rounded-full bg-gymhunt-purple-1 py-4 px-2"></i>
        </button>

        {{-- Actually grupo muscular --}}
        <label class="text-2xl text-black font-semibold" for="createGroup">Adicionar exercício</label>
        
        {{-- Create Muscle Group Modal --}}
        <div class="fixed inset-0 flex flex-col w-screen h-screen p-8 gap-8 z-20" x-show="createMuscle">
            <!-- Overlay  -->
            <div class="bg-black bg-opacity-20 fixed inset-0 " x-on:click="closeCreateMuscle()"></div>

            <div class="flex flex-col self-center gap-8 w-full max-w-xl bg-white p-6 rounded-2xl z-20">
                <div class="flex justify-between w-full font-bold text-lg">
                    <div>
                        <i class="fa-solid fa-plus"></i>
                        <span>Adicionar grupo muscular</span>
                    </div>
                    <button class="font-black" x-on:click="closeCreateMuscle()"> <i class="fa-solid fa-x"></i> </button>
                </div>
                
                <x-form.text name="groupMusc" label="Grupo(s) Muscular(es)" placeholder="Escolha a categoria" />  <!--essa info vai para o nome do grupo -->

                <div class="grid grid-flow-col justify-between space-x-2">
                    <button type="submit" x-on:click="closeCreateMuscle()" class="  justify-center rounded-lg bg-gymhunt-purple-2 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancelar</button>
                    <button type="submit" class="justify-center rounded-lg bg-gymhunt-purple-1 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="justify-start w-full max-w-[1280px]">
        <livewire:exercise.create />
    </div>

    <div class="flex flex-col gap-4 justify-self-start w-full max-w-[1280px]">
    @foreach ($this->exerciseGroup as $date => $exercisesByMuscle)
        <div class="flex flex-col gap-4">
            <div class="text-2xl font-semibold">
                <i class="fa-solid fa-circle"></i>
                <span>{{ date('d/m/Y', strtotime($date)) }}</span> 
            </div>

            <div class="flex flex-col gap-2">
                @foreach ($exercisesByMuscle as $index => $exercises)
                <div class="flex flex-col gap-2" x-data="{
                    showGroup: true,
                }">
                    <button x-on:click="showGroup = !showGroup"
                        class="w-fit rounded-xl px-2 py-1 bg-slate-200 shadow-lg"
                    >
                        <i :class=" showGroup === false ? '-rotate-90' : '' "
                            class="transition-transform fa-solid fa-chevron-down"></i>
                        <span>{{$index}}</span>
                    </button>
                    <div class="overflow-x-scroll" x-show="showGroup" x-transition.opacity
                                                                      x-transition:enter.duration.300ms
                                                                      x-transition:leave.duration.300ms>
                        <livewire:exercise.timeline :made_date="$date" :exercises="$exercises" wire:key="timeline-{{Ramsey\Uuid\Uuid::uuid4()}}" />
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endforeach
    </div>
    
</div>