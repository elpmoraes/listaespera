
<!DOCTYPE html>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus Dados') }}
        </h2>
    </x-slot>

      <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
             @if($errors->any())
<div class="alert alert-success" role="alert">
 <h5>{{$errors->first()}}</h5>
</div>
@endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

 <form action="/usuario/{{ $user->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-2 col-sm-6">
Nome <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
Equipe <input type="text" class="form-control" name="equipe" id="equipe" value="{{  $user->equipe }}">
Email <input type="text" class="form-control"  name="email" id="email" value="{{  $user->email }}">
Telefone <input type="text" class="form-control"  name="telefone" id="telefone" value="{{  $user->telefone }}">

            </div>
<button type="submit" class="btn btn-success ml-3 col-sm-2">Alterar Dados</button>
            </form>
<br>
 <form action="/gerarSenha/{{ $user->id }}" method="POST">
@csrf
            <div class="mb-2 col-sm-3">
            Senha <input type="password" class="form-control"  name="password" id="password">
            </div>
            <button type="submit" class="btn btn-warning ml-3 col-sm-2">Alterar Senha</button>


           </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
