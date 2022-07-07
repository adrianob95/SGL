 @extends('layouts.template')



 <div class="pt-24">
     <div class="my-20 container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
         <!--Left Col-->
         <div class="flex flex-col w-full md:w-5/5 justify-center  text-center md:text-center">

             @if(!(isset($beneficiados) && $beneficiados->count() > 0))
             <p class="leading-tight  text-2xl mb-8">
                 Você ainda não possue nehuma beneficiado, clique abaixo para criar um.
             </p>
             @endif

             <a href="{{route('cadastrar.beneficiado.geral')}}" class="mb-20 mx-auto lg:mx-50 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                 Criar novo beneficiado</a>


             @if($beneficiados)

             <table class="table-auto border-separate border border-green-900">

                 <thead>
                     <tr class="bg-green-600">
                         <th scope="col">#</th>
                         <th scope="col">Nome</th>
                         <th scope="col">Endereco</th>
                         <th scope="col">Documento</th>
                         <th scope="col">Contato</th>
                         <th scope="col">Observacao</th>
                         <th scope="col">Editar</th>
                         <th scope="col">Excluir</th>
                     </tr>
                 </thead>
                 <tbody class="border-separate border border-green-900 my-10">
                     @foreach($beneficiados as $beneficiado)

                     <tr class="">
                         <th class="border border-green-600 " scope="row">{{$loop->index+1}}</th>
                         <th class="border border-green-600">{{$beneficiado->nome }} </th>
                         <th class="border border-green-600"> {{$beneficiado->endereco}} </th>
                         <th class="border border-green-600"> {{$beneficiado->documento}} </th>
                         <th class="border border-green-600"> {{$beneficiado->contato}} </th>
                         <th class="border border-green-600"> {{$beneficiado->observacao}} </th>
                         <th class="border border-green-600 "><a href="{{route('editar.beneficiado', ['beneficiado' => $beneficiado->id])}}"><i class="fa-solid fa-pen text-[20px] cursor-pointer text-white hover:text-amber-400"></i></a></th>
                         <th class="border border-green-600 "><a href="{{route('excluir.beneficiado', ['beneficiado' =>$beneficiado->id])}}"><i class="fa-solid fa-trash-can text-[20px] cursor-pointer text-white hover:text-amber-400"></i></a></th>
                     </tr>

                     @endforeach
                 </tbody>
             </table>





             @endif

         </div>
     </div>
 </div>