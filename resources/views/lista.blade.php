 @extends('layouts.template')



 <div class="pt-24">
     <div class="my-20 container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
         <!--Left Col-->
         <div class="flex flex-col w-full md:w-5/5 justify-center  text-center md:text-center">
             <p class="leading-tight  text-2xl mb-8">
                 Crie listas e adicione beneficiado.
             </p>
             @if($listas->isEmpty())
             <p class="leading-tight  text-2xl mb-8">
                 Você ainda não possue nehuma lista, clique abaixo para criar uma.
             </p>


             <a href="{{route('lista')}}" class="mb-20 mx-auto lg:mx-50 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                 Criar nova lista</a>


             @elseif($listas->isNotEmpty())
             <a href="{{route('lista')}}" class="mb-20 mx-auto lg:mx-50 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                 Criar nova lista</a>
             <table class="table-auto border-separate border border-green-900">

                 <thead>
                     <tr class="bg-green-600">
                         <th scope="col">#</th>
                         <th scope="col">Lista</th>
                         <th scope="col">Observacao</th>
                         <th scope="col">Consultar</th>
                         <th scope="col">Editar</th>
                         <th scope="col">Apagar</th>
                     </tr>
                 </thead>
                 <tbody class="border-separate border border-green-900 my-10">
                     @foreach($listas as $lista)
                     @if($lista->user_id == Auth::id())
                     <tr class="">
                         <th class="border border-green-600 " scope="row">{{$loop->index+1}}</th>
                         <th class="border border-green-600">{{$lista->mes }}/{{$lista->ano}} </th>
                         <th class="border border-green-600"> {{$lista->observacao}} </th>
                         <th class="border border-green-600"><a href="{{route('beneficiado', $lista->id)}}"><i class="fa-solid cursor-pointer fa-magnifying-glass text-[20px] text-white hover:text-amber-400"></i></a></th>
                         <th class="border border-green-600"><a href="{{route('editar.lista', $lista->id)}}"><i class="fa-solid fa-pen text-[20px] text-white cursor-pointer hover:text-amber-400"></i></a>
                         </th>
                         <th class="border border-green-600"><a href="{{route('excluir.lista', $lista->id)}}"><i class="fa-solid fa-trash-can text-[20px] cursor-pointer text-white hover:text-amber-400"></i></a></th>
                     </tr>
                     @endif
                     @endforeach
                 </tbody>
             </table>





             @endif

         </div>
     </div>
 </div>