<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class FiltrarVacantes extends Component
{
    public $termino;
    public $categoria;

    public function leerDatosFormulario()
    {
        $this->dispatch('terminosBusqueda', $this->termino, $this->categoria);
    }

    public function render()
    {
        $categorias =Categoria::all();
        return view('livewire.filtrar-vacantes',[
            'categorias' =>$categorias
        ]);
    }
}
