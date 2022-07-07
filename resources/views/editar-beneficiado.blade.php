@extends('layouts.template')
<div class="pt-24">
    <div class="my-20 container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full md:w-5/5 justify-center  text-center md:text-center">





            <div style="margin-top: 30px; width: 100%;">
                <form action="{{route('editar.beneficiado.update')}}" method="post">
                    @method('PUT')

                    @csrf
                    <div>
                        <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}" class="mb-20 mx-auto lg:mx-50 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">


                        <label for="nome">Nome</label>
                        <input value='{{$beneficiado->nome}}' type="text" name="nome" id="mesnome" autofocus value='@if(!is_numeric($beneficiado)){{$beneficiado}}@endif' autofocus class="mb-20 mx-auto lg:mx-50 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">


                        <label for="documento">CPF/NIS </label>
                        <input value='{{$beneficiado->documento}}' type="text" name="documento" id="documento" value='@if(is_numeric($beneficiado)){{$beneficiado}}@endif' class="mb-20 mx-auto lg:mx-50 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">


                        <label for="endereco">Endereço</label>
                        <input value='{{$beneficiado->endereco}}' type="text" name="endereco" id="endereco" class="mb-20 mx-auto lg:mx-50 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">


                        <label for="observacao"> Observação</label>
                        <input value='{{$beneficiado->observacao}}' type="observacao" name="observacao" id="observacao" class="mb-20 mx-auto lg:mx-50 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">


                        <label for="contato"> Contato</label>
                        <input value='{{$beneficiado->contato}}' type="contato" name="contato" id="contato" class="mb-20 mx-auto lg:mx-50 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">


                        @if($beneficiado)
                        <input type="hidden" name="beneficiado" value='{{$beneficiado->id}}'>


                        @endif

                        @if($lista)
                        <input type="hidden" name="lista" value='{{$lista->id}}'>
                        @endif


                        <input type="submit" value="Editar" class="mb-20 mx-auto lg:mx-50   bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                </form>
            </div>


        </div>
    </div>
</div>