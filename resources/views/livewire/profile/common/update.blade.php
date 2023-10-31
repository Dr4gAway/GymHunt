<div>
    {{-- Edit Profile --}}
    <div class="fixed inset-0 flex flex-col items-center w-screen h-screen p-8 gap-8 z-20" x-show="configOpen">
        <!-- Overlay  -->
        <div class="bg-black bg-opacity-20 fixed inset-0" x-on:click="modalClose()"></div>

        <div class="flex flex-col w-full gap-4 bg-white p-6 rounded-2xl max-w-2xl z-20 overflow-scroll">
            <div class="flex justify-between w-full">
                <p class="font-bold text-lg"> <i class="fa-solid fa-pencil"></i> Editar perfil</p>    
                <button class="font-bold text-lg" x-on:click="modalClose()">
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>

            <div class="grid grid-flow-col justify-items-center space-x-3">
                <div class="relative w-24 h-24 rounded-full overflow-hidden">
                    <div class="absolute w-full h-full flex items-center justify-center bg-gymhunt-purple-2 bg-opacity-50">
                        <i class="fa-solid fa-pencil"></i>
                    </div>
                    <img src="/{{$user->avatar}}" class="w-full h-full object-cover">
                </div>

                <div class="relative w-96 h-24 rounded-2xl overflow-hidden">
                    <div class="absolute w-full h-full flex items-center justify-center bg-gymhunt-purple-2 bg-opacity-50">
                        <i class="fa-solid fa-pencil"></i>
                    </div>
                    <img src="/{{$user->banner}}" class="w-full h-full object-cover">
                </div>
            </div>
            
            <div class="w-full h-1 bg-slate-950"></div>

            <x-form.text name="name" label="Nome" model="name" placeholder="Digite seu nome completo"/>
            <x-form.text name="email" label="Email" model="email" type="email" placeholder="ex: email@gmail.com"/>
            <x-form.text name="phone" label="Telefone" model="phone" type="text" placeholder="ex: +55 (14) 99722-1343"/>

            <x-resizable-text placeholder="Biografia" model="about"/>

            {{-- <div class="flex items-center gap-4">
                <x-form.text class="w-full" name="timeOpen" label="Horário de abertura" type="time" />
                <x-form.text class="w-full" name="timeClose" label="Horário de fechamento" type="time"/>
            </div> --}}

            <div class="flex items-center gap-4">
                <x-form.text wire="birth" type="date" model="birth" class="w-full" name="birth" label="Data de nascimento" placeholder="ex: 28/02/2006"/>
                <div class="w-full flex flex-col space-y-1 col-span-1">
                    <p class="font-poppins font-bold text-lg">CPF</p>
                    <label class="p-1.5 rounded-md ring-1 ring-gray-300 shadow-xl bg-neutral-500 opacity-40" x-on:click="openAlert()">458.066.118-41</label>
                </div>
            </div>

            <div class="grid grid-flow-col justify-between space-x-2">
                <button type="submit" x-on:click="modalClose()" class="
                    justify-center rounded-lg bg-gymhunt-purple-2 px-5 p-1.5
                    text-sm font-semibold leading-6 text-white shadow-sm
                    hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                    focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Cancelar
                </button>
                <button type="submit" wire:click="store()"
                    class="justify-center rounded-lg bg-gymhunt-purple-1 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Salvar</button>
            </div>
        </div>  
    </div>
</div>