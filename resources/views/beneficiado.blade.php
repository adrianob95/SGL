@extends('layouts.template')
<div class="pt-24">
    <div class="my-20 container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full md:w-5/5 justify-center  text-center md:text-center">

            <p class="leading-tight  text-2x2 mb-6">
                Busque o beneficiado caso já tenha sido cadastrado, será acossiado a esta lista, caso contrario, será solcitado o cadastro.
            </p>

            <form action="{{route('buscar.beneficiado')}}" method="post">
                @csrf
                <input type="hidden" name="lista" id="lista" value="{{$listas->id}}" class="mb-20 mx-auto lg:mx-50 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            
                <!-- 
                <div class="relative z-0">
                    <input type="text" id="floating_standard" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                    <label for="floating_standard" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Floating standard</label>
                </div> -->

                <input type="text" placeholder="Digite o nome, CPF ou NIS" name="beneficiado" id="beneficiado" class="mb-20 mx-auto lg:mx-50   bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">

                <input type="submit" value="Buscar" class="mb-20 mx-auto lg:mx-50   bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">


                <!-- <input type="text" name="nome" id="nome">
<input type="text" name="documento" id="documento">
<input type="text" name="endereco" id="endereco">
<input type="text" name="contato" id="contato">
<input type="text" name="observacao" id="observacao"> -->


            </form>


            @if($listas)

            <h1 class=" text-4xl font-bold leading-tight text-center ">Lista: {{date("F", mktime(0, 0, 0, $listas->mes, 10)) }} de {{$listas->ano}} @if(!empty($listas->observacao)) - {{$listas->observacao}} @endif
            </h1>
            <i onclick=" window.print();" class="fa-solid fa-print text-[35px] text-right text-green-600 cursor-pointer hover:text-amber-400 mb-4"></i>
            <table class="table-auto border-separate border border-green-900">
                <tr class="bg-green-600">
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF/NIS</th>
                    <th scope="col">Endereco</th>
                    <th scope="col">Contato</th>
                    <th scope="col">Observação</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Remover</th>

                </tr>
                </thead>
                <tbody>
                    @foreach($listas->beneficiado as $lista)
                    <tr>
                        <th class="border border-green-600 " scope="row">{{$loop->index+1}}</th>
                        <th class="border border-green-600 ">{{$lista->nome}} </th>
                        <th class="border border-green-600 ">{{$lista->documento}} </th>
                        <th class="border border-green-600 ">{{$lista->endereco}} </th>
                        <th class="border border-green-600 ">{{$lista->contato}} </th>
                        <th class="border border-green-600 ">{{$lista->observacao}} </th>
                        <th class="border border-green-600 "><a href="{{route('editar.beneficiado', ['lista' => $listas->id, 'beneficiado' => $lista->id])}}"><i class="fa-solid fa-pen text-[20px] cursor-pointer text-white hover:text-amber-400"></i></a></th>
                        <th class="border border-green-600 "><a href="{{route('excluir.beneficiado.lista', ['lista' => $listas->id, 'beneficiado' =>$lista->id])}}"><i class="fa-solid fa-trash-can text-[20px] cursor-pointer text-white hover:text-amber-400"></i></a></th>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>





            @endif

        </div>
    </div>
</div>