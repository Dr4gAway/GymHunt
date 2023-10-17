@foreach($exercise as $exercise)
<div class="rounded-xl bg-white shadow-lg p-4 my-4 w-72"> <!--cada card-->
    <div class="flex flex-row items-center justify-between mb-2"> <!--nome do exercicio-->
        <p class="font-semibold">{{$exercise->nameExerc}}</p>
        <div class="text-red-500"> <i class="fa-solid fa-trash-can"></i> </div>
    </div>

    <div class="space-y-3"> <!--infos-->
        <div class="flex flex-row justify-between">
            <p>Série</p>
            <p>{{$exercise->serie}}</p>
        </div>

        <div class="flex flex-row justify-between">
            <p>Repetições</p>
            <p>{{$exercise->rep}}</p>
        </div>

        <div class="flex flex-row justify-between">
            <p>Carga</p>
            <p>{{$exercise->carga}}</p>
        </div>

        <div class="flex flex-row justify-between">
            <p>Data</p>
            <p>{{$exercise->data}}</p>
        </div>
    </div>
</div>
@endforeach