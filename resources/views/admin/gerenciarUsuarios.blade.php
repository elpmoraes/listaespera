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

Lista de Usuarios

<table class="table">
  <thead>
    <tr>
  <th scope="col">#</th>
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
<td>{{ $user->id }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->equipe }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->telefone }}</td>
<td>{{ $user->ativo }}</td>

<td><a href = '/usuario/{{ $user->id }}'>Detalhar</a></td>
</tr>
@endforeach


  </tbody>
</table>


                </div>

            </div>
        </div>
    </div>
</x-app-layout>

