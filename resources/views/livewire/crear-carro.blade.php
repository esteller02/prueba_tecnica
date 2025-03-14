<div>
    <h1 class = "text-center mb-5">Registrar Vehículo</h1>

    <div class = "w-50 mx-auto card p-3 bg-white">

       

        @livewire('FormularioCarro')
    </div>
</div>

<script>
        document.addEventListener('livewire:init', () => {
       Livewire.on('error', (datos) => 
       {
            const {mensaje} = datos;
           alert(mensaje);
       });

       Livewire.on('success', (datos) => 
       {
            const {mensaje} = datos;
            alert(mensaje);
            Livewire.dispatch('redireccionar');
           
       });
    });
</script>
