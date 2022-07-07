@extends('layouts.template')
<div class="pt-24">
    <div class="my-20 container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full md:w-5/5 justify-center  text-center md:text-center">


            <form action="{{route('cadastrar.lista')}}" method="post">
                @csrf
                <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}">
                <label for="mes">Mês</label>
                <input type="text" name="mes" id="mes" class="mb-20 mx-auto lg:mx-50 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">

                <label for="ano">Ano</label>
                <input type="text" name="ano" id="ano" class="mb-20 mx-auto lg:mx-50 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">

                <label for="observacao">Observacao</label>
                <input type="text" name="observacao" id="observacao" class="mb-20 mx-auto lg:mx-50 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">


                <input type="submit" value="criar" class="mb-20 mx-auto lg:mx-50 hover:underline bg-orange-600 text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            </form>

        </div>
    </div>
</div>