<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                 <h4>  Bem vindo <strong> {{ Auth::user()->name }}!</strong></h4> <br>


            @if($errors->any())
<div class="alert alert-danger" role="alert">
 <h5>{{$errors->first()}}</h5>
</div>
@endif
<form method="get"  action="/inscricao/codlista">
   Digite o número da lista
<div class="form-group row">

    <div class="col-sm-2">
        <input type="text"  class="form-control" name="codlista" id="codlista">
    </div>
  </div>


<button type="submit" class="btn btn-success">Enviar</button>
</form>
<br><br>


Galeria de Fotos
@include('user.galeria')

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
