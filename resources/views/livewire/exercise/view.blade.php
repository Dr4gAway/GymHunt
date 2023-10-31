<div class="rounded-xl bg-white shadow-lg p-4 my-4 w-72"> <!--cada card-->
    <div class="flex felx-rol justify-between mb-2">
        <p class="font-semibold">{{$this->exercise->nameExerc}}</p>
        <livewire:exercise.delete />
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