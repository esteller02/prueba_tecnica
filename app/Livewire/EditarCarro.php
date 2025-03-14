<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 

class EditarCarro extends Component
{
    //INSTANCIA DEL MODELO CARRO
    public $carro;

    public function render()
    {
        //dd($this->carro);
        return view('livewire.editar-carro');
    }


    #[On('guardar')] 
    public function editar(array $datos)
    {
        try {
            $this->carro->modelo_id = $datos['modelo'];
            $this->carro->color_id = $datos['color'];
            $this->carro->ano = $datos['ano'];
            $this->carro->precio = $datos['precio'];
            $this->carro->kilometraje = $datos['kilometraje'];
            $this->carro->save();
            $this->dispatch('success', mensaje: 'El vehículo fue actualizado correctamente');

        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatch('error', mensaje: 'Ocurrió un error al intentar actualizar el vehículo');
        }
    }


    #[On('redireccionar')] 
    public function redireccionar()
    {
        return $this->redirectRoute('carros.index');
    }
}
