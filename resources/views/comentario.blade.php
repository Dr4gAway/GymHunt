@extends('layout.site')
@section('titulo', 'GymHunt - Criando Avaliação')
@section('content') 

<div class="flex flex-col bg-gymhunt-purple-2 bg-[url('/public/img/backAvaliaçao.svg')] h-full"> <!-tela inteira->

    <div class="mx-12 font-poppins"> <!--publicações -->

        <div class="flex flex-col space-y-8">
            <div class=" flex flex-row items-center space-x-5 text-left my-10">
                <div class="ml-12 w-52 h-44"> <img class="w-full" src=".\img\avatar.png" alt=""> </div>         
                <p class="text-4xl font-bold">Orgamid</p>
                <h3 class="text-2xl font-semibold"> <i class="fa-regular fa-star fa-lg"></i> 4.5 </h3>
            </div>

            <div class="m-auto bg-white w-4/6 p-8 rounded-lg shadow-2xl">
                <div class="flex flex-row space-x-20"> <!--avaliações-->
                    <div class="flex flex-row justify-between w-1/2"> <!--estrela-->
                        <div class="space-y-8">
                            <p class="text-lg font-semibold">Selecione a avaliação para os itens</p>
                            <p class="font-medium text-2xl">Aparelhos </p>
                            <p class="font-medium text-2xl">Ambiente </p>
                            <p class="font-medium text-2xl">Estrutura </p>
                            <p class="font-medium text-2xl">Professores </p>
                            <p class="font-medium text-2xl">Música</p>
                        </div>

                        <div class="space-y-10">
                            <p> </p>
                            <p> <i class="fa-regular fa-star fa-xl"></i>  <i class="fa-regular fa-star fa-xl"></i>  <i class="fa-regular fa-star fa-xl"></i>  <i class="fa-regular fa-star fa-xl"></i>  <i class="fa-regular fa-star fa-xl"></i> </p>
                            <p> <i class="fa-regular fa-star fa-xl"></i>  <i class="fa-regular fa-star fa-xl"></i>  <i class="fa-regular fa-star fa-xl"></i>  <i class="fa-regular fa-star fa-xl"></i>  <i class="fa-regular fa-star fa-xl"></i> </p>
                            <p> <i class="fa-regular fa-star fa-xl"></i>  <i class="fa-regular fa-star fa-xl"></i>  <i class="fa-regular fa-star fa-xl"></i>  <i class="fa-regular fa-star fa-xl"></i>  <i class="fa-regular fa-star fa-xl"></i> </p>
                            <p> <i class="fa-regular fa-star fa-xl"></i>  <i class="fa-regular fa-star fa-xl"></i>  <i class="fa-regular fa-star fa-xl"></i>  <i class="fa-regular fa-star fa-xl"></i>  <i class="fa-regular fa-star fa-xl"></i> </p>
                            <p> <i class="fa-regular fa-star fa-xl"></i>  <i class="fa-regular fa-star fa-xl"></i>  <i class="fa-regular fa-star fa-xl"></i>  <i class="fa-regular fa-star fa-xl"></i>  <i class="fa-regular fa-star fa-xl"></i> </p>
                        </div>
                    </div>

                    <div class="w-1/2"> <!--comentario-->
                        <p class="font-semibold text-left text-xl mb-3">Comentário</p>
                        <textarea rows="10" cols="60" class="rounded-lg p-3 border border-gymhunt-purple-2 line-clamp-10 text-justify text-lg"> </textarea>
                        <div class="flex flex-row justify-between items-end space-x-2 my-3">
                            <button type="submit" x-on:click="modalClose()" class="justify-center rounded-lg bg-gymhunt-purple-2 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancelar</button>
                            <button type="submit" class="justify-center rounded-lg bg-gymhunt-purple-1 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Avaliar</button>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    
    </div>
</div>




@endsection