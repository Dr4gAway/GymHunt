<div class="self-center w-full flex bg-white p-6 rounded-2xl max-w-xl z-20">
    <form wire:submit.prevent="store" method="post">
        <div class="font-poppins text-black flex flex-col w-full gap-4 space-y-2">
            <div class="grid grid-flow-col justify-between items-stretch space-x-3">
                <p> <i class="fa-solid fa-plus"></i> Adicionar exercício</p>   
                <button class="font-black" x-on:click="closeExerc()"> <i class="fa-solid fa-x"></i> </button>
            </div>
            
            <label class="block text-lg font-bold leading-6 text-gray-900">Nome do exercício</label>
            <div class="mt-2">
                <input
                    wire:model="nameExerc"
                    type="text"
                    class="block w-full rounded-md border-0 p-1.5 text-gray-900 drop-shadow-xl ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                >
            </div>
            <div class="flex flex-row justify-evenly space-x-8">
                <x-form.text name="serie" type="number" label="Série" placeholder="" wire:model="serie"/> 
                <x-form.text name="rep" type="number" label="Repetições" placeholder=""  wire:model="rep" /> 
                <x-form.text name="carga" type="number" label="Carga" placeholder=""  wire:model="carga" /> 
            </div>
            <x-form.text name="data" type="date" label="Data" placeholder="" /> 

            <div class="grid grid-flow-col justify-between space-x-2">
                <button type="submit" x-on:click="closeExerc()" class="  justify-center rounded-lg bg-gymhunt-purple-2 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancelar</button>
                <button type="submit" class="justify-center rounded-lg bg-gymhunt-purple-1 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Salvar</button>
            </div>
        </div>
    </form>  
</div>