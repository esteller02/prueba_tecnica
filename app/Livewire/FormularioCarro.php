<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Color;
use App\Models\Marca;
use App\Models\Modelo;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Validate;

class FormularioCarro extends Component
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

    //ENTERO
    public $kilometraje;

    //FLOTANTE
    public $precio;

    //ENTERO
    public $ano;


    public function mount()
    {
        $this->marcas = Marca::all();
        $this->colores = Color::all();

        //SI LA MARCA ES PASADA COMO PROP ENTONCES SE VAN A CARGAR AUTOMATICAMENTE LOS MODELOS QUE PERTENECEN A DICHA MARCA
        if($this->marca){
            $this->modelos = $this->obtenerModelos($this->marca);
        }
    }

    public function render()
    {
        
        return view('livewire.formulario-carro');
    }
   

    public function updated(string $atributo, mixed $valor)
    {
        if($atributo === 'marca')
        {
            //SI NO SE SELECCIONO NINGUNA MARCA SE DEBE RESETEAR EL ATRIBUTO MODELOS A SU VALOR ORIGINAL EL CUAL ERA UN ARREGLO VACIO []
            if(!$valor)
            {
                return $this->reset('modelos');
            }
            $this->modelos = $this->obtenerModelos($valor);
            $this->reset('modelo');
        }
    }

    public function obtenerModelos(int $marca): Collection
    {
        return Modelo::where('marca_id', '=', $marca)->get();
    }

    public function guardar()
    {
        $validado = $this->validate();
        $this->dispatch('guardar', datos: $validado);
        //dd("evento lanzado");
    }


    public function rules(): array
    {
        return[

            'marca'=> ['required', 'integer', 'exists:marcas,id'],
            'modelo'=>['required', 'integer', 'exists:modelos,id'],
            'kilometraje'=>['required', 'integer', 'min:0'],
            'precio'=> ['required','numeric', 'min:1', 'regex:/^\d+(\.\d{1,2})?$/'],
            'color'=>['required', 'integer', 'exists:colores,id'],
            'ano'=>['required', 'integer', 'max:'.date('Y')]
        ];
    }
}
