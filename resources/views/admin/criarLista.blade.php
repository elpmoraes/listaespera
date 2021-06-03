<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Nova Lista') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form action="/listajogos" method="POST">
            @csrf
            <div class="mb-3">
Descricao <input type="text" class="form-control" required name="descricao" id="descricao">
</div>  <div class="mb-3">
Endereço <input type="text" class="form-control"  required name="endereco" id="endereco" >


    </div>  <div class="mb-3">
       Data e Hora do Jogo
<input type="datetime-local" class="form-control"  required name="datahora" id="datahora" >

    </div>  <div class="mb-3">
Cidade <input type="text" class="form-control" required  name="cidade" id="cidade" >
</div>  <div class="mb-3">
Link google maps <input type="text"  class="form-control" name="gmaps" id="gmaps">
</div>  <div class="mb-3">
Máximo pessoas
    <input type="number"class="form-control"min="1" required data-bind="value:replyNumber"name="maxinscritos" id="maxinscritos" />
</div>  <div class="mb-3">
    Lista Visível
<input type="checkbox" name="listavisivel" id="listavisivel"  disabled checked >
</div>  <div class="mb-3">

Código da Lista
<input type="text" name="codlista"  class="form-control" id="codlista" readonly="readonly" value="<?php
$bytes = random_bytes(2);
echo(bin2hex($bytes));
?>">
</div>
   </div>

<button type="submit" class="btn btn-primary">Submit</button>
        </form>



                </div>

            </div>
        </div>
    </div>
</x-app-layout>

