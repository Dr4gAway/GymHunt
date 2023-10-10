<div class="flex flex-col gap-4 w-[432px] rounded-xl p-4 bg-white"> <!-- h-48 -->
    <div class="flex items-center gap-4">
        <div class="flex items-center gap-1 text-base font-semibold">
            <div class="bg-red-500 h-8 w-8 rounded-full"></div>
            <span>Gym Spotter</span>
        </div>
        <div class="flex items-center gap-1">
            <div class="bg-red-500 rounded-full h-2 w-2"></div>
            <span class="text-sm">Fechada</span>
        </div>
    </div>
    <div class="w-full h-1 bg-black rounded-full"></div>
    <div class="space-y-2">
        <span class="max-w-full">
            {{
                Illuminate\Support\Str::limit(' Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit tenetur atque consectetur consequuntur maxime delectus iusto beatae accusamus aperiam, dicta reiciendis unde assumenda inventore in, quas eveniet pariatur ex nostrum. ', 180, '...')
            }}
        </span>
        <div class="flex justify-between items-center">
            <div class="text-2xl text-gymhunt-purple-1">
                <i class="fa-regular fa-star"></i>
                <span class="font-medium">3.7</span>
            </div>
            <button class="bg-gymhunt-purple-1 text-white px-4 py-2 rounded-lg font-bold hover:bg-gymhunt-purple-2">Visitar perfil</button>
        </div>
    </div>
</div>