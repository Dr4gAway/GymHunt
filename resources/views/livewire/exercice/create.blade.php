<div class="self-center w-full flex bg-white p-6 rounded-2xl max-w-xl z-20">
    <form action="">
        <div class="font-poppins text-black flex flex-col w-full gap-4 space-y-2">
            <div class="grid grid-flow-col justify-between items-stretch space-x-3">
                <p> <i class="fa-solid fa-plus"></i> Adicionar exercício</p>   
                <button class="font-black" x-on:click="closeExerc()"> <i class="fa-solid fa-x"></i> </button>
            </div>
            
            <x-form.text name="nameExerc" label="Nome do exercício" placeholder="" /> 
            <div class="flex flex-row justify-evenly space-x-8">
                <x-form.text name="serie" type="number" label="Série" placeholder="" /> 
                <x-form.text name="rep" type="number" label="Repetições" placeholder="" /> 
                <x-form.text name="carga" type="number" label="Carga" placeholder="" /> 
            </div>
            <x-form.text name="data" type="date" label="Data" placeholder="" /> 

            <div class="grid grid-flow-col justify-between space-x-2">
                <button type="submit" x-on:click="closeExerc()" class="  justify-center rounded-lg bg-gymhunt-purple-2 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancelar</button>
                <button type="submit" class="justify-center rounded-lg bg-gymhunt-purple-1 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Salvar</button>
            </div>
        </div>
    </form>  
</div>