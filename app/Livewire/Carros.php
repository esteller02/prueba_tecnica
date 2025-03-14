<?php

namespace App\Livewire;

use App\Models\Carro;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;


class Carros extends Component
{

    public $marca;
    public $modelo;
    public $color;


    protected $paginationTheme = 'bootstrap';
    use WithPagination;

    
    public function render()
    {
        
        $carros = $this->obtenerCarros(); 
        return view('livewire.carros', ['carros'=> $carros]);
    }


    #[On('eliminar')] 
    public function eliminar(int $id)
    {
        try {
            $carro = Carro::find($id);
            $carro->delete();
            //$this->resetPage();
        } catch (\Throwable $th) {
            //dd($th);
            $this->dispatch('error', mensaje: 'No se pudo eliminar el vehículo');
        }
    }

    
    public function obtenerCarros()
    {
       
        $carros = Carro::with(['modelo.marca', 'color'])
        ->when($this->marca, function (Builder $query,  $marca) {

            $query->whereRelation('modelo.marca', 'marcas.id', '=', $marca);
    
        })
        ->when($this->modelo, function (Builder $query,  $modelo) {

            $query->where('modelo_id', '=', $modelo);
    
        })
        ->when($this->color, function (Builder $query,  $color) {

            $query->where('color_id', '=', $color);
    
        })
        ->orderBy('id', 'desc')->paginate(5);
        
        return $carros;
    } 

    #[On('filtrar')]
    public function aplicarFiltros($marca, $modelo, $color)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
        
        $this->resetPage();
    }

  

  
}
