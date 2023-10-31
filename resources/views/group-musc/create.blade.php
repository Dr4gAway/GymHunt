<div class="self-center justify-center w-full flex bg-white p-6 rounded-2xl max-w-2xl z-20">
    <form wire:submit.prevent="store" method="post" enctype="multipart/form-data">
        <div class="font-poppins text-black flex flex-col w-full gap-4 space-y-3">
            <div class="grid grid-flow-col justify-between items-stretch space-x-3">
                <p> <i class="fa-solid fa-plus"></i> Adicionar grupo muscular</p>   
                <button class="font-black" x-on:click="modalClose()"> <i class="fa-solid fa-x"></i> </button>
            </div>
            
            <x-form.text name="nameGroup" label="Grupo(s) Muscular(es)" placeholder="Escolha a categoria" wire:model="nameGroup"/>  <!--essa info vai para o nome do grupo -->

            <div class="grid grid-flow-col justify-between space-x-2">
                <button x-on:click="modalClose()" class="  justify-center rounded-lg bg-gymhunt-purple-2 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancelar</button>
                <a href="{{route('workout_log')}}">
                    <button type="submit" class="justify-center rounded-lg bg-gymhunt-purple-1 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Salvar</button>
                </a>
            </div>
        </div>  
    </form>
</div>