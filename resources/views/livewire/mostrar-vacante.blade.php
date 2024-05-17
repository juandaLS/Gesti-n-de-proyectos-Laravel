<div class="p-10">
        <div class="mb-3">
                <h3 class="font-bold text-3xl text-gray-800 my-3">
                    {{$vacante->titulo}}
                </h3>
                <div class="md:grid md:grid-cols-2 bg-gray-100 p-4 my-3 rounded-lg">
                    <p class="font-bold text-sm uppercase text-gray-800 my-3">
                        Propietario del proyecto: 
                        <span class="normal-case font-normal">
                            {{$vacante->empresa}}
                        </span>
                    </p>
                    <p class="font-bold text-sm uppercase text-gray-800 my-3">
                        Ultimo dia para postularse: 
                        <span class="normal-case font-normal">
                            {{$vacante->ultimo_dia->toFormattedDateString()}}
                        </span>    
                    </p>
                    <p class="font-bold text-sm uppercase text-gray-800 my-3">
                            Categoría: 
                            <span class="normal-case font-normal">
                                {{$vacante->categoria->categoria}}
                            </span>
                        </p>
                    <p class="font-bold text-sm uppercase text-gray-800 my-3">
                            Presupuesto del proyecto: 
                            <span class="normal-case font-normal">
                                {{$vacante->salario->salario}}
                            </span>
                        </p>
                </div>
        </div>
        <div class="md:grid md:grid-cols-6 gap-4">
            <div class="md:col-span-3">
            <img src="{{asset('storage/vacantes/' . $vacante->imagen)}}" alt="{{'Imagen proyecto' . $vacante->titulo}}">
            </div>
            <div class="md:col-span-3">
                <h2 class="text-2xl font-bold mb-5">
                        Descricion del proyecto:
                </h2> <p>{{$vacante->descripcion}}</p>
            </div>
        </div>
        @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>
                ¿Deseas ingresar a este proyecto? <a class="font-bolf text-indigo-500 " href="{{route('register')}}">Obten una cuenta y aplica tu ingreso a este proyecto</a>
            </p>
        </div>
        @endguest

        @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante"/>
        @endcannot

</div>
