
<!DOCTYPE html>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Jogo') }}
        </h2>
    </x-slot>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($errors->any())
<div class="alert alert-info" role="alert">
 <h5>{{$errors->first()}}</h5>
</div>
@endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
<h4>Dados do Jogo</h4>
                                <div class="mb-7">
Descricao <input type="text" class="form-control" disabled name="descricao" id="descricao" value="{{ $listaJogo->descricao }}">
Data do Jogo <input type="text" class="form-control" disabled name="datahora" id="datahora" value="{{ $listaJogo->datahora }}">
Endereço <input type="text" class="form-control"   disabled name="endereco" id="endereco" value="{{ $listaJogo->endereco }}">

Cidade <input type="text" class="form-control"   disabled name="cidade" id="cidade" value="{{ $listaJogo->cidade }}">
Link google maps <input type="text"  class="form-control"  disabled name="gmaps" id="gmaps" value="{{ $listaJogo->gmaps }}">

Inscritos <input type="text"  class="form-control col-md-1" disabled name="inscritos" id="inscritos" value="{{ $listaJogo->inscritos }} / {{ $listaJogo->maxinscritos }}">

Código da Lista
<input type="text" name="codlista" disabled class="form-control col-md-1" id="codlista" value="{{ $listaJogo->codlista }}">
   </div>
<br>
  <div class="mb-7 col-md-3 ">
<h4>Realizar Inscrição</h4>
  </div>
        <form action="/inscricao/{{ $listaJogo->id }}/{{ Auth::user()->id }}" method="POST">
            @csrf
              <div class="col-md-2 mb-7">
                <select  id="classe" name="classe" class="custom-select form-group">
  <option selected value="Assault">Assault</option>
  <option value="DMR">DMR</option>
  <option value="Sniper">Sniper</option>
    <option value="Suport">Suport</option>
</select>

              </div>  <div class="mb-7 col-md-2 ">
 Possui BDU ?    <input type="checkbox" name="possuibdu" value="S" id="possuibdu">
   </div>  <div class="mb-1">
<button type="submit" class="btn btn-success col-md-3">Inscrever-se</button>
</form>
   </div>  <div class="mb-7">
<a href="/removerinscricao/{{ $listaJogo->id }}/{{ Auth::user()->id }}" class="btn btn-warning col-md-3" role="button">Remover minha inscrição</a>

   </div>
<table class="table">
  <thead>
    <tr>
  <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Equipe</th>
      <th scope="col">Data/Hora Inscrição</th>
      <th scope="col">Possui BDU ?</th>
      <th scope="col">Classe</th>
    </tr>
  </thead>
  <tbody>
@foreach ($user_list as $user_list)
<tr>
<td>{{ $user_list->id }}</td>
<td>{{ $user_list->user[0]->name }}</td>
<td>{{ $user_list->user[0]->equipe }}</td>
<td>{{ $user_list->datainscricao }}</td>
 @if($user_list->fardamento=='S')
<td><span class="material-icons" style="font-size:2em;color:rgb(30, 175, 30)">
done
</span></td>
@else
    <td><span class="material-icons" style="font-size:2em;color:rgba(107, 3, 3, 0.513)">
dangerous
</span></td>
        @endif
<td>{{ $user_list->classe }}</td>

</tr>
@endforeach

  </tbody>
</table>




                </div>
            </div>
        </div>
    </div>


</x-app-layout>


