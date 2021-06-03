<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard - Painel do Administrador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                 <h4>  Bem vindo <strong> {{ Auth::user()->name }}!</strong></h4> <br>


<div class="btn-group-vertical">

<a href="/listajogos/create" class="btn btn-outline-success btn-lg" role="button">Criar Nova Lista</a>


<a href="/listajogos" class="btn btn-outline-success btn-lg" role="button">Gerenciar Listas</a>

<a href="/usuario/create" class="btn btn-outline-success btn-lg" role="button">Criar novo usuario</a>

<a href="/usuario" class="btn btn-outline-success btn-lg" role="button">Gerenciar Usuarios</a>

</div>


                </div>

            </div>
        </div>
    </div>
</x-app-layout>

