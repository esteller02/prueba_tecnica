<?php

namespace App\Livewire;

use App\Models\Color;

use App\Models\Marca;
use App\Models\Modelo;
use Livewire\Component;
use Livewire\Attributes\Validate;

class FiltrosCarro extends Component
{
    //ARREGLO QUE RELLENA LAS OPCIONES DEL SELECT PARA ESCOGER UNA MARCA
    public $marcas = [];

    //ARREGLO QUE RELLENA LAS OPCIONES DE LOS MODELOS PARA ESCOGER UN MODELO
    public $modelos = [];

    //ARREGLO QUE RELLENA LAS OPCIONES DE LOS COLORES PARA ESCOGER UN COLOR
    public $colores = [];

    //id de la marca (ENTERO)
    #[Validate] 
    public $marca;

    //id del modelo (ENTERO)
    #[Validate] 
    public $modelo;

    //id del color (ENTERO)
    #[Validate] 
    public $color;

    public function mount()
    {
        $this->marcas = Marca::all();
        $this->colores = Color::all();
    }

    public function updated(string $atributo, mixed $valor)
    {
        if($atributo === 'marca')
        {
            $this->reset('modelo');
  

            $this->modelos = $valor ? Modelo::where('marca_id', '=', $valor)->get() : [];
        }
        
        $this->dispatch('filtrar', marca: $this->marca, modelo: $this->modelo, color: $this->color);
    }

    
    public function render()
    {
        return view('livewire.filtros-carro');
    }

    public function rules(): array
    {
        return[

            'marca'=> ['nullable', 'integer', 'exists:marcas,id'],
            'modelo'=>['nullable', 'integer', 'exists:modelos,id'],
            'color'=>['nullable', 'integer', 'exists:colores,id']
        ];
    }
}
