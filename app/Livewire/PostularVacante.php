<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{

    use WithFileUploads;
    public $cv;
    public $vacante;
        
    protected $rules=[
        'cv'=>'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante =$vacante;
    }

    public function postularme()
    {
        $this->validate();

        //almacenar CV en el disco duro
        $cv = $this->cv->store('public/cv');
        $datos['cv'] =str_replace('public/cv/','',$cv);


        //Crear candidato
        $this->vacante->candidatos()->create([
            'user_id'=>auth()->user()->id,
            'cv'=>$datos['cv']
        ]);

        //Crear notificacion y enviar el email

        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        //mostrar el usuario un mensaje de OK
        session()->flash('mensaje','¡Se envio correctamente tu información!');

        return redirect()->back();
    
    }
    public function render()
    {

        return view('livewire.postular-vacante');
    }
}
