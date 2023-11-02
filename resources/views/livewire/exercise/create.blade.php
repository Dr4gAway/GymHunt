<div x-data="{
    createModal: false,

    openExerciseCreate() {
        this.createModal = true;
        disableScroll();
    },

    closeCreateExercise() {
        this.createModal = false;
        enableScroll();
    }
}">
    <div class="absolute inset-0 flex justify-center w-full z-20" x-show="createModal">
        <!-- Overlay  -->
        <div class="bg-black bg-opacity-20 fixed w-full h-full" x-on:click="closeCreateExercise()"></div>

        <form wire:submit.prevent="store" method="post" enctype="multipart/form-data"
              class="flex flex-col self-center w-fit h-fit p-8 rounded-md bg-white gap-4 z-30"
        >
            <div class="grid grid-flow-col justify-between items-stretch font-bold">
                <p> <i class="fa-solid fa-plus"></i> Adicionar exercício</p>   
                <button x-on:click.prevent="closeCreateExercise()"> <i class="fa-solid fa-x"></i> </button>
            </div>
            
            <div class="flex flex-col gap-2">
                <x-form.text name="muscle" type="text" label="Grupo Muscular" placeholder="Peitoral" model="muscle" />
                <x-form.text name="name" type="text" label="Exercício" placeholder="Supino" model="name" />
            </div>
            <div class="flex flex-row justify-evenly space-x-8">
                <x-form.text name="serie" type="number" label="Série" placeholder="" model="series"/> 
                <x-form.text name="repetitions" type="number" label="Repetições" placeholder="" model="repetitions" /> 
                <x-form.text name="carga" type="number" label="Carga" placeholder="" model="weight" /> 
            </div>

            <x-form.text name="made_data" type="date" label="Data" placeholder="" model="made_date" /> 

            <div class="grid grid-flow-col justify-between space-x-2">
                <button type="submit" x-on:click="closeExerc()" class="justify-center rounded-lg bg-gymhunt-purple-2 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancelar</button>
                <button wire:click.prevent="store"
                        class="justify-center rounded-lg bg-gymhunt-purple-1 px-5 p-1.5 text-sm
                               font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline
                               focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Salvar
                </button>
                
            </div>
        </form>
    </div>

    <button x-on:click.prevent="openExerciseCreate()"
        class="rounded-xl border-dashed border-4 border-gymhunt-purple-1 bg-gymhunt-purple-2 opacity-60 shadow-lg p-4 my-4 h-48 w-72" x-on:click="openExerc()">
        <div class="text-gymhunt-purple-1 font-bold text-2xl">
            <p>Adicionar</p>
            <p>Exercício!</p>
        </div>
    </button>
</div>