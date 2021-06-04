<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários Cadastrados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
            @if($errors->any())
<div class="alert alert-info" role="alert">
 <h5>{{$errors->first()}}</h5>
</div>
@endif
Lista de Usuarios

<div class="table-responsive">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Equipe</th>
      <th scope="col">Email</th>
            <th scope="col">Telefone</th>
                              <th scope="col">Ativo</th>
                  <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>
@foreach ($user as $user)
<tr>
<td>{{ $user->name }}</td>
<td>{{ $user->equipe }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->telefone }}</td>
@if($user->ativo=='S')
<td><span class="material-icons" style="font-size:2em;color:rgb(30, 175, 30)">
done
</span></td>
@else
    <td><span class="material-icons" style="font-size:2em;color:rgba(107, 3, 3, 0.513)">
dangerous
</span></td>
        @endif


<td><a href = '/usuario/{{ $user->id }}'><span class="material-icons" style="font-size:2em;">
search
</span></a>
    <a href = '/usuario/alterarstatus/{{ $user->id }}'> <span class="material-icons" style="font-size:2em;">
cancel
</span></a></td>
</tr>
@endforeach


  </tbody>
</table>
</div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>

