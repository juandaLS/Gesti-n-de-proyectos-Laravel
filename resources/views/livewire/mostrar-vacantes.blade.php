<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante )
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                {{-- {{ __("Mis Vacantes") }} --}}
                <div class="space-y-3">
                    <a href="{{route('vacantes.show', $vacante->id)}}" class="text-xl font-bold">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm font-bold text-gray-600 ">{{$vacante->empresa}}</p>
                    <p class="text-sm text-gray-500">Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
                </div>
                <div class="flex flex-col gap-3 mt-5 md:flex-row items-strench md:mt-0">
                    <a class="px-4 py-2 text-xs font-bold text-center text-white rounded-lg bg-gray-800" href="{{route('candidatos.index',$vacante)}}">
                        {{$vacante->candidatos->count()}}
                        Candidatos
                    </a>
                    <a class="px-4 py-2 text-xs font-bold text-center text-white bg-green-800 rounded-lg" href="{{route('vacantes.edit', $vacante->id)}}">
                        Editar
                    </a>
                    <x-primary-button 
                    wire:click="$dispatch('mostrarAlerta', {{$vacante->id}})"
                    class="px-4 py-2 text-xs font-bold text-center text-white bg-red-600 rounded-lg" href="#">
                        Eliminar
                    </x-primary-button>
                </div>
            </div>
        @empty
            <p class="p-3 text-sm text-center text-gray-600">No hay proyectos que mostrar</p>
        @endforelse
    </div>
 
    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener('livewire:initialized', () => {
                    Livewire.on('mostrarAlerta', vacanteId =>{
                Swal.fire({
                title: '¿Quieres eliminar el proyecto?',
                text: "Una proyecto eliminado no se puede recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar',
                cancelButtonText : 'Cancelar'
            }).then((result) => {
        if (result.isConfirmed) {
                
            Livewire.dispatch('eliminarVacante', {vacante:vacanteId})

            Swal.fire(
                'Proyecto eliminado',
                'Se eliminó correctamente',
                'Continuar'
                )
            }
            })
            })
                })
        
            
    </script> 
@endpush