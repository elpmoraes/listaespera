<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Início') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                 <h4>  Bem vindo <strong> {{ Auth::user()->name }}!</strong></h4>
                 @if(Auth::user()->equipe)
                     Equipe:

                <strong> {{ Auth::user()->equipe }}</strong><br>
                 @endif
                 <br><br>


            @if($errors->any())
<div class="alert alert-danger" role="alert">
 <h5>{{$errors->first()}}</h5>
</div>
@endif

<form method="get"  action="/inscricao/codlista">
   Código da Lista
<div class="form-group row">

    <div class="col-sm-2">
        <input type="text"  class="form-control" name="codlista" id="codlista">
        <button type="submit" class="btn btn-success btn-sm"><span class="material-icons"style="color:white;font-size:15px">
search
</span><span style="color:white;font-size:15px"> Buscar</span></a></button>
    </div>
  </div>


</form>

<br>
<div class="pb-8">
 <a href="{{ route('compendio') }}" target="_blank" class="btn btn-warning btn-sm">
                            <span class="material-icons" style="color:white;font-size:15px">
description
</span>
           <span style="color:white;font-size:15px">Compêndio</span></a>
</div>


<div class="">   <span class="pl-5" style="color:black;font-size:23px">Galeria de Fotos</span></a>
@include('user.galeria')
</div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
