<div class="bg-gray-100 p-5 ,t-10 flex flex-col justify-center items-center my-4 rounded-lg">
 <h3 class="text-center text-2xl font-bold my-1">Postularme a este proyecto</h3>
@if (session()->has('mensaje'))
    <p class="uppercase text-green-600 font-bold p-2 my-5 rounded-lg">
        {{session('mensaje')}}
    </p>

    @else
    <form wire:submit.prevent='postularme' class="w-96 mt-1">
        <div class="mb-5">
            <x-input-label class="font-bold text-sm uppercase text-gray-800 my-3" for="cv" :value="__('Curriculum u hoja de vida (PDF)')"/>
                <x-text-input id="cv" type="file" wire:model="cv" accept=".pdf" class="block mt-1 w-full"/>
    
        </div>
    
        @error('cv')
            <livewire:mostrar-alerta :message="$message">
        @enderror
        <x-primary-button>
            {{__('Postularme')}}
        </x-primary-button>
     </form>
@endif

</div>
