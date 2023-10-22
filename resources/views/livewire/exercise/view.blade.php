<div class="rounded-xl bg-white shadow-lg p-4 my-4 w-72"> <!--cada card-->

    <div class="flex flex-row items-center justify-between mb-2"x-data="{
        deleteOpen: false,
        deleteExercise:false,

        deleteExercise() {
            this.deleteOpen = true;

            if(@js(Route::currentRouteName()) != 'exercise')
                $wire.handleDelete(false);
            else
                $wire.handleDelete(true);
        },

        modalClose() {
            this.deleteOpen = false 
        },
    }"> <!--nome do exercicio-->
        <p class="font-semibold">{{$this->exercise->nameExerc}}</p>
        <button class="text-red-500"> <i class="fa-solid fa-trash-can" x-on:click.away="deleteExercise()"></i> </button>
        
        <div class="relative z-40 flex flex-col gap-3 items-center bg-white w-fit rounded-2xl max-w-xl" x-show="deleteOpen">
            <div class="bg-black bg-opacity-20 fixed inset-0 " x-on:click="modalClose()"></div>
            
            <div class="flex items-center p-4 gap-4">
                <img src="\img\icons\warning-icon.svg" alt="like" class="h-20 cursor-pointer">
                <div>
                    <span class="font-semibold text-2xl">Você está deletando um exercício</span>
                    <p>Você está prestes a deletar um exercício. Esta ação não poderá ser desfeita, tem certeza?</p>
                </div>
            </div>

            <div class="flex gap-2 bg-gymhunt-grey-1 w-full justify-end p-4 rounded-b-xl"> 
                <button class=" px-4 py-2 hover:text-gymhunt-purple-1" x-on:click="modalClose()" >Cancelar</button>
                <button class="bg-gymhunt-purple-1 hover:bg-gymhunt-purple-2 rounded-2xl px-4 py-2 text-white font-semibold flex items-center gap-1"
                        x-on:click="deletePost">
                    <img src="\img\icons\check-white-icon.svg" class="h-6" alt="">
                    Confirmar
                </button>
            </div> 
        </div>
    </div>

    <div class="space-y-3"> <!--infos-->
        <div class="flex flex-row justify-between">
            <p>Série</p>
            <p>{{$this->exercise->serie}}</p>
        </div>

        <div class="flex flex-row justify-between">
            <p>Repetições</p>
            <p>{{$this->exercise->rep}}</p>
        </div>

        <div class="flex flex-row justify-between">
            <p>Carga</p>
            <p>{{$this->exercise->carga}} kg</p>
        </div>

        <div class="flex flex-row justify-between">
            <p>Data</p>
            <p>{{$this->exercise->data}}</p>
        </div>
    </div>
</div>