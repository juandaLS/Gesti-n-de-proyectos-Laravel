<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis proyectos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->has('mensaje'))
            <div class="text-green-600 font-bold uppercase p-2 my-3 text-xm">
                {{session('mensaje')}}
            </div>
            @endif
            <livewire:mostrar-vacantes />
        </div>
    </div>
</x-app-layout>
