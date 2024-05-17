<div>

    <livewire:filtrar-vacantes/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-800 mb-12">Nuestros proyectos disponibles</h3>
            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div>
                            <a  class="text-2xl font-extrabold text-gray-600 mb-2" href="{{route('vacantes.show',$vacante->id)}}">
                                {{$vacante->titulo}}
                            </a>
                            <p class="text-base text-gray-600 mb-2">{{$vacante->empresa}}</p>
                            <p class="text-base text-gray-600 mb-2">{{$vacante->categoria->categoria}}</p>
                            <p class="text-base text-gray-600">Ultimo dia para postularse: <span class="font-normal">{{$vacante->ultimo_dia->format('d/m/Y')}}</span></p>
                        </div>
                        <div class="mt-5 md:mt-0">
                           <a class="p-3 text-xs font-bold uppercase text-white bg-gray-800 rounded-lg" 
                           href="{{route('vacantes.show',$vacante->id)}}">Ver proyectos</a> 
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">No hay proyectos aún</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
