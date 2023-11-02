<div class="rounded-xl bg-white shadow-lg p-4 min-w-[280px]"> <!--cada card-->

    <div class="flex flex-row items-center justify-between"x-data="{
        deleteExercise: false,

        handleDelete() {
            this.deleteExercise = false;
            $wire.handleDelete();
            enableScroll();
        },

        openDeleteExercise() {
            this.deleteExercise = true;
            disableScroll();
        },

        closeDeleteExercise() {
            this.deleteExercise = false;
            enableScroll();
        }
    }">
        <p class="font-semibold text-gymhunt-purple-1">{{$exercise->name}}</p>

        <button class="text-red-500"> <i class="fa-solid fa-trash-can" x-on:click.prevent="openDeleteExercise()"></i> </button>
        
        <div class="fixed inset-0 z-10 flex flex-col items-center justify-center w-full h-full" x-show="deleteExercise">
            <div class="bg-black bg-opacity-20 fixed inset-0 " x-on:click.prevent="closeDeleteExercise()"></div>

            <div class="flex flex-col z-20 gap-4 rounded-2xl max-w-xl bg-white">
                <div class="flex items-center p-4 gap-4">
                    <img src="\img\icons\warning-icon.svg" alt="like" class="h-20 cursor-pointer">
                    <div>
                        <span class="font-semibold text-2xl">Você está deletando um exercício</span>
                        <p>Você está prestes a deletar um exercício. Esta ação não poderá ser desfeita, tem certeza?</p>
                    </div>
                </div>
    
                <div class="flex gap-2 bg-gymhunt-grey-1 w-full justify-end p-4 rounded-b-xl"> 
                    <button class=" px-4 py-2 hover:text-gymhunt-purple-1" x-on:click.prevent="closeDeleteExercise()">
                        Cancelar
                    </button>
                    <button class="bg-gymhunt-purple-1 hover:bg-gymhunt-purple-2 rounded-2xl px-4 py-2 text-white font-semibold flex items-center gap-1"
                            x-on:click="handleDelete()"
                    >
                        <img src="\img\icons\check-white-icon.svg" class="h-6" alt="">
                        Confirmar
                    </button>
                </div> 
            </div>
            
        </div>
    </div>

    <div class="space-y-3"> <!--infos-->
        <div class="flex flex-row justify-between">
            <p class="font-bold">Série</p>
            <p>{{$exercise->series}}</p>
        </div>

        <div class="flex flex-row justify-between">
            <p class="font-bold">Repetições</p>
            <p>{{$exercise->repetitions}}</p>
        </div>

        <div class="flex flex-row justify-between">
            <p class="font-bold">Carga</p>
            <p>{{$exercise->weight}} kg</p>
        </div>

        <div class="flex flex-row justify-between">
            <p class="font-bold">Data</p>
            <p>{{date('d/m/y', strtotime($exercise->made_date)) }}</p>
        </div>
    </div>
</div>