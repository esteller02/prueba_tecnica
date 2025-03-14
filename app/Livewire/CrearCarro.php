<?php

namespace App\Livewire;

use App\Models\Carro;
use Livewire\Component;
use Livewire\Attributes\On; 

class CrearCarro extends Component
{


    public function render()
    {
        return view('livewire.crear-carro');
    }


    #[On('guardar')] 
    public function guardar(array $datos)
    {
        try {
            Carro::create([
                'modelo_id'=> $datos['modelo'],
                'color_id'=> $datos['color'],
                'ano'=> $datos['ano'],
                'kilometraje'=> $datos['kilometraje'],
                'precio'=> $datos['precio']
            ]);

            $this->dispatch('success', mensaje: 'Se ha registrado el vehículo con éxito');
            
        } catch (\Throwable $th) {
            //dd($th);
            $this->dispatch('error', mensaje: 'Ocurrió un error inesperado al intentar registrar el vehículo');
        }
    }

    #[On('redireccionar')] 
    public function redireccionar()
    {
        return $this->redirectRoute('carros.index');
    }

}
