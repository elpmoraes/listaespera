<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista do Jogo - Administração') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form action="/listajogos/{{ $listaJogo->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
Descricao <input type="text" class="form-control" name="descricao" id="descricao" value="{{ $listaJogo->descricao }}">
Data/Hora <input type="datetime" class="form-control" name="datahora" id="datahora" value="{{ $listaJogo->datahora }}">
Endereço <input type="text" class="form-control"  name="endereco" id="endereco" value="{{ $listaJogo->endereco }}">
Cidade <input type="text" class="form-control"  name="cidade" id="cidade" value="{{ $listaJogo->cidade }}">
Link google maps <input type="text"  class="form-control" name="gmaps" id="gmaps" value="{{ $listaJogo->gmaps }}">
Inscritos <input type="text"  class="form-control" disabled name="inscritos" id="inscritos" value="{{ $listaJogo->inscritos }}">
Máximo pessoas <input type="text" name="maxinscritos"  class="form-control" id="maxinscritos" value="{{ $listaJogo->maxinscritos }}">


Código da Lista
<input type="text" name="codlista"  disabled class="form-control" id="codlista" value="{{ $listaJogo->codlista }}">
   </div>

<button type="submit" class="btn btn-success">Enviar</button>
        </form>

Lista de Inscritos


<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Equipe</th>
      <th scope="col">Data/Hora Inscrição</th>
      <th scope="col">IP</th>
      <th scope="col">BDU/PMC</th>
                  <th scope="col">Classe</th>
            <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>


@foreach ($user_list as $user_list)
<tr>
<td>{{ $user_list->user[0]->name }}</td>
<td>{{ $user_list->user[0]->equipe }}</td>
<td>{{ $user_list->datainscricao }}</td>
<td>{{ $user_list->ip }}</td>
<td>{{ $user_list->fardamento }}</td>
<td>{{ $user_list->classe }}</td>
<td><a href="/removerinscricao/{{ $listaJogo->id }}/{{ $user_list->user[0]->id }}" class="btn btn-info" role="button">Remover da lista</a>
</td>
</tr>
@endforeach


  </tbody>
</table>


                </div>

            </div>
        </div>
    </div>
</x-app-layout>
