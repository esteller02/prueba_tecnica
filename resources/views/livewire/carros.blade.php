<div >

    <livewire:filtros-carro />
    <a class = "btn btn-primary mb-3" href="{{route('carros.crear')}}">
        Nuevo Carro
    </a>

    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Marca</th>
            <th scope="col">Modelo</th>
            <th scope="col">Precio</th>
            <th scope="col">Año</th>
            <th scope="col">Kilometraje</th>
            <th scope="col">Color</th>
            <th scope = "col">Acciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($carros as $carro)
            <tr wire:key='{{$carro->id}}'>
            <td>{{$carro->modelo->marca->nombre}}</td>
            <td>{{$carro->modelo->nombre}}</td>
            <td>{{$carro->precio}}$</td>
            <td>{{$carro->ano}}</td>
            <td>{{$carro->kilometraje}} Km</td>
            <td>{{$carro->color->nombre}}</td>
            <td class = "d-flex column-gap-2">
                <a href="{{route('carros.editar', ['id'=>$carro->id])}}" class = "btn btn-warning btn-sm fw-semibold">
                    Editar
                </a>

                <button wire:loading.attr='disabled' wire:target="eliminar" class = "btn btn-sm btn-danger fw-semibold" wire:click="$dispatch('eliminar', { id: {{ $carro->id }} })">
                    Eliminar
                </button>
            </td>
            </tr>
        
        @endforeach
        </tbody>
      </table>
      {{$carros->links()}}
      
</div>


<script>
    document.addEventListener('livewire:init', () => {
   Livewire.on('error', (datos) => 
   {
        const {mensaje} = datos;
       alert(mensaje);
   });


   /*Livewire.on('pedir-confirmacion', (datos)=>
   {
        const confirmado = window.confirm('¿Estas seguro de que deseas eliminar este vehículo?');

        if(confirmado)
        {
            const {id} = datos;
            Livewire.dispatch('eliminar', {id})
        }
   })*/
});
</script>

